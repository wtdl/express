<?php
/**
 * 深圳市易知互联网科技有限公司
 * User: pengjian(szpengjian@gmail.com)
 * Date: 19-1-26
 * Time: 下午10:56
 */

namespace Wtdl\Express;

use GuzzleHttp\Client;
use Exception;

class Express
{

    /**
     * @var Client
     */
    static $http = null;


    /**
     * 查快递方法
     * @param $postId
     * @param string $type
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function query($postId, $type = '')
    {
        $type = $type === '' ? self::queryType($postId) : $type;
        if (is_null($type)) {
            return "无用的快递单号: $postId 。";
        }
        $url = "http://www.kuaidi100.com/query?type=".$type."&postid=".$postId."&temp=".mt_rand(100000,200000);
//        $url = "https://www.kuaidi100.com/query?type=$type&postid=$postId&id=1&valicode=&temp=0.005566359421234068";
        $data = static::$http->request('get', $url)->getBody();
        return \GuzzleHttp\json_decode($data, true);
    }


    /**
     * 查询快递类型方法
     * @param $postId
     * @return |null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function queryType($postId)
    {
        if (!(static::$http instanceof Client)) {
            static::$http = new Client();
        }
        $data = \GuzzleHttp\json_decode(static::$http->request('get', "http://www.kuaidi100.com/autonumber/autoComNum?text=$postId")->getBody(), true);
        if (count($data['auto']) > 0) {
            return $data['auto'][0]['comCode'];
        } else {
            return null;
        }
    }


}