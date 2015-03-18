<?php
/**
 * @desc:system模块引导文件
 * ==============================================
 * 版权所有  2015-2016
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-18 下午2:27:46
 * @author:dayunlong <yl-831025@163.com>
 * @version: 1.0.0.0
 */
 class PlatModule extends CWebModule{
 	/**
 	 * (non-PHPdoc)
 	 * @see CModule::init()
 	 */
	public function init(){
		$this->setImport(array(
				'plat.models.*',
				'plat.components*',
				'plat.controllers.*',
				'plat.views.*',
		));
	}
 	/**
 	 * (non-PHPdoc)
 	 * @see CWebModule::beforeControllerAction()
 	 */
	public function beforeControllerAction($controller, $action){
		if(parent::beforeControllerAction($controller, $action)){
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
 	
 	
 	
 }
/* End of file : PlatModule.php */ 