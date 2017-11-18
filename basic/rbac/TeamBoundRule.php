<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.11.2017
 * Time: 13:07
 */
namespace app\rbac;

use app\models\TeamBinds;
use yii\helpers\Html;

class TeamBoundRule extends \yii\rbac\Rule
{
    public function execute($user, $item, $params)
    {
        //TODO: не уверен что такая проверка корректна, спросить преподавателя.
        // Здесь мы возвращаем результат поиска по модели TeamBinds, где у нас team_id должен быть из параметров и
        // user_id должен быть тот что сейчас у пользователя, и если такая модель есть, то это, вроде как, true, нет, то false
        // вроде даже работает
        return isset($params['id']) ?
            (new TeamBinds())::find()->where(['team_id' => HTML::encode($params['id']), 'user_id' => $user])->one() :
            false;
    }

}