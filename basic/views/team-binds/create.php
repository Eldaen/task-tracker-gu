<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TeamBinds */
/* @var $teams array */
/* @var $users array */

$this->title = 'Create Team Binds';
$this->params['breadcrumbs'][] = ['label' => 'Team Binds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-binds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams,
        'users' => $users
    ]) ?>

</div>
