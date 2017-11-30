<?php

use yii\db\Migration;

/**
 * Class m171125_084905_deploy_migration
 */
class m171125_084905_deploy_migration extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('{{%auth_assignment}}',['item_name'=>'Admin','user_id'=>'1','created_at'=>'1510849599']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'BasicUser','user_id'=>'1','created_at'=>'1510911006']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'BasicUser','user_id'=>'2','created_at'=>'1510914094']);
        $this->insert('{{%auth_assignment}}',['item_name'=>'TaskDetailedView','user_id'=>'2','created_at'=>'1510922239']);
        $this->insert('{{%auth_item}}',['name'=>'/admin/*','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1510849287','updated_at'=>'1510849287']);
        $this->insert('{{%auth_item}}',['name'=>'/bot/*','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1511443405','updated_at'=>'1511443405']);
        $this->insert('{{%auth_item}}',['name'=>'/rbac/*','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1510849283','updated_at'=>'1510849283']);
        $this->insert('{{%auth_item}}',['name'=>'/tasks/*','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1510910931','updated_at'=>'1510910931']);
        $this->insert('{{%auth_item}}',['name'=>'/tasks/index','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1510922431','updated_at'=>'1510922431']);
        $this->insert('{{%auth_item}}',['name'=>'/tasks/test','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1511442558','updated_at'=>'1511442558']);
        $this->insert('{{%auth_item}}',['name'=>'/tasks/view','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1510922429','updated_at'=>'1510922429']);
        $this->insert('{{%auth_item}}',['name'=>'/team/*','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1511038116','updated_at'=>'1511038116']);
        $this->insert('{{%auth_item}}',['name'=>'/team/index','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1511034761','updated_at'=>'1511034761']);
        $this->insert('{{%auth_item}}',['name'=>'/team/view','type'=>'2','description'=>'','rule_name'=>'','data'=>'','created_at'=>'1511037927','updated_at'=>'1511037927']);
        $this->insert('{{%auth_item}}',['name'=>'Admin','type'=>'1','description'=>'Администратор всея приложения','rule_name'=>'','data'=>'','created_at'=>'1510849517','updated_at'=>'1510849517']);
        $this->insert('{{%auth_item}}',['name'=>'AdminPanelAccess','type'=>'2','description'=>'Доступ к просмотру админ панели и модуля RBAC','rule_name'=>'','data'=>'','created_at'=>'1510849383','updated_at'=>'1510849401']);
        $this->insert('{{%auth_item}}',['name'=>'BasicUser','type'=>'1','description'=>'Обычный пользователь','rule_name'=>'','data'=>'','created_at'=>'1510910985','updated_at'=>'1510910985']);
        $this->insert('{{%auth_item}}',['name'=>'CanSeeOwnTeams','type'=>'2','description'=>'Возможность видеть к каким командам принадлежит','rule_name'=>'','data'=>'','created_at'=>'1511034749','updated_at'=>'1511034768']);
        $this->insert('{{%auth_item}}',['name'=>'CanSeeTasks','type'=>'2','description'=>'Пользователь может смотреть свои таски','rule_name'=>'','data'=>'','created_at'=>'1510910956','updated_at'=>'1510910956']);
        $this->insert('{{%auth_item}}',['name'=>'TaskDetailedView','type'=>'2','description'=>'Пользователь может открывать подробный просмотр таска','rule_name'=>'сanSeeOwnTasks','data'=>'','created_at'=>'1510913808','updated_at'=>'1510913808']);
        $this->insert('{{%auth_item}}',['name'=>'TeamDetailedView','type'=>'2','description'=>'Пользователь может увидеть страницу подробного просмотра команды.','rule_name'=>'CanSeeOwnTeams','data'=>'','created_at'=>'1511037914','updated_at'=>'1511037914']);
        $this->insert('{{%auth_item_child}}',['parent'=>'AdminPanelAccess','child'=>'/admin/*']);
        $this->insert('{{%auth_item_child}}',['parent'=>'Admin','child'=>'/bot/*']);
        $this->insert('{{%auth_item_child}}',['parent'=>'AdminPanelAccess','child'=>'/rbac/*']);
        $this->insert('{{%auth_item_child}}',['parent'=>'Admin','child'=>'/tasks/*']);
        $this->insert('{{%auth_item_child}}',['parent'=>'CanSeeTasks','child'=>'/tasks/index']);
        $this->insert('{{%auth_item_child}}',['parent'=>'TaskDetailedView','child'=>'/tasks/view']);
        $this->insert('{{%auth_item_child}}',['parent'=>'Admin','child'=>'/team/*']);
        $this->insert('{{%auth_item_child}}',['parent'=>'CanSeeOwnTeams','child'=>'/team/index']);
        $this->insert('{{%auth_item_child}}',['parent'=>'TeamDetailedView','child'=>'/team/view']);
        $this->insert('{{%auth_item_child}}',['parent'=>'Admin','child'=>'AdminPanelAccess']);
        $this->insert('{{%auth_item_child}}',['parent'=>'Admin','child'=>'BasicUser']);
        $this->insert('{{%auth_item_child}}',['parent'=>'BasicUser','child'=>'CanSeeOwnTeams']);
        $this->insert('{{%auth_item_child}}',['parent'=>'BasicUser','child'=>'CanSeeTasks']);
        $this->insert('{{%auth_item_child}}',['parent'=>'BasicUser','child'=>'TaskDetailedView']);
        $this->insert('{{%auth_item_child}}',['parent'=>'BasicUser','child'=>'TeamDetailedView']);
        $this->insert('{{%auth_rule}}',['name'=>'CanSeeOwnTeams','data'=>'O:22:\"app\\rbac\\TeamBoundRule\":3:{s:4:\"name\";s:14:\"CanSeeOwnTeams\";s:9:\"createdAt\";i:1511037854;s:9:\"updatedAt\";i:1511037854;}','created_at'=>'1511037854','updated_at'=>'1511037854']);
        $this->insert('{{%auth_rule}}',['name'=>'сanSeeOwnTasks','data'=>'O:21:\"app\\rbac\\ExecutorRule\":3:{s:4:\"name\";s:15:\"сanSeeOwnTasks\";s:9:\"createdAt\";i:1510913688;s:9:\"updatedAt\";i:1510921985;}','created_at'=>'1510913688','updated_at'=>'1510921985']);
        $this->insert('{{%tasks}}',['id'=>'1','title'=>'Тестовое задание','body'=>'Необходимо протестировать создание и обновление заданий','status'=>'1','creator_id'=>'1','created_at'=>'1510601701','updated_at'=>'1510945923','deadline'=>'1510261200','completion_time'=>'1510945923','team_id'=>'1','executor_id'=>'1','completion_message'=>'asdasd']);
        $this->insert('{{%tasks}}',['id'=>'4','title'=>'Второе тестовое задание','body'=>'Нужно для вывода списка тестовых заданий','status'=>'1','creator_id'=>'1','created_at'=>'1510611970','updated_at'=>'1510945945','deadline'=>'1511384400','completion_time'=>'1510945945','team_id'=>'2','executor_id'=>'1','completion_message'=>'asdasd']);
        $this->insert('{{%tasks}}',['id'=>'5','title'=>'Третьи задание, просроченное','body'=>'чтобы было видно, как помечаются просроченные задания','status'=>'1','creator_id'=>'1','created_at'=>'1510612030','updated_at'=>'1510612030','deadline'=>'1508446800','completion_time'=>'','team_id'=>'1','executor_id'=>'2','completion_message'=>'']);
        $this->insert('{{%tasks}}',['id'=>'6','title'=>'Четвёртое задание','body'=>'Это задание выполнено, оно нужно для демонстрации выполненных заданий','status'=>'0','creator_id'=>'1','created_at'=>'1510674245','updated_at'=>'1510674245','deadline'=>'1510779600','completion_time'=>'','team_id'=>'2','executor_id'=>'','completion_message'=>'']);
        $this->insert('{{%tasks}}',['id'=>'11','title'=>'Телеграм тест','body'=>'Вот тебе задача, тов. админ: Сделай так, чтобы телеграмм бот оповещал всё нормально, да чтобы по скорее!','status'=>'1','creator_id'=>'1','created_at'=>'1511553767','updated_at'=>'1511553767','deadline'=>'1511989200','completion_time'=>'','team_id'=>'1','executor_id'=>'1','completion_message'=>'']);
        $this->insert('{{%tasks}}',['id'=>'12','title'=>'Телеграм тест неподписанному','body'=>'Вот поставлю я сейчас задачу пользователю, который не подписан на обновления в телеграм - не должно ничего плохого случаться.','status'=>'1','creator_id'=>'1','created_at'=>'1511553918','updated_at'=>'1511553918','deadline'=>'1511989200','completion_time'=>'','team_id'=>'1','executor_id'=>'2','completion_message'=>'']);
        $this->insert('{{%team_binds}}',['team_id'=>'1','user_id'=>'1']);
        $this->insert('{{%team_binds}}',['team_id'=>'2','user_id'=>'1']);
        $this->insert('{{%team_binds}}',['team_id'=>'1','user_id'=>'2']);
        $this->insert('{{%teams}}',['id'=>'1','name'=>'Первая команда','description'=>'Ребята, которые рабаотают над Frontend-ом, очень стараются.']);
        $this->insert('{{%teams}}',['id'=>'2','name'=>'Вторая команда','description'=>'Тут дела Backend-ные, всё важно и по взрослому.']);
        $this->insert('{{%telegram_offset}}',['id_offset'=>'614666661','timestamp_offset'=>'2017-11-24 21:20:33']);
        $this->insert('{{%telegram_offset}}',['id_offset'=>'614666662','timestamp_offset'=>'2017-11-24 21:20:54']);
        $this->insert('{{%telegram_offset}}',['id_offset'=>'614666663','timestamp_offset'=>'2017-11-24 21:21:43']);
        $this->insert('{{%telegram_offset}}',['id_offset'=>'614666664','timestamp_offset'=>'2017-11-24 22:29:08']);
        $this->insert('{{%telegram_offset}}',['id_offset'=>'614666665','timestamp_offset'=>'2017-11-24 22:30:40']);
        $this->insert('{{%telegram_subscribe}}',['id_telegram_subscription'=>'0','id_user'=>'0','id_telegram_user'=>'0','id_event'=>'']);
        $this->insert('{{%telegram_subscribe}}',['id_telegram_subscription'=>'2','id_user'=>'1','id_telegram_user'=>'250867313','id_event'=>'']);
        $this->insert('{{%users}}',['id'=>'1','username'=>'Test','auth_key'=>'uTWrSmpJz5cFLGGtyxdd-2s-KrxLlsXj','password_hash'=>'$2y$13$1MkwMQqPjmQHcXBmOL0IxuWNKYJ4G8M0KepGkfLvuAWi9RTOS6H/m','password_reset_token'=>'','email'=>'test@test.test','avatar'=>'','status'=>'10','created_at'=>'1510600590','updated_at'=>'1510600590']);
        $this->insert('{{%users}}',['id'=>'2','username'=>'basic','auth_key'=>'P67pnIEFeu5z_KjOYyPfiY8FwtIWIALN','password_hash'=>'$2y$13$TV55pxSCZU29E.Til1uJluP.E/sDgPE5k19LldXp8DfZqXjQdxEym','password_reset_token'=>'','email'=>'basic@test.test','avatar'=>'','status'=>'10','created_at'=>'1510914066','updated_at'=>'1510914066']);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171125_084905_deploy_migration cannot be reverted.\n";

        return false;
    }
    */
}
