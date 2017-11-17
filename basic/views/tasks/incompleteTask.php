<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $task \app\models\Tasks */
/* @var $model \app\models\CompleteTaskForm */

$this->title = "Открытые задачи";
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="well">
    <h1><?= Html::encode($task->title) ?></h1>
    <p><?= $task->body ?></p>
</div>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'completion_message')->textarea(['rows' => 3]) ?>

        <div class="form-group">
            <?= Html::submitButton('Завершить задачу', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


