<?php
/**
 * Muboh API
 *
 * $muboh = new MubohAPI();
 * $ret = $muboh->puchipuchi('Arai', 'hardly', 'Put more spirit into it!');
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @version $Id$
 */
Rhaco::import('network.http.ServiceRestAPIBase');
Rhaco::import('tag.model.SimpleTag');

class MubohAPI extends ServiceRestAPIBase
{
    var $url = 'http://m.unoh.net/';
    var $method;

    function puchipuchi($staff='Arai', $action='', $comment=''){
        $this->method = 'puchipuchi';
        $result = $this->post(compact('staff', 'action', 'comment'));
        if(SimpleTag::setof($tag, $result, 'rsp')){
            return $tag->toHash();
        }
        return false;
    }

    function buildUrl($hash=array()){
        return parent::buildUrl($hash, array(), $this->method);
    }
}
