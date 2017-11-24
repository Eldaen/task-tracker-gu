<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.11.2017
 * Time: 16:22
 */

namespace app\controllers;


use TelegramBot\Api\Types\Message;
use yii\web\Controller;

class BotController extends Controller
{
    public function actionIndex()
    {
        $updates = \Yii::$app->bot->getUpdates();
        $data = [];
        foreach ($updates as $update)
        {
            /** @var Message $message  */
            $message = $update->getMessage();
            array_push($data, $message->getText());
        }


        return $this->render('send-message',
            [
                'data' => $data
            ]);
    }
}