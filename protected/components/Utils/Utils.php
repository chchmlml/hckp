<?php
/**
 * @desc:通用类接口
 * ==============================================
 * 版权所有HCKP  2015-2016 
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2015-3-18 下午2:55:13
 * @author:dayunlong <yl-831025@163.com>
 * @version: 1.0.0.0
 */
class Utils
{
    /**
     * 获取用户密码 的md5密码
     * @param unknown $password
     * @return string
     * @date  : 2015-3-31 下午8:24:54
     * @author: dayunlong<gengjun@qiyi.com>
     */
    public static function getUserPassword($password)
    {
        $privite_key = '&#)!23762Jdgf';
        return md5($password . $privite_key);
    }

    /**
     *
     * @param unknown $content
     * @return boolean
     * @date  : 2015-3-31 下午8:34:19
     * @author: dayunlong<gengjun@qiyi.com>
     */
    public static function getTwoDimensionalCodePic($content, $type = 'order', $errorCorrectionLevel = 'H', $matrixPointSize = 6)
    {
        if (empty($content)) {
            return false;
        }
        if (empty($type)) {//判断type是否允许的
            $type = 'order';
        }
        $filename = md5($content . '|' . $type) . '.png';
        //写文件目录
        $write_path = APP_DATA_PATH . DS . $type;
        //判断目录是否存在
        if (!is_dir($write_path)) {
            mkdir($write_path);
        }
        $write_path_file = $write_path . DS . $filename;
        $web_path = HTTP_RESOURCES_DATA . DS . $type . DS . $filename;
        //Yii::import('application.extensions.qrencode.qrlib');//加载二维码扩展插件
        include_once APP_PATH . DS . 'protected' . DS . 'extensions' . DS . 'qrencode' . DS . 'qrlib.php';
        QRcode::png($content, $write_path_file, $errorCorrectionLevel, $matrixPointSize, 2);
        return $web_path;
    }

    /**
     * url组成
     * @param unknown $route
     * @param unknown $params
     * @return string
     * @date  : 2015-3-31 下午10:05:45
     * @author: dayunlong<gengjun@qiyi.com>
     */
    public static function url($route, $params = array())
    {
        $url = APP_HOST . DS . $route;
        if (!empty($params)) {
            $i = 0;
            foreach ($params as $key => $v) {
                $i++;
                $url .= $i == 1 ? '?' : '&';
                $url .= $key . '=' . $v;
            }
        }
        return $url;
    }
}