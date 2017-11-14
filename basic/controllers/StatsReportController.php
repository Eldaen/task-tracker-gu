<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.11.2017
 * Time: 20:17
 */

namespace app\controllers;
use app\models\TasksReport;
use yii\web\Controller;

class StatsReportController extends Controller
{
    public function actionIndex()
    {
        $tasks = new TasksReport();
        $allTasks = $tasks->getAll();
        $closedTasks = $tasks->getClosed();
        $overdueTasks = $tasks->getOverdue();

        return $this->render('index',
            [
                'allTasks' => $allTasks,
                'closedTasks' => $closedTasks,
                'overdueTasks' => $overdueTasks
            ]);
    }
}