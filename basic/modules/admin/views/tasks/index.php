<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'body:ntext',
            //TODO: понять, почему пропадает поиск по юзеру в GridView и что можно придумать
            //TODO: да и время можно бы переводить в читаемое
            [
                'attribute' => 'Creator',
                'value'     => function ($data) {
                    return $data->creator->username;
                },
            ],
            [
                'attribute' => 'Executor',
                'value'     => function ($data) {
                    return $data->executor->username;
                },
            ],
            'created_at:datetime',
            'status',
            // 'updated_at',
            // 'deadline',
            // 'completion_time:datetime',
            // 'team_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
