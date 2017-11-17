<?php

use yii\helpers\Html;
/* @var $allTasks array */
/* @var $closedTasks array */
/* @var $overdueTasks array */

$this->title = "Открытые задачи";
$this->params['breadcrumbs'][] = $this->title;


?>

<h1><?= Html::encode($this->title) ?></h1>

<article class="tasksReport" style="margin-top: 30px;">
    <p>Здесь отображены все ваши текущие задачи</p>
    <? //TODO:: http://www.webapplex.ru/postranichnaya-navigacziya-v-yii-2.x ?>
    <div class="list-group">
        <? foreach ($tasks as $item) : ?>
            <? if($item->deadline > time()) : ?>
            <a href="<?= \yii\helpers\Url::to(['tasks/view', 'id' => $item->id])?>" class="list-group-item">
            <?  else : ?>
            <a href="<?= \yii\helpers\Url::to(['tasks/view', 'id' => $item->id])?>" class="list-group-item" style="background-color: #f500004f">
            <? endif; ?>
                <div class="row">
                    <div class="col-md-6"><h4 class="list-group-item-heading"><?=HTML::encode($item->title)?></h4>
                        <p class="list-group-item-text"><?=HTML::encode($item->body)?></p></div>
                    <?php //TODO:: доделать тут вывод данных о тасках deadline ?>
                    <div class="col-md-6"></div>
                </div>
            </a>
        <? endforeach; ?>
    </div>
</article>


