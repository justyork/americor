<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 14.05.2020
 */

namespace app\widgets\HistoryList\helpers;


use app\widgets\DateTime\DateTime;

class HistoryHtmlElement extends HistoryBaseElement
{
    private $className = '';


    public function getClassName(): string
    {
        return $this->className;
    }

    public function class($class): HistoryHtmlElement
    {
        $this->className = $class;
        return $this;
    }

    public function addDate($date): HistoryHtmlElement
    {
        $this->addText(DateTime::widget(['dateTime' => $date]));
        return $this;
    }
}
