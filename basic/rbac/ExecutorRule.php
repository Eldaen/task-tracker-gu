<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.11.2017
 * Time: 13:07
 */
namespace app\rbac;

use app\models\Tasks;
use yii\helpers\Html;

class ExecutorRule extends \yii\rbac\Rule
{
    public function execute($user, $item, $params)
    {
        return isset($params['id']) ?
            (new Tasks)::find()->where(['id' => HTML::encode($params['id'])])->one()->executor_id == $user :
            false;
    }

}