<div>
<?php 
require_once '../../../master.php';
master :: head();
master :: navbar();


?>
<head>
  <title>Data Retention - Tsugicloud</title>
</head>
</div>
<div style="background-color:#FBBC05;color:white;padding:50px;">   
</div>
<div style="margin-left:100px;margin-right:100px;">
<?php
$parsedown = new Parsedown(); 
$content = file_get_contents('dataretention.md');
echo $parsedown->text($content);
?>
</div>    
