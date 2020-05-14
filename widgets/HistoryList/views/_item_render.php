<?php
/**
 * Author: York
 * Email: yorkshp@gmail.com
 * Date: 14.05.2020
 */

use app\widgets\HistoryList\helpers\HistoryRenderElement;

/* @var $renderElements HistoryRenderElement[] */
?>
<?php if ($renderElements): ?>
    <?php foreach ($renderElements as $element): ?>
        <div class="bg-<?= $element->getClassName() ?>">
            <?= $element->getElements() ?>
        </div>
    <?php endforeach ?>
<?php endif ?>

