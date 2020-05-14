<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 07.05.2020
 */

namespace app\models\events\base;


use app\widgets\HistoryList\helpers\HistoryBaseElement;
use app\widgets\HistoryList\helpers\HistoryCsvElement;
use app\widgets\HistoryList\helpers\HistoryHtmlElement;
use app\widgets\HistoryList\interfaces\HistoryElementInterface;
use app\widgets\HistoryList\interfaces\HistoryInterface;

abstract class HistoryEvent
{
    /** @var HistoryElementInterface */
    protected $model;

    /** @var HistoryInterface */
    protected $historyModel;

    /** @var array */
    protected $renderStack = [];

    /**
     * HistoryEvent constructor.
     * @param HistoryInterface $historyModel
     */
    public function __construct(HistoryInterface $historyModel)
    {
        $this->historyModel = $historyModel;
        $this->loadModel();
    }

    /**
     * Load model by history
     */
    public function loadModel(): void
    {
        $this->model = $this->historyModel->loadObjectModel($this->modelName());
    }

    /** Get model name
     * @return string
     */
    abstract protected function modelName(): string;

    /**
     * Generate elements for html
     */
    abstract public function html(): void;

    /**
     * Get body text for html and csv
     */
    abstract public function body(): string;

    /**
     * @return HistoryBaseElement[]
     */
    public function getElements(): array
    {
        return $this->renderStack;
    }

    /** Get event name
     * @return string
     */
    abstract protected function eventName(): string;

    /**
     * Hook for before init
     */
    protected function init()
    {
    }

    /**
     * @param HistoryBaseElement $element
     */
    protected function addElement(HistoryBaseElement $element)
    {
        $this->renderStack[] = $element;
    }

}
