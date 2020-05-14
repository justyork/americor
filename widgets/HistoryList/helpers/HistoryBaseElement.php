<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 14.05.2020
 */

namespace app\widgets\HistoryList\helpers;


class HistoryBaseElement
{

    protected $elements = [];

    public function addText($element): HistoryBaseElement
    {
        $this->elements[] = $element;
        return $this;
    }

    public function getElements($delimiter = ' '): string
    {
        return implode($delimiter, $this->elements);
    }

}
