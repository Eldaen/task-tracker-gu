<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TeamBinds */

$this->title = $model->team_id;
$this->params['breadcrumbs'][] = ['label' => 'Team Binds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-binds-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'team_id' => $model->team_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'team_id' => $model->team_id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'team_id',
            'user_id',
        ],
    ]) ?>

</div>
