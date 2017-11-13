<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $teams array */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline')->input('date', ['value' => date('Y-m-d', $model->deadline)]) ?>

    <? //TODO:: вот тут надо бы чтобы по дефолту открывалось заданное значение, но что-то пока не осенило ?>
    <?= $form->field($model, 'team_id')
        ->dropDownList(['1' => 'Открытое', '0' => 'Закрытое'])
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
