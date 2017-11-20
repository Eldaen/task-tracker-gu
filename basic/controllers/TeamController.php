<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.11.2017
 * Time: 22:47
 */

namespace app\controllers;

use app\models\TeamBinds;
use app\models\Teams;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class TeamController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
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
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        //Получаем id всех команд, к которым принадлежит юзер
        $teams = TeamBinds::find()->where(['user_id' => Yii::$app->user->identity->getId()])->all();

        return $this->render('teamList',
            [
               'teams' => $teams
            ]);
    }

    public function actionView($id)
    {
        $team = Teams::find()->where(['id' => $id])->one();
        $users = TeamBinds::find()->where(['team_id' => $id])->all();
        $usersArray = [];

        foreach ($users as $item)
        {
            //кладём в массив команды, к которым принадлежит юзер
            array_push($usersArray, Users::find()->where(['id' => $item->user_id])->one());
        }
        return $this->render('view',
            [
               'team' => $team,
               'users' => $users
            ]);
    }
}