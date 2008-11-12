<?php
/**
 * Clipp API
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @version $Id$
 */

Rhaco::import('network.http.ServiceRestAPIBase');
Rhaco::import('model.ClippAtomEntry10');

class ClippAPI extends ServiceRestAPIBase
{
    var $url = 'http://clipp.in/service/';
    var $method;

    function ClippAPI($user, $pass){
        parent::ServiceRestAPIBase($this->url);
        $this->setBasicAuthorization($user, $pass);
    }

    function add($entry){
        $this->method = 'add';
        if(Variable::istype('ClippAtomEntry10', $entry)){
            $this->browser->setRequestHeader(array(
                'type' => 'application/atom+xml;type=entry;charset=utf-8',
                'rawdata' => '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL . $entry->get()
            ));
            return $this->post();
        }
        return false;
    }

    function buildUrl($hash=array()){
        return parent::buildUrl($hash, array(), $this->method);
    }
}
