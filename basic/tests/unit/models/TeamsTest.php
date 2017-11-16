<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.11.2017
 * Time: 18:32
 */

namespace tests\models;


use app\models\Teams;
use Codeception\Test\Unit;

class TeamsTest extends Unit
{
    /* @var \app\models\Teams */
    private $model;
    public function _after()
    {
        $this->model->delete();
    }
    public function testSavingTeam()
    {
        $this->model = new Teams();
        $this->model->name = "Тестовая команда";
        $this->model->description = "Какое-то описание";
        $this->model->save();
        expect($this->model::find()->where(['name' => "Тестовая команда"]));
    }
}