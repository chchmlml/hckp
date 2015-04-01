<?php

class HckpSessionComponent{

	private static  $_instance;
	private function __construct(){
	
	}
	/**
	 * 防止克隆
	 */
	protected function __clone(){
	}
	/**
	 * 单例入口
	 * @return QiyiSession
	 */
	public static function getInstance(){
		if(!(self::$_instance instanceof HckpSessionComponent)){
			self::$_instance = new HckpSessionComponent();
		}
		return self::$_instance;
	}
	/**
	 * 设置Key Value
	 * @param unknown $key
	 * @param unknown $val
	 */
	public function setVal($key,$val){
		Yii::app()->session[$key] = $val;
	}
	/**
	 * 得到Value
	 * @param unknown $key
	 */
	public function getVal($key){
		return Yii::app()->session[$key];
	}
	
	/**
	 * 初始化Session
	 */
	public function initSession(array $r){
		//初始化session
		$user_info=array();
		$user_info['user_id']=$r['user_id'];
		$user_info['user_username']=$r['user_username'];
		$user_info['user_phone']=$r['user_phone'];
		$user_info['user_realname']=$r['user_realname'];
		$user_info['user_type']=$r['user_type'];
		$user_info['user_headpic']=$r['user_headpic'];
		self::setVal('user_info',$user_info);
	}
}