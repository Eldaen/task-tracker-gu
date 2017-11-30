<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30.11.2017
 * Time: 11:56
 */

namespace app\controllers;


use app\models\Tasks;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Html;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class TasksRestController extends ActiveController
{
    public $modelClass = 'app\models\Tasks';

    public function behaviors()
    {
        $behaviours = parent::behaviors();
        $behaviours['authentificator']['class'] = HttpBasicAuth::className();
        $behaviours['authentificator']['auth'] = function ($user, $password) {
            $user = User::findByUsername($user);
            if ($user != null && $user->validatePassword($password)) {
                return $user;
            }
            return null;
        };

        $behaviours['access']['class'] = AccessControl::className();
        $behaviours['access']['rules'] = [
            /*[
                'allow' => true,
                'actions' => ['view'],
                'roles' => ['BasicUser']
            ],*/
            [
                'allow' => true,
                'actions' => ['index'],
                'roles' => ['CanSeeTasks']
            ],
            [
                'allow' => true,
                'actions' => ['view'],
                'roles' => ['TaskDetailedView', 'BasicUser']
            ]
        ];

        return $behaviours;
    }

    public function actionIndex()
    {
        //status 1 - все активные
        return new ActiveDataProvider([
            'query' => Tasks::find()->where(
                [
                    'executor_id' => Yii::$app->user->getIdentity()->getId(),
                    'status' => 1
                ]),
        ]);
    }

    public function actions()
    {
        $myActions = parent::actions();

        //Запрещаем всем доступ к действиям delete, create и view
        unset($myActions['delete'], $myActions['create']);

        return $myActions;
    }

    //Проверяем доступ, правило почти один в один как в RBAC
    public function checkAccess($action, $model = null, $params = [])
    {
        switch($action)
        {
            case 'view':
                $executor_id = Tasks::find()->where(['id' => HTML::encode($params['id'])])->one()->executor_id;
                $user_id = Yii::$app->user->getIdentity()->getId();
                if(isset($params['id']) && $executor_id == $user_id)
                {
                    return null;
                } else {
                    throw new ForbiddenHttpException('В доступе к задаче отказано.');
                }
                break;

        }
    }


}