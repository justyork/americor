<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 07.05.2020
 */

namespace app\widgets\HistoryList\interfaces;


interface HistoryInterface
{
    /**
     * @param $className
     * @return HistoryElementInterface
     */
    public function loadObjectModel($className): HistoryElementInterface;

    /** Get event name
     * @return string
     */
    public function getEventName(): string;

    /**
     * @return string
     */
    public function getUserName(): string;

    /**
     * @return string
     */
    public function getDate(): string;

}
