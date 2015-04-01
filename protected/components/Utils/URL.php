<?php

/**
 * @desc   :网络访问帮助
 * @author haven
 */
class URL
{


    /**
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function errorServer($r = '')
    {
        header('Content-type: ' . 'application/json');
        $_retArr = array();
        $_retArr['code'] = '500';
        $_retArr['msg'] = empty($r) ? '服务器错误' : $r;
        $_retArr['data'] = null;
        echo CJSON::encode($_retArr);
        exit;
    }

    /**
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function errorParams($r = '')
    {
        header('Content-type: ' . 'application/json');
        $_retArr = array();
        $_retArr['code'] = '502';
        $_retArr['msg'] = $r;
        $_retArr['data'] = null;
        echo CJSON::encode($_retArr);
        exit;
    }

    /**
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function error403()
    {
        header('Content-type: ' . 'application/json');
        $_retArr = array();
        $_retArr['code'] = '403';
        $_retArr['msg'] = 'bad request';
        $_retArr['data'] = null;
        echo CJSON::encode($_retArr);
        exit;
    }

    /**
     * 封装get
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function GET($k, $v = null)
    {
        return Yii::app()->request->getParam($k, $v);
    }


    /**
     * 获取body
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function getBody()
    {
        $body = Yii::app()->request->getRawBody();
        if (!is_null($body)) {
            return CJSON::decode($body, true);
        } else {
            return null;
        }
    }

    /**
     * json 返回
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function renderJson($result = null, $return = false)
    {
        $output = array('code' => null, 'msg' => null, 'result' => null);
        array_merge($output, $result);
        $output = json_encode($output, true);
        if ($return)
            return $output;
        else
            echo $output;
    }

    /**
     * 参数校验
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function checkParam($param, $vKey)
    {
        $result = '';
        $badParam = array();
        foreach ($param as $k => $v) {
            if (in_array($k, $vKey)) {
                if (empty($v)) {
                    array_push($badParam, $k);
                }
            }
        }
        if (!empty($badParam)) {
            $result .= implode(',', $badParam) . ' is blank!';
        }
        return $result;
    }

    /**
     * 参数校验
     * @return mixed
     * @author haven<chchmlml@163.com>
     */
    public static function validateParam()
    {
        $r = true;
        $deviceId = Yii::app()->request->getParam("deviceId", "");
        $token = Yii::app()->request->getParam("token", "");
        if (empty($deviceId) || empty($token)) {
            $r = false;
        }
        $key = 'HCKP2015%^78';
        $currentToken = md5($deviceId . $key);
        if (mb_strtoupper($currentToken) != $token) {
            $r = false;
        }
        return $r;
    }

    /**
     * 返回标准的json成功解析,0为失败，1为成功
     * @param unknown $sflag
     * @param unknown $obj
     * @return multitype:number unknown
     */
    public static function retJson($sflag, $msg, $obj = null)
    {
        header('Content-type: ' . 'application/json');
        $_retArr = array();
        $_retArr['code'] = $sflag;
        $_retArr['msg'] = $msg;
        if (!is_null($obj)) {
            $_retArr['data'] = $obj;
        }
        echo CJSON::encode($_retArr);
        die();
    }
}