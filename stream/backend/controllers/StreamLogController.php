<?php

namespace backend\controllers;

use Yii;
use common\models\StreamLog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StreamLogController implements the CRUD actions for StreamLog model.
 */
class StreamLogController extends Controller
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
     * Lists all StreamLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => StreamLog::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StreamLog model.
     * @param integer $stream_id
     * @param string $type
     * @return mixed
     */
    public function actionView($stream_id, $type)
    {
        return $this->render('view', [
            'model' => $this->findModel($stream_id, $type),
        ]);
    }


    /**
     * Deletes an existing StreamLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $stream_id
     * @param string $type
     * @return mixed
     */
    public function actionDelete($stream_id, $type)
    {
        $this->findModel($stream_id, $type)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StreamLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $stream_id
     * @param string $type
     * @return StreamLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($stream_id, $type)
    {
        if (($model = StreamLog::findOne(['stream_id' => $stream_id, 'type' => $type])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
