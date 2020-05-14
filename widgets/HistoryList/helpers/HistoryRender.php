<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 07.05.2020
 */

namespace app\widgets\HistoryList\helpers;


use app\models\events\base\HistoryEvent;
use app\widgets\HistoryList\interfaces\HistoryInterface;
use yii\helpers\Inflector;
use yii\web\NotFoundHttpException;

class HistoryRender
{
    /** @var HistoryInterface */
    private $model;

    /** @var HistoryEvent */
    private $event;

    /**
     * HistoryRender constructor.
     * @param HistoryInterface $model
     */
    public function __construct(HistoryInterface $model)
    {
        $this->model = $model;
        $this->loadEvent();
    }

    /**
     * Load event and set model
     */
    private function loadEvent()
    {
        $className = 'app\models\events\\' . Inflector::camelize($this->model->getEventName());
        if (!class_exists($className)) {
            throw new NotFoundHttpException('Event not exists');
        }
        $this->event = new $className($this->model);
    }

    /**
     * @return HistoryHtmlElement[]
     */
    public function html(): array
    {
        $this->event->html();
        return $this->event->getElements();
    }

    /**
     * @return string
     */
    public function csv(): string
    {
        return $this->event->body();
    }
}
