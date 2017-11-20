<?php

namespace app\modules\admin\controllers;

use app\models\Teams;
use app\models\Users;
use Yii;
use app\models\TeamBinds;
use app\models\TeamBindsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeamBindsController implements the CRUD actions for TeamBinds model.
 */
class TeamBindsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TeamBinds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeamBindsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeamBinds model.
     * @param integer $team_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($team_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($team_id, $user_id),
        ]);
    }

    /**
     * Creates a new TeamBinds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeamBinds();

        $teams = Teams::find()->asArray()->all();
        $users = Users::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'team_id' => $model->team_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'teams' => $teams,
                'users' => $users
            ]);
        }
    }

    /**
     * Updates an existing TeamBinds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $team_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($team_id, $user_id)
    {
        $model = $this->findModel($team_id, $user_id);
        $teams = Teams::find()->asArray()->all();
        $users = Users::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'team_id' => $model->team_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'teams' => $teams,
                'users'  => $users
            ]);
        }
    }

    /**
     * Deletes an existing TeamBinds model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $team_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($team_id, $user_id)
    {
        $this->findModel($team_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeamBinds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $team_id
     * @param integer $user_id
     * @return TeamBinds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($team_id, $user_id)
    {
        if (($model = TeamBinds::findOne(['team_id' => $team_id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
