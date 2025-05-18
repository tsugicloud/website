<?php
class MySpider {

    public ?object $pdo = null;

    public string $start = "http://localhost:8888/localsearchphp/test";

    // public string $alternate = "https://www.localsearchphp.com/";
    public ?string $alternate = null;

    public int $successive = 30;

    // Tags where we don't want text
    public array $stoptags = array('nav', 'footer', 'script');

    public array $stopwords = array(
        'a', 'about', 'actually', 'almost', 'also', 'although', 'always', 'am', 'an', 'and',
        'any', 'are', 'as', 'at', 'be', 'became', 'become', 'but', 'by', 'can', 'could', 'did',
        'do', 'does', 'each', 'either', 'else', 'for', 'from', 'had', 'has', 'have', 'hence',
        'how', 'i', 'if', 'in', 'is', 'it', 'its', 'just', 'may', 'maybe', 'me', 'might', 'mine',
        'must', 'my', 'mine', 'must', 'my', 'neither', 'nor', 'not', 'of', 'oh', 'ok', 'when',
        'where', 'whereas', 'wherever', 'whenever', 'whether', 'which', 'while', 'who', 'whom',
        'whoever', 'whose', 'why', 'will', 'with', 'within', 'without', 'would', 'yes', 'yet',
        'you', 'your'
    );

    function __construct($start) {
        // Connect to SQLite database
        $this->pdo = new PDO('sqlite:spider.db');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create tables if they don't exist
        $this->pdo->exec('CREATE TABLE IF NOT EXISTS pages (id INTEGER PRIMARY KEY, url TEXT UNIQUE, title TEXT, body TEXT, words TEXT, hash TEXT, code INTEGER, retrieved_date INTEGER)');
        $this->pdo->exec('CREATE INDEX IF NOT EXISTS idx_pages_retrieved_date ON pages (retrieved_date)');
        $this->pdo->exec('CREATE INDEX IF NOT EXISTS idx_pages_url ON pages (url)');

        // Insure first page is bootstrapped
        $this->start = $start;
        $stmt = $this->pdo->prepare('INSERT OR IGNORE INTO pages (url) VALUES (?)');
        $stmt->execute([$this->start]);
    }

    // Function to insert a page into the database
    public function insert_page($url, $title, $body, $hash, $error, $retrieved_date, &$crawled=null) {
        $words = null;
        if ( is_string($body) && strlen($body) > 0 ) {
            // Clean and normalize the text
            $string = strtolower(preg_replace("/[^A-Za-z0-9 ]/", ' ', $body));
            $string = preg_replace('/\s+/', ' ', $string); // Normalize spaces
            $string = trim($string);
            
            $words = array();
            $pieces = explode(' ', $string);
            foreach($pieces as $piece) {
                // Skip short words
                if ( strlen($piece) < 3 ) continue;
                
                // Skip stopwords
                if ( in_array($piece, $this->stopwords) ) continue;
                
                // Skip if word already exists
                if ( in_array($piece, $words) ) continue;
                
                // Skip numeric values and CSS units
                if ( preg_match('/^\d+(px|rem|em|%|vh|vw|pt|cm|mm|in|ex|ch|vmin|vmax)?$/', $piece) ) continue;
                
                // Skip hex colors
                if ( preg_match('/^[0-9a-f]{3,6}$/', $piece) ) continue;
                
                // Skip pure numbers
                if ( is_numeric($piece) ) continue;
                
                array_push($words, $piece);
            }
            if ( count($words) > 1 ) {
                sort($words);
                $words = ' ' . implode(' ', $words) . ' '; // Ensure spaces at start and end
            } else {
                $words = null;
            }
            if ( strlen($body) > 200 ) $body = substr($body, 0, 200) . " ...";

	    $retrieved_date = time();
        }

        $sql = 'INSERT OR REPLACE INTO pages (url, title, body, words, hash, code, retrieved_date) 
                         VALUES (:url,  :title, :body, :words, :hash, :code, :date)
                ON CONFLICT (url) DO UPDATE SET 
                    title=excluded.title, body=excluded.body, words=excluded.words,
                    hash=excluded.hash, code=excluded.code, retrieved_date=:date';

        $stmt = $this->pdo->prepare($sql);

        $values = [':url' => $url, ':title' => $title, ':body' => $body,
            ':words' => $words, ':hash' => $hash, ':code' => $error, ':date' => $retrieved_date];

        try {
            $stmt->execute($values);
            $crawl = array();
            if ( $values[':body'] === null ) {
                $crawl['values'] = array(':url' => $values[':url']);
                $crawl["status"] = "Link insert/update";
            } else {
                $crawl["values"] = $values;
                $crawl["status"] = "Page insert/update";
            }
            if ( is_array($crawled) ) array_push($crawled, $crawl);
        } catch(Exception $e) {
            $crawl = array();
            $crawl["values"] = $values;
            $crawl["status"] = "Insert fail: " . $e;
            $crawl["sql"] = $sql;
            if ( is_array($crawled) ) array_push($crawled, $crawl);
        }
    }

    // Function to check whether a page already exists in the database
    public function page_exists($url) {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM pages WHERE url = ?');
        $stmt->execute([$url]);
        return $stmt->fetchColumn() > 0;
    }

    public function crawl($maxpages, $maxseconds=2) {
        $begin = time();
        $crawled = array();
        while ($maxpages-- > 0 && time() <= ($begin+$maxseconds) ) {
            $crawl = array();
            // Get an unretrieved page from database
            $stmt = $this->pdo->query('SELECT * FROM pages WHERE retrieved_date IS NULL ORDER BY id ASC LIMIT 1');
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                $stmt = $this->pdo->query('SELECT * FROM pages ORDER BY retrieved_date ASC LIMIT 1');
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$row) {
                    $retval = array();
                    $retval["status"] = "No pages to crawl";
                    if (count($crawled) > 0 ) $retval["crawled"] = $crawled;
                    $retval["ellapsed"] = time() - $begin;
                    return $retval;
                }
            }

            $retrieved_date = $row['retrieved_date'];
            if ( $retrieved_date == null || ! is_string($retrieved_date) ) {
                // Should retrieve
            } else {
                $delta = time() - $retrieved_date;
                if ( $delta < $this->successive ) {
                    $retval = array();
                    $retval["status"] = "Oldest page must be at least $this->successive seconds old to re-crawl, actual=$delta";
                    if (count($crawled) > 0 ) $retval["crawled"] = $crawled;
                    $retval["ellapsed"] = time() - $begin;
                    return $retval;
                }
            }

            $url = $row['url'];
            // echo("----- URL $url ------\n");
            $html = @file_get_contents($url);

            // Check HTTP response code
            if ( ! isset($http_response_header) || ! is_array($http_response_header) ) {
                    $crawl["status"] = "Error retrieving " . $url;
                    array_push($crawled, $crawl);
                    continue;
            } else {
                $response_code = substr($http_response_header[0], 9, 3);
                if (strpos('23', $response_code[0]) === false) {
                    // Handle error (e.g. non-2xx/3xx response code)
                    $now = time();
                    $this->insert_page($url, null, null, null, $response_code, $now, $crawled);
                    continue;
                }
            }

            $oldhtml = $html;
            // Remove script tags
            $html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
            // Remove style tags and their contents
            $html = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $html);
            // Remove inline styles
            $html = preg_replace('/style\s*=\s*"[^"]*"/i', '', $html);
            $html = preg_replace('/style\s*=\s*\'[^\']*\'/i', '', $html);

            // Parse HTML
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $title = $doc->getElementsByTagName('title')->item(0)->textContent;

            // Remove the nav and footer tags from the document
            foreach ($this->stoptags as $stoptag ) {
                $stopelem = $doc->getElementsByTagName($stoptag)->item(0);
                if($stopelem) {
                    $stopelem->parentNode->removeChild($stopelem);
                }
            }

            // Get text content, excluding style and script elements
            $body = '';
            $body_elements = $doc->getElementsByTagName('body')->item(0)->childNodes;
            foreach ($body_elements as $element) {
                if ($element->nodeType === XML_TEXT_NODE) {
                    $body .= $element->textContent . ' ';
                } else if ($element->nodeType === XML_ELEMENT_NODE) {
                    // Skip style and script elements
                    if (strtolower($element->nodeName) === 'style' || 
                        strtolower($element->nodeName) === 'script') {
                        continue;
                    }
                    $body .= $element->textContent . ' ';
                }
            }

            // Remove multiple spaces and blank lines from the title and body
            $title = preg_replace('/\s+/', ' ', $title);
            $body = preg_replace('/\s+/', ' ', $body);
            $body = preg_replace('/\n(\s*\n)+/', "\n", $body);
            $hash = md5($body);

            // echo("--- Retrieved $url $body\n");

            // Insert or update page in database
            $now = time();
            $this->insert_page($url, $title, $body, $hash, null, $now, $crawled);
            
            // Get base URL properly
            $parsed_url = parse_url($url);
            $base_url = $parsed_url['scheme'] . '://' . $parsed_url['host'];
            if (isset($parsed_url['port'])) {
                $base_url .= ':' . $parsed_url['port'];
            }
            $base_path = $parsed_url['path'] ?? '/';
	    $base_name = basename($base_path);
	    if ( str_contains($base_name, ".") ) $base_path = dirname($base_path);

            // Reload the document.
            @$doc->loadHTML($html);
            // Add links to queue
            $links = $doc->getElementsByTagName('a');
            foreach ($links as $link) {
                $href = $link->getAttribute('href');
                if ( strpos($href, '#') !== false ) continue;
                if (str_ends_with($href, '.json') || str_ends_with($href, '.xml') ) continue;  // Skip data urls
                
                // Handle different types of URLs
                if (strpos($href, $this->start) === 0) {
                    $abs_url = $href;
                } else if (is_string($this->alternate) && strpos($href, $this->alternate) === 0) {
                    $abs_url = str_replace($this->alternate, $this->start, $href);
                } else if (strpos($href, 'http://') === 0 || strpos($href, 'https://') === 0) {
                    continue; // Skip external URLs
                } else {
                    // Handle relative URLs
                    if (strpos($href, '/') === 0) {
                        // Absolute path from domain root
                        $abs_url = $base_url . $href;
                    } else {
                        // Relative path
                        $abs_url = $base_url . $base_path . '/' . $href;
                    }
                }

                // Clean up the URL
                $abs_url = preg_replace('#([^:])//+#', '$1/', $abs_url); // Remove multiple slashes
                $abs_url = rtrim($abs_url, '/'); // Remove trailing slash

                if (!$this->page_exists($abs_url)) {
                    $this->insert_page($abs_url, null, null, null, null, null, $crawled);
                }
            }
        }
        $retval = array();
        $retval["status"] = "Crawl success";
        if (count($crawled) > 0 ) $retval["crawled"] = $crawled;
        $retval["ellapsed"] = time() - $begin;
        return $retval;
    }

    public function search($search, $start, $count) {
        $begin = time();
        $search = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $search));
        $words = explode(' ',$search);
        $where = null;
        if ( count($words) > 0 ) {
            $where = '';
            foreach($words as $word) {
                if ( strlen($where) > 0 ) $where .= ' OR ';
                // More flexible matching - word can be at start, middle, or end
                $where .= "(words LIKE '% " . $word . " %' OR words LIKE '" . $word . " %' OR words LIKE '% " . $word . "')";
            }
            $where = ' AND  (' . $where . ') ';
        }
        $sql = "SELECT * FROM pages WHERE code IS NULL AND hash IS NOT NULL AND 
            retrieved_date IS NOT NULL ".$where." ORDER BY id LIMIT $count OFFSET $start";

        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Debug output
        error_log("Search SQL: " . $sql);
        error_log("Found rows: " . count($rows));
        
        $retval = array();
        $retval["rows"] = $rows;
        $retval["sql"] = $sql;
        $retval["ellapsed"] = time() - $begin;
        return $retval;
    }

    // Dump all pages in the table
    public function dump() {
        echo("\n");
        $stmt = $this->pdo->query('SELECT * FROM pages ORDER BY retrieved_date DESC');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID: " . $row['id'] . "\n";
            echo "URL: " . $row['url'] . "\n";
            echo "Title: " . $row['title'] . "\n";
            echo "Body: " . $row['body'] . "\n";
            echo "Words: " . $row['words'] . "\n";
            echo "Code: " . $row['code'] . "\n";
            echo "Hash: " . $row['hash'] . "\n";
            echo "Retrieved Date: " . date('Y-m-d H:i:s', $row['retrieved_date']) . "\n";
            echo "\n";
        }
    }

    // From Tsugi\Util\U
    public static function remove_relative_path($path) {
        $pieces = explode('/', $path);
        $new_pieces = array();
        for($i=0; $i < count($pieces); $i++) {
            if ($pieces[$i] == '.' ) continue;
            if ($pieces[$i] == '..' ) {
                array_pop($new_pieces);
                continue;
            }
            $new_pieces[] = $pieces[$i];
        }
        $retval = implode("/",$new_pieces);
        return $retval;
    }

};
