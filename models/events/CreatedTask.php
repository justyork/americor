<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 14.05.2020
 */

namespace app\models\events;

use app\models\events\base\TaskEvent;

class CreatedTask extends TaskEvent
{

    protected function eventName(): string
    {
        return 'Task created';
    }
}
