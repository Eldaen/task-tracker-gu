<?php

use yii\helpers\Html;
/* @var $task \app\models\Tasks */

$this->title = "Открытые задачи";
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="well">
    <h1><?= Html::encode($task->title) ?></h1>
    <p><?= $task->body ?></p>
</div>


