<?php
/**
 * Tumblr API
 *
 * @author  riaf<riafweb@gmail.com>
 * @package arbo
 * @license New BSD License
 * @version $Id$
 */
Rhaco::import('network.http.ServiceRestAPIBase');

class TumblrAPI extends ServiceRestAPIBase
{
    var $url = 'http://www.tumblr.com/api/';
    var $login;
    var $password;
    var $method;

    function TumblrAPI($login, $password){
        parent::ServiceRestAPIBase();
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * 投稿
     */
    function write($params, $type='Regular'){
        $this->method = 'write';
        return $this->post(array_merge($params,
            array(
            'email' => $this->login,
            'password' => $this->password,
            'type' => $type,
        )));
    }

    /**
     * URL を生成
     */
    function buildUrl($hash=array()){
        $params = array(
            'email' => $this->login,
            'password' => $this->password,
        );
        return parent::buildUrl($hash, $params, $this->method);
    }
}