<?php

class SiteController extends CController
{
	/**
	 * Declares the 'phonebook' Web service action.
	 */
	public function actions()
	{
		return array();
	}

	/**
	 * This is the default action that displays the phonebook Flex client.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionUserZone(){
		$this->render('userzone');
	}
	/*** The following methods are Web service APIs ***/
	public function actionNopri(){
		echo 'no pri,please login!';
	}
	/**
	 * 站点登陆 
	 */
	public function actionLogin(){
		$this->layout=false;
		//login的登陆处理方法
		//如果有跳转的目标地址跳转到目标地址	
		$user_info=array();
		$user_info['user_id']='1';
		$user_info['user_username']='dayunlong';
		$user_info['user_phone']='15026912738';
		$user_info['user_realname']='大云龙';
		$user_info['user_type']='1';
		$user_info['user_headpic']='/data/1.pic';
		//session登陆
		//HckpSessionComponent::getInstance()->initSession($user_info);
		//跳转到目标地址
		//test
		//$r=HckpSessionComponent::getInstance()->getVal('user_info');
		//var_dump($r);
		
		$user=new UserModel();
 		$loginUser = $user->find(
 			array(
 				'condition'=>"ts_u_phone = :ts_u_phone and ts_u_password = :ts_u_password",
 				'params'=>array(":ts_u_phone"=>$_POST['email'],":ts_u_password"=>Utils::getUserPassword($_POST['pwd']))
 			)
 		);

 		if(!isset($loginUser->ts_u_id) || $loginUser->ts_u_id==null){
 			$info = array(
	 			'status'=>2,
	 			'info'=>'用户名或密码错误'
	 		);
 		}else{
 			$info = array(
	 			'status'=>1,
	 			'info'=>'登录成功'
	 		);
 		}
 		echo json_encode($info);
 		die();
	}
	
	/**
	 * 注册后台处理方法
	 */
	public function actionRegister(){
		$user=new UserModel();
 		$user->ts_u_phone = $_POST['phone'];
 		$user->ts_u_password = Utils::getUserPassword($_POST['pwd']);
 		$user->ts_u_username = $_POST['username'] ? $_POST['username'] : $_POST['phone'];
 		$user->ts_u_type = 0;
 		
 		$info = array();
 		if(!$user->validate()){	
 			var_dump($user->getErrors());exit;
 			$info = array(
	 			'status'=>2,
	 			'info'=>$this->getErrorMessage($user->getErrors())
	 		);
 		}else{
 			$user->save();
 			//$message['id'] = $user->attributes['ts_u_id'];
 			$info = array(
	 			'status'=>1,
	 			'info'=>"注册成功"
	 		);
 		}
 		echo json_encode($info);
 		die();
	}
	/**
	 * 代码不应该写在这里
	 * @param unknown $message
	 * @return mixed
	 * @date: 2015-3-31 下午8:05:05
	 * @author: dayunlong<gengjun@qiyi.com>
	 */
	public function getErrorMessage($message){
 		return current(current($message));
 	}
	
}