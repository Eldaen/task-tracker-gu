<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.11.2017
 * Time: 13:47
 */

namespace app\commands;

use app\models\TelegramOffset;
use yii\console\Controller;

class TelegramController extends Controller
{
    protected $offset = 0;

    public function actionIndex()
    {
        $this->getOffset();
    }

    protected function getOffset()
    {
        $max = TelegramOffset::find()
            ->select('id_offset')
            ->max('id_offset');

        if($max > 0)
        {
            $this->offset = $max;
        }
    }
}