<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 14.05.2020
 */

namespace app\widgets\HistoryList;


use app\widgets\HistoryList\helpers\HistoryRender;
use yii\base\Widget;
use yii\web\NotFoundHttpException;

class HistoryElementWidget extends Widget
{
    public $model;
    protected $renderElements;

    public function init()
    {
        $this->renderElements = (new HistoryRender($this->model))->html();
    }

    public function run()
    {
        return $this->render('_item_render', [
            'renderElements' => $this->renderElements
        ]);
    }
}
