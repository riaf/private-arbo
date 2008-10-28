<?php
/**
 * Softbank
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @license New BSD License
 * @version $Id$
 */
Rhaco::import('model.MobileCarrierBase');

/**
 * iPhone 対応とかもしたいなー
 */

class Softbank extends MobileCarrierBase
{
    function isSoftbank(){
        return true;
    }
}
