<?php

use yii\helpers\Html;
/* @var $allTasks array */
/* @var $closedTasks array */
/* @var $overdueTasks array */

$this->title = "Отчёты";
$this->params['breadcrumbs'][] = $this->title;


?>

<h1><?= Html::encode($this->title) ?></h1>

<article class="tasksReport" style="margin-top: 30px;">
    <h3 class="alert alert-info">Список всех задач</h3>
    <p>Стоит добавить сюда какую-то статистику для админки и, наверное, пагинацию</p>
    <? //TODO:: http://www.webapplex.ru/postranichnaya-navigacziya-v-yii-2.x ?>
    <div class="list-group">
        <? foreach ($allTasks as $item) : ?>
            <a href="#" class="list-group-item">
                <div class="row">
                    <div class="col-md-6"><h4 class="list-group-item-heading"><?=HTML::encode($item->title)?></h4>
                        <p class="list-group-item-text"><?=HTML::encode($item->body)?></p></div>
                    <?php //TODO:: доделать тут вывод данных о тасках, исполнитель, deadline, статус ?>
                    <div class="col-md-6"></div>
                </div>
            </a>
        <? endforeach; ?>
    </div>
</article>
<hr>
<article class="allTasks"">
    <h3 class="alert alert-info">Все выполненные задачи</h3>
    <p>Если задачу выполнили, то он попадёт в этот список</p>
    <? //TODO:: http://www.webapplex.ru/postranichnaya-navigacziya-v-yii-2.x ?>
    <div class="list-group"">
        <? foreach ($closedTasks as $item) : ?>
            <a href="#" class="list-group-item">
                <div class="row">
                    <div class="col-md-6"><h4 class="list-group-item-heading"><?=HTML::encode($item->title)?></h4>
                        <p class="list-group-item-text"><?=HTML::encode($item->body)?></p></div>
                    <?php //TODO:: доделать тут вывод данных о тасках, исполнитель, deadline, статус ?>
                    <div class="col-md-6"></div>
                </div>
            </a>
        <? endforeach; ?>
    </div>
</article>
<hr>
<article class="allTasks"">
<h3 class="alert alert-info">Все просроченные задачи</h3>
<p>Список задач, срок выполнения которых истёк</p>
<? //TODO:: http://www.webapplex.ru/postranichnaya-navigacziya-v-yii-2.x ?>
<div class="list-group"">
<? foreach ($overdueTasks as $item) : ?>
    <a href="#" class="list-group-item">
        <div class="row">
            <div class="col-md-6"><h4 class="list-group-item-heading"><?=HTML::encode($item->title)?></h4>
                <p class="list-group-item-text"><?=HTML::encode($item->body)?></p></div>
            <?php //TODO:: доделать тут вывод данных о тасках, исполнитель, deadline, статус ?>
            <div class="col-md-6"></div>
        </div>
    </a>
<? endforeach; ?>
</div>
</article>