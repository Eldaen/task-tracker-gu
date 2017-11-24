<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.11.2017
 * Time: 13:47
 */

namespace app\commands;

use app\models\TelegramOffset;
use app\models\TelegramSubscribe;
use app\models\Users;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;
use Yii;
use yii\console\Controller;

class TelegramController extends Controller
{
    protected $offset = 0;

    public function actionIndex()
    {
        $this->getOffset();

        // Получаем непрочитанные сообщения, за это отвечает параметр $this->offset + 1
        $updates = Yii::$app->bot->getUpdates($this->offset + 1);
        if(count($updates) > 0)
        {
            echo 'Новых сообщений в чате: ' . count($updates) . PHP_EOL;

            foreach($updates as $update)
            {
                /** @var Update  $update */
                $message = $update->getMessage();
                $this->updateOffset($update);
                $this->processCommand($message);
            }
        } else {
            echo 'Новых сообщений в чате нет' . PHP_EOL;
        }
    }

    /**
     * Метод для получения отступа
     */
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

    /**
     * Обновляем отступ
     * TODO:: Вообще говоря, тут всё плохо, мы в цикле делаем кучу запросов к БД, надо бы Offset обновлять всего раз.
     * @param $update
     */
    protected function updateOffset(Update $update)
    {
        $newOffsetId = $update->getUpdateId();

        $model = new TelegramOffset();
        $model->id_offset = $newOffsetId;
        $model->timestamp_offset = date('Y-m-d H:i:s');
        $model->save();
    }

    protected function processCommand(Message $message)
    {
        $text = $message->getText();
        //если сообщение пустое
        if(strlen($text) < 1){return;}
        $fullMessage = explode(' ', $text);
        $command = $fullMessage[0];
        $login = null;

        if(isset($fullMessage[1]))
        {
            $login = $fullMessage[1];
        }

        switch($command)
        {
            case '/help':
                $help = 'Доступные комманды:' . PHP_EOL;
                $help .= '/sub {Ваш_Login} - подписаться на новые задачи' . PHP_EOL;

                Yii::$app->bot->sendMessage($message->getFrom()->getId(), $help);
                break;
            case '/sub':
                $user = Users::find()
                    ->where(['username' => $login])
                    ->one();
                if(!$user)
                {
                    //TODO: сделать токен для подтверждения, что логин принадлежит пользователю телеграм
                    echo 'Пользователя с таким логином не существует, попробуйте еще' . PHP_EOL;
                } else {
                    $subscribe = new TelegramSubscribe();
                    $subscribe->id_user = $user->id;
                    $subscribe->id_telegram_user = $message->getFrom()->getId();
                    $subscribe->save();
                    Yii::$app->bot->sendMessage($message->getFrom()->getId(), 'Вы подписались на обновления.');
                }
        }
    }
}