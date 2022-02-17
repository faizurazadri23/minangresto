<?php

namespace app\controllers;

use app\models\OrderOnline;
use app\models\OrderOnlineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderOnlineController implements the CRUD actions for OrderOnline model.
 */
class OrderOnlineController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrderOnline models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderOnlineSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderOnline model.
     * @param string $order_id_online Order Id Online
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($order_id_online)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_id_online),
        ]);
    }

    /**
     * Creates a new OrderOnline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrderOnline();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'order_id_online' => $model->order_id_online]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderOnline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $order_id_online Order Id Online
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($order_id_online)
    {
        $model = $this->findModel($order_id_online);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id_online' => $model->order_id_online]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderOnline model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $order_id_online Order Id Online
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($order_id_online)
    {
        $this->findModel($order_id_online)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderOnline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $order_id_online Order Id Online
     * @return OrderOnline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id_online)
    {
        if (($model = OrderOnline::findOne(['order_id_online' => $order_id_online])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
