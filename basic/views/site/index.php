<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Вы попали сайт курсового проекта Geek Univercity Web Development.</p>

        <p><?= Html::a('Зарегистрируйтесь', ['site/login'],['class' => 'btn btn-lg btn-success'])?></p>
    </div>
</div>
