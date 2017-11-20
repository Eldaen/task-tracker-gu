<?php

use yii\helpers\Html;
/* @var $teams array */

$this->title = "Ваши комманды";
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<article class="teamReport" style="margin-top: 30px;">
    <p>В этом списке приведены все команды, в которых вы состоите. Кликните, чтобы ознакомиться со списком учатсников и описанием команды.</p>
    <? //TODO:: http://www.webapplex.ru/postranichnaya-navigacziya-v-yii-2.x ?>
    <div class="list-group">
        <? foreach ($teams as $item) : ?>
            <a href="<?= \yii\helpers\Url::to(['team/view', 'id' => $item->team->id])?>" class="list-group-item">
                <div class="row">
                    <div class="col-md-6"><h4 class="list-group-item-heading"><?=HTML::encode($item->team->name)?></h4>
                        <p class="list-group-item-text"><?=HTML::encode(\yii\helpers\StringHelper::truncate($item->team->description, 255))?></p></div>
                    <?php //TODO:: доделать тут вывод данных о тасках deadline ?>
                    <div class="col-md-6"></div>
                </div>
            </a>
        <? endforeach; ?>
    </div>
</article>


