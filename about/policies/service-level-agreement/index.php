<div>
<?php 
require_once '../../../master.php';
master :: head();
master :: navbar();
?>
</div>
<head>
  <title>Service Level - Tsugicloud</title>
</head>
<div style="background-color:#34A853;color:white;padding:50px;">   
</div>
<div style="margin-left:100px;margin-right:100px;">
<?php
$parsedown = new Parsedown(); 
$content = file_get_contents('servicelevel.md');
echo $parsedown->text($content);
?>
</div>    
