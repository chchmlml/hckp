<?php
/**
 * @desc:
 * ==============================================
 * 版权所有HCKP  2015-2016 
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-31 下午8:41:59
 * @author:dayunlong <gengjun@qiyi.com>
 * @version: 1.0.0.0
 */
 
 class TestController extends CController{
 	/**
 	 * 测试二维码生成
 	 * @date: 2015-3-31 下午8:44:40
 	 * @author: dayunlong<gengjun@qiyi.com>
 	 */
 	public function actionIndex(){
 		$this->layout=false;
 		$content='http://182.92.219.85/Test/Test';
 		$web_path=Utils::getTwoDimensionalCodePic($content);
 		echo '<img src="'.$web_path.'"/>';
 	}
 	
 	/**
 	 * 二维码测试
 	 * @date: 2015-3-31 下午8:44:24
 	 * @author: dayunlong<gengjun@qiyi.com>
 	 */
 	public function actionTest(){
 		header("Content-type: text/html; charset=utf-8"); 
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		echo '这里是测试的委托单跟踪页面!</br>';
 		
 		
 	}
 	
 	
 	
 }
/* End of file : TestController.php */ 