<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  
	<link rel="shortcut icon" href="images/icon.png">
	-->
	<title>货车快跑</title>
</head>
<body>
<div>
<ul>
<?php
	$menu_list=Yii::app()->params['menu_list'];
	foreach ($menu_list as $key=>$v){
		echo '<li><a href="'.Utils::url($key).'">'.$v['name'].'</a></li>';
	}
?>
</ul>
</div>
<div style="background-color:#7761a7;color:#ffffff">
<?php echo $content;?>
</div>
</body>
</html>
	