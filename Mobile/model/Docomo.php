<?php
/**
 * Docomo
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @license New BSD License
 * @version $Id$
 */
Rhaco::import('model.MobileCarrierBase');

class Docomo extends MobileCarrierBase
{
    var $name;
    var $version;

    var $_isFOMA = false;

    function __init__($args){
        parent::__init__($args);
        // FOMAですか？
        list($h, $unit) = explode(' ', $this->userAgent, 2);
        list(, $version, $name) = explode('/', $h);
        if($unit && preg_match('/^([^\(]+)\(/', $unit, $match)){
            $this->_isFOMA = true;
            $name = $match[1];
        }
        $this->name = $name;
        $this->version = $version;
    }

    function isDocomo(){
        return true;
    }
    function is3G(){
        return $this->isFOMA();
    }
    function isFOMA(){
        return $this->_isFOMA;
    }
}
