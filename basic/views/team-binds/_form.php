<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TeamBinds */
/* @var $form yii\widgets\ActiveForm */
/* @var $teams array */
/* @var $users array */
?>

<div class="team-binds-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_id')
        ->dropDownList(ArrayHelper::map($teams, 'id', 'name')
        ) ?>
    <?= $form->field($model, 'user_id')
        ->dropDownList(ArrayHelper::map($users, 'id', 'username')
        ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
