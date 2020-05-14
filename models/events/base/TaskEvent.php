<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 14.05.2020
 */

namespace app\models\events\base;

use app\models\Task;
use app\widgets\HistoryList\helpers\HistoryHtmlElement;
use Yii;

abstract class TaskEvent extends HistoryEvent
{

    public function modelName(): string
    {
        return Task::class;
    }

    public function html(): void
    {
        // body
        $this->addElement((new HistoryHtmlElement())
            ->class('success')
            ->addText($this->body())
        );

        // name
        $this->addElement((new HistoryHtmlElement())
            ->class('info')
            ->addText($this->historyModel->getUserName())
        );

        // time
        $this->addElement((new HistoryHtmlElement())
            ->class('warning')
            ->addDate($this->historyModel->getDate())
        );
    }

    public function body(): string
    {
        return Yii::t('app', $this->eventName()) . ':' . $this->model->title;
    }

}
