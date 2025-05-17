<?php
if(is_file("config.php")) { include "config.php"; } else { include "config-dist.php"; }
$query = isset($_GET['query']) ? $_GET['query'] : '';
require_once "MySpider.php";
include_once "../master.php";
master::head();
master::navbar();

$spider = new MySpider($spider_start);
$start_time = microtime(true);
$results = $spider->search($_GET['query'], 0, 10);
$result = (json_encode($results, JSON_PRETTY_PRINT));
$output = json_decode($result);
$end_time = microtime(true);
$elapsed_time = $end_time - $start_time;
$count = count($output->rows);

?>
<body class="bg-light">
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <form method="get" action="search.php" class="mb-4">
                <div class="input-group">
                    <input id="tags" type="text" name="query" class="form-control" value="<?= htmlentities($query) ?>" placeholder="Search...">
                    <button id="submit" type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            
            <div class="search-results">
                <?php
                echo "<p class='text-muted'>About ".($count)." results (".number_format($elapsed_time, 2)." seconds)</p>";
                
                foreach($output->rows as $item) {
                    $title = $item->title;
                    $url = $item->url;
                    $body = $item->body;
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='$url' class='text-decoration-none'>$title</a></h5>";
                    echo "<p class='card-text'>$body</p>";
                    echo "<small class='text-success'>$url</small>";
                    echo "</div></div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>
$(function() {
    var availableTags = [
        "How to", "FAQ", "Privacy", "Data Retention", "Service Level", 
        "Canvas", "Blackboard", "Sakai", "Brightspace"
    ];
    $("#tags").autocomplete({
        source: availableTags
    }); 
});   
</script>

<?php master::footer(); ?>
</body>
</html>

