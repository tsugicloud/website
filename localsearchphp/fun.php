<?php 
header("Refresh: 1; URL=localsearchphp/fun.php?query=".htmlentities(urlencode($_GET['query'])));
$output = shell_exec("python hello.py");

echo $output;
?>