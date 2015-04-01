<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>个人中心</title>
	
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="this is my page">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
    <!--<link rel="stylesheet" type="text/css" href="./styles.css">-->

  </head>
  
  <body>
  	请补充信息：</br>
    <?php 
    if(!$user_info['user_realname']){echo "请填写真实姓名</br>";}
    ?>
    <?php 
    if(!$user_info['user_headpic']){echo "请上传头像</br>";}
    ?>
    
     <?php 
    	switch($user_info['user_type']){
    		case 1: echo "您是货主，请发货";break;
    		case 2: echo "请您代表车队接单";break;
    		case 3: echo "您是司机，请你抢单";break;
    		default : echo "请标注身份";break;
    	}
    ?>
  </body>
</html>
