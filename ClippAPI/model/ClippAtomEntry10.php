<?php
/**
 * ClippAtomEntry10
 *
 * @author  riaf <riafweb@gmail.com>
 * @package arbo
 * @version $Id$
 */

Rhaco::import('tag.feed.Atom10');

class ClippAtomEntry10 extends AtomEntry10
{
    var $category;

    // for clipp
    var $clipp_imageAddress;
    var $clipp_embedCode;
    var $clipp_quote;
    var $clipp_description;
    var $clipp_rating;
    var $clipp_publicity;

    function get(){
        $outTag = new SimpleTag("entry", "", array('xmlns' => 'http://www.w3.org/2005/Atom', 'xmlns:clipp' => 'http://clipp.in/service/ns'));
        $outTag = $this->_get($outTag);
        return $outTag->get();
    }
    function _get($outTag){
        $outTag = parent::_get($outTag);

        foreach(ArrayUtil::arrays($this->category) as $category){
            if(!empty($category)) $outTag->addValue(new SimpleTag("category", "", array('term' => $category)));
        }
        if(!empty($this->clipp_imageAddress)) $outTag->addValue(new SimpleTag('clipp:imageAddress', '', array('href' => $this->clipp_imageAddress)));
        if(!empty($this->clipp_embedCode)) $outTag->addValue(new SimpleTag('clipp:embedCode', '', array('href' => $this->clipp_embedCode)));
        if(!empty($this->clipp_quote)) $outTag->addValue(new SimpleTag('clipp:quote', '', array('href' => $this->clipp_quote)));
        if(!empty($this->clipp_description)) $outTag->addValue(new SimpleTag('clipp:description', '', array('href' => $this->clipp_description)));
        if(!empty($this->clipp_rating)) $outTag->addValue(new SimpleTag('clipp:rating', '', array('href' => $this->clipp_rating)));
        if(!empty($this->clipp_publicity)) $outTag->addValue(new SimpleTag('clipp:publicity', '', array('href' => $this->clipp_publicity)));
        return $outTag;
    }

    function setCategory($value){
        return $this->category = $value;
    }
    function getCategory(){
        return $this->category;
    }
    // 複数指定したいじゃん？
    function appendCategory($value){
        $this->category = array_merge(ArrayUtil::arrays($this->category), ArrayUtil::arrays($value));
    }

    function setClippImageAddress($value){
        $this->clipp_imageAddress = $value;
    }
    function getClippImageAddress(){
        return $this->clipp_imageAddress;
    }
    function setClippEmbedCode($value){
        $this->clipp_embedCode = $value;
    }
    function getClippEmbedCode(){
        return $this->clipp_embedCode;
    }
    function setClippQuote($value){
        $this->clipp_quote = $value;
    }
    function getClippQuote(){
        return $this->clipp_quote;
    }
    function setClippDescription($value){
        $this->clipp_description = $value;
    }
    function getClippDescription(){
        return $this->clipp_description;
    }
    function setClippRating($value){
        $this->clipp_rating = $value;
    }
    function getClippRating(){
        return $this->getClippRating;
    }
    function setClippPiblicity($value){
        $this->clipp_publicity = $value;
    }
    function getClippPublicity(){
        return $this->clipp_publicity;
    }
}
