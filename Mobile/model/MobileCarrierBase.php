<?php
/**
 * MobileCarrierBase
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @license New BSD License
 * @version $Id$
 */

class MobileCarrierBase
{
    var $userAgent;

    function MobileCarrierBase(){
        $args = func_get_args();
        if(func_num_args() > 0){
            $this->userAgent = array_shift($args);
        }
        $this->__init__($args);
    }
    function __init__($args){
        // filter とかで、動作変えられるようにしたりしてみたい
    }

    /**
     * Docomo ですか？いいえ、違います
     * Variable::istype('Docomo', $this) でも良いような
     */
    function isDocomo(){
        return false;
    }
    /**
     * Au ですかそうですか
     */
    function isAu(){
        return false;
    }
    /**
     * 大丈夫ですか？
     */
    function isSoftbank(){
        return false;
    }
    /**
     * いまどき3Gじゃないなんてぷぷぷ
     */
    function is3G(){
        return false;
    }
}
