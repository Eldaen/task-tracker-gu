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
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

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
        return new ActiveDataProvider([
            'query' => Tasks::find(),
        ]);
    }

    public function actions()
    {
        $myActions = parent::actions();

        //Запрещаем всем доступ к действиям delete, create и view
        unset($myActions['delete'], $myActions['create']);

        return $myActions;
    }

}