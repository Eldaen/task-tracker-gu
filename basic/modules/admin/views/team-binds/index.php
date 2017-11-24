<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamBindsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Team Binds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-binds-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Team Binds', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Username',
                'value'     => function ($data) {
                    return $data->user->username;
                },
            ],
            [
                'attribute' => 'Team',
                'value'     => function ($data) {
                    return $data->team->name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
