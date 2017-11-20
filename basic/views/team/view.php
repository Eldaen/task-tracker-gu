<?php

use yii\helpers\Html;
/* @var $team \app\models\Teams */
/* @var $users array */

$this->title = "Открытые задачи";
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="well">
    <h1><?= Html::encode($team->name) ?></h1>
    <p><?= $team->description ?></p>
</div>

<article class="usersList" style="margin-top: 30px;">
    <h3 class="alert alert-info">Участники команды</h3>
    <? //TODO:: http://www.webapplex.ru/postranichnaya-navigacziya-v-yii-2.x ?>
    <div class="list-group">
        <? foreach ($users as $item) : ?>
            <a href="#" class="list-group-item">
                <div class="row">
                    <div class="col-md-6"><h4 class="list-group-item-heading"><?=HTML::encode($item->user->username)?></h4>
                        <p class="list-group-item-text">ID: <?=HTML::encode($item->user->id)?></p></div>
                    <div class="col-md-6">Здесь должна бы быть какая-то инфа о пользователе, его аватарка итд, но пока что-то нет.</div>
                </div>
            </a>
        <? endforeach; ?>
    </div>
</article>


