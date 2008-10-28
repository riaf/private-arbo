<?php
/**
 * Au
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @license New BSD License
 * @version $Id$
 */
Rhaco::import('model.MobileCarrierBase');

class Au extends MobileCarrierBase
{
    function isAu(){
        return true;
    }
}
