<?php
/**
 * OpenID による認証条件
 *
 * @author  riaf <riafweb@gmail.com>
 * @version $Id$
 */

Rhaco::import('network.http.model.RequestLoginCondition');
Rhaco::import('OpenIDAuth'); // arbo

class RequestLoginConditionOpenID extends RequestLoginCondition
{
    var $url;
    var $endPointUrl;
    
    var $serverVarName = 'openid_server';
    
    function RequestLoginConditionOpenID($url=null, $endPointUrl=null){
        $this->__init__($url, $endPointUrl);
    }
    function __init__($url, $endPointUrl){
        $this->url = is_null($url)? Rhaco::url(): $url;
        $this->endPointUrl = is_null($endPointUrl)? Rhaco::url('login'): $endPointUrl;
    }
    
    function condition($request){
        $openid = new OpenIDAuth();
        $variables = $request->getVariable();
        if($openid->validate($variables)){
            return true;
        }
        return false;
    }
    function after($request=null){
    }
    function invalid($request){
        if($request->isVariable($this->serverVarName)){
            $openid = new OpenIDAuth($request->getVariable($this->serverVarName));
            $openid->request();
            $endPointURL = $openid->getEndPointURL();
            if(empty($endPointURL)) return false;
            $openid->addParameter('openid.sreg.required', Rhaco::constant('openid.sreg.required', 'nickname'));
            $openid->addParameter('openid.sreg.optional', Rhaco::constant('openid.sreg.optional', 'email'));
            $openid->addParameter('openid.identity', Rhaco::constant('openid.identity', 'http://specs.openid.net/auth/2.0/identifier_select'));
            $openid->addParameter('openid.claimed_id', Rhaco::constant('openid.claimed_id', 'http://specs.openid.net/auth/2.0/identifier_select'));
            if(Rhaco::isVariable('openid.extraParameter')){
                $params = Rhaco::getVariable('openid.extraParameter');
                foreach($params as $name => $value){
                    $openid->addParameter($name, $value);
                }
            }
            $this->_redirectForm($endPointURL, $openid->getEndPointHeaders($this->url, $this->endPointURL));
        }
    }
    function _redirectForm($url, $headers){
print <<<HTML
<html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head>
<body onload="document.login.submit();">
    <form action="{$url}" method="post" name="login">
HTML;
    foreach($headers as $name => $value){
        printf('<input type="hidden" name="%s" value="%s" />', $name, $value);
    }
print <<<HTML
        <input type="submit" value="login" />
    </form>
</body>
</html>
HTML;
        Rhaco::end();
    }
}