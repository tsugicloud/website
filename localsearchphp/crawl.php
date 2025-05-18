<?php

require_once "config.php";
require_once "MySpider.php";

$spider = new MySpider($spider_start);

echo "<h1>Starting Crawl</h1>";
echo "<p>Starting URL: " . htmlspecialchars($spider_start) . "</p>";
echo "<p>Max Pages: " . $spider_crawl_max_pages . "</p>";

$start_time = time();
$result = $spider->crawl($spider_crawl_max_pages, 30);
$end_time = time();

echo "<h2>Crawl Results</h2>";
echo "<p>Status: " . htmlspecialchars($result["status"]) . "</p>";
echo "<p>Time Elapsed: " . ($end_time - $start_time) . " seconds</p>";

if (isset($result["crawled"])) {
    echo "<h3>Pages Crawled:</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>URL</th><th>Status</th><th>Date</th><th>Title</th><th>Words</th></tr>";
    
    foreach ($result["crawled"] as $page) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($page["values"][":url"]) . "</td>";
        echo "<td>" . htmlspecialchars($page["status"]) . "</td>";
        echo "<td>" . htmlspecialchars($page["values"][":date"]??'null') . "</td>";
        
        // Show title if available
        $title = isset($page["values"][":title"]) ? $page["values"][":title"] : "N/A";
        echo "<td>" . htmlspecialchars($title) . "</td>";
        
        // Show word count and sample if available
        if (isset($page["values"][":words"]) && $page["values"][":words"]) {
            $words = $page["values"][":words"];
            $word_count = count(explode(' ', trim($words)));
            $word_sample = implode(', ', array_slice(explode(' ', trim($words)), 0, 5));
            echo "<td>Count: $word_count<br>Sample: $word_sample</td>";
        } else {
            echo "<td>No words indexed</td>";
        }
        
        echo "</tr>";
    }
    echo "</table>";
}

// Show database summary
echo "<h3>Database Summary</h3>";
$stmt = $spider->pdo->query('SELECT COUNT(*) as total, 
    SUM(CASE WHEN words IS NOT NULL THEN 1 ELSE 0 END) as with_words,
    SUM(CASE WHEN code IS NOT NULL THEN 1 ELSE 0 END) as errors
    FROM pages');
$summary = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<p>Total Pages: " . $summary['total'] . "</p>";
echo "<p>Pages with Words: " . $summary['with_words'] . "</p>";
echo "<p>Error Pages: " . $summary['errors'] . "</p>";

// Show some sample words from the database
echo "<h3>Sample Words from Database</h3>";
$stmt = $spider->pdo->query('SELECT words FROM pages WHERE words IS NOT NULL LIMIT 5');
echo "<ul>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>" . htmlspecialchars($row['words']) . "</li>";
}
echo "</ul>";



