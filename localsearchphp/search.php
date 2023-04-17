<?php
if(is_file("config.php")) { include "config.php"; } else { include "config-dist.php"; }
$query = isset($_GET['query']) ? $_GET['query'] : '';
require_once "MySpider.php";
include_once "../master.php";
master :: head();
master :: navsearchpage();


$spider = new MySpider($spider_start);
$start_time = microtime(true);
$results = $spider->search($_GET['query'], 0, 10);
$result = (json_encode($results, JSON_PRETTY_PRINT));
$output = json_decode($result);
$end_time = microtime(true);
$elapsed_time = $end_time - $start_time;
$count = count($output->rows);

?>
<head><title>Search - Tsugicloud </title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>
 $( function () {
    var availableTags = [
        "How to", "FAQ", "Privacy","Data Retention","Service Level", "Canvas", "Blackboard", "Sakai", "Bightspace"
    ];
    $("#tags").autocomplete({
        source: availableTags
    }); 
 });   
</script>
<style>#submit{width:100px;background-color: #4d90fe; border:1px solid #666; border-radius:2px; border-color: #3079ed; color:#fff;}
ul.ui-autocomplete {list-style: none; background-color: #fff; width:100px} ul.ui-autocomplete:hover {background-color: #C4DBFA;}</style></head>
<div  style="background-color:#F7F7F7;padding-top:80px;padding-left:40px;padding-bottom:10px;">
<form method="get" action="search.php">
<a class="navbar-brand" href="../index.php"><img style="filter:invert(50%);" src ="../logo/logo.png" height="30px"/></a>    
<input id="tags" type="text" name="query" size="60" value="<?= htmlentities($query) ?>"> <input id="submit" type="submit" value="Search">
</form>
</div>
<div style="padding-left:40px;padding-top:10px;margin-right:500px">
<?php
echo "About ".($count)." "."results"." ". "(". ($elapsed_time) . " seconds". ")";
echo "<br>";
echo "<br>";
foreach($output->rows as $item) {
    $title = $item->title;
    $url = $item->url;
    $body = $item->body;
    echo "<a href='$url'>$title</a>";
    echo "<br>";
    echo $body;
    echo "<br>";
    echo ("<p style='color:green'>$url</p>");
}
?>
</div>
<div>
<?php master :: footer1();  ?>  
</div>

