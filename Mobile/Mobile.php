<?php
/**
 * Mobile
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @license New BSD License
 * @version $Id$
 */
Rhaco::import('model.MobileCarrierBase');
Rhaco::import('model.Docomo');
Rhaco::import('model.Au');
Rhaco::import('model.Softbank');

class Mobile
{
    /**
     * キャリアに適合する CarrierModel を返す
     */
    public static function getCarrier($ua=null){
        if(is_null($ua)) $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : getenv('HTTP_USER_AGENT');
        if(stripos($ua, 'docomo') !== false){
            return new Docomo();
        } else if(preg_match('/^(J-PHONE|Vodafone|Softbank)/i', $ua)) {
            return new Softbank();
        } else if(preg_match('/^(UP\.Browser|KDDI)/i', $ua)){
            return new Au();
        }

        return null;
    }
}
