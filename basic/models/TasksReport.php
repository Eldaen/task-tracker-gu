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
        return static::find()->where(['status' => 0])->all();
    }
    public function getOverdue()
    {
        return static::find()->where(['>', 'deadline', time()])->all();
    }
}