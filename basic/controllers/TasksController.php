<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.11.2017
 * Time: 12:17
 */

namespace app\controllers;


use app\models\CompleteTaskForm;
use app\models\Tasks;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

class TasksController extends Controller
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
        $tasks = (new Tasks())->getActiveByUserId(\Yii::$app->user->identity->getId());
        return $this->render('active', [
            'tasks' => $tasks
        ]);
    }

    public function actionView($id)
    {
        $task = Tasks::find()->where(['id' => $id])->one();
        if($task->status == 1)
        {
            $view = 'incompleteTask';
            $model = new CompleteTaskForm();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->goBack();
            }
        } else {
            $view = 'completeTask';
        }

        return $this->render($view,
            [
                'task' => $task
            ]);
    }
}