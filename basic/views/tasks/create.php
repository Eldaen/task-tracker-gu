<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tasks */

$this->title = 'Create Tasks';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams
    ]) ?>

    <? if(Yii::$app->session->hasFlash('not_logged_tasks')): ?>
    <div class="alert alert-danger"><?= Yii::$app->session->getFlash('not_logged_tasks')?></div>
    <? endif; ?>

</div>
