<?php
/**
 * @desc:
 * ==============================================
 * 版权所有  2015-2016
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-18 下午2:40:05
 * @author:dayunlong <yl-831025@163.com>
 * @version: 1.0.0.0
 */
 class SystemComponent extends CComponent{
 	
 	private static $_Classr=array();
 	/**
 	 * 加载应用操作类
 	 * @param string $class_name 类全名
 	 * @param string $module 所属的模块 如果基础类的框架会加载不需要这里除了
 	 * @param string $type 类所属类型 //不能带最后不能带而外的s
 	 * @param string $new_class  是否需要单例
 	 * @return boolean|multitype:
 	 * @date: 2014-11-19 上午10:53:24
 	 * @author: dayunlong<yl-831025@163.com>
 	*/
 	protected static final function _loadClass($class_name,$module=NULL,$type=NULL,$new_class=true){
 		if(empty($class_name)){
 			return false;
 		}
 		$class_name=ucfirst($class_name);
 		$key=md5($class_name);
 		/**
 		 * 修改符合自动加载的规则
 		*/
 		if ((!is_null($module)) && (!is_null($type))){
 			$yii_path=self::_getClassPath($class_name,$module,$type);
 			Yii::import($yii_path);
 		}
 		if ((!isset(self::$_Classr[$key])) || $new_class === true) {
 			if (!class_exists($class_name)){
 				return false;
 			}
 			self::$_Classr[$key] = new $class_name(); //目前不支持初始化参数
 		}
 		return self::$_Classr[$key];
 	}
 	/**
 	 * 获取加载路径
 	 * @param string $class_name 类全名
 	 * @param string $module 所属的模块 如果基础类的框架会加载不需要这里除了
 	 * @param string $type 类所属类型 //不能带最后不能带而外的s
 	 * @return string 返回的是yii:import用的路径字符串
 	 * @date: 2014-11-19 上午10:42:59
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	private static final function _getClassPath($class_name,$module=NULL,$type=NULL){
 		$yii_path='application.modules.'.$module.'.'.$type.'.'.$class_name;
 		return $yii_path;
 	}
 	/**
 	 * 加载数据模型
 	 * @param unknown $model_name
 	 * @param string $module
 	 * @param string $new_class
 	 * @return Ambigous <boolean, multitype:, multitype:>
 	 * @date: 2014-11-19 上午11:00:20
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	public static final function loadModel($model_name,$module=NULL,$type=NULL,$new_class=true){
 		$type=is_null($type) ? 'models':$type;
 		return self::_loadClass($model_name,$module,$type,$new_class) ;
 	}
 	/**
 	 * 加载操作类
 	 * @param unknown $component_name
 	 * @param string $module
 	 * @return Ambigous <boolean, multitype:, multitype:>
 	 * @date: 2014-11-19 上午11:00:29
 	 * @author: dayunlong<yl-831025@163.com>
 	 */
 	public static final function loadComponent($component_name,$module=NULL,$type=NUll){
 		$type=is_null($type) ? 'components':$type;
 		return self::_loadClass($component_name,$module,$type);
 	}
 }
 
 
 
 

/* End of file : SystemComponent.php */ 