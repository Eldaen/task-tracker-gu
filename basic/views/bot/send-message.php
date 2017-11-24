<?php
use yii\helpers\Html;
use yii\widgets\Pjax;

$myScript = <<< JS
setInterval(function()
{
    document.getElementById('reloadBtn').click();
}, 10000)
JS;

$this->registerJs($myScript);
?>

<h1>Тест Телеграм бота</h1>
<?= Html::a('Обновить сообщения', ['bot/index'],
    [
        'class' => 'btn btn-s, btn-info',
        'id' => 'reloadBtn'
    ]) ?>

<div class="well">
    <? Pjax::begin() ?>
    <? foreach ($data as $message) : ?>
        <p><?= Html::encode($message)?></p>
    <? endforeach; ?>
    <? Pjax::end() ?>
</div>

