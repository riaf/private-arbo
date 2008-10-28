<?php
/**
 * HtmlFormExceptionFilter
 *
 * @author  riaf <riafweb@gmail.com>
 * @license New BSD License
 * @version $Id$
 */

// Form の Input 毎にエラーを引っ付けるフィルタ

class HtmlFormExceptionFilter
{
    var $class = 'exception';
    var $tagName = 'span';

    function publish($src, &$paraser){
        if(ExceptionTrigger::isException() && stripos($src, 'form ') !== false && SimpleTag::setof($tag, $src)){
            foreach($tag->getIn('input') as $input){
                if(ExceptionTrigger::invalid($input->param('name'))){
                    // どうやら発行されているようだ
                    $exceptions = ExceptionTrigger::get($input->param('name'));
                    $addHtml = '';
                    foreach($exceptions as $e){
                        $addHtml .= sprintf('<%s class="%s">%s</%s>', $this->tagName, $this->class, $e->getMessage(), $this->tagName);
                    }
                    $src = str_replace($input->getPlain(), $input->getPlain(). $addHtml, $src);
                }
            }
        }
        return $src;
    }
}

