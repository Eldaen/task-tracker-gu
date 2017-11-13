<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.11.2017
 * Time: 20:22
 */

namespace app\models;


class TasksReport extends Tasks
{
    public function getAll()
    {
        return static::find()->all();
    }
    public function getClosed()
    {
        //TODO: возвращает все закрытые таски
    }
    public function getOverdue()
    {
        //TODO: возвращает все просроченые таски за период
    }
}