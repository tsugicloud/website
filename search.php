<?php 
header("Refresh: 1; URL=localsearchphp/search.php?query=".htmlentities(urlencode($_GET['query'])));
?>

