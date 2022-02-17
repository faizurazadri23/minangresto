<?php

namespace app\controllers;

use app\models\OrderOnSite;
use app\models\OrderOnSiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderOnSiteController implements the CRUD actions for OrderOnSite model.
 */
class OrderOnSiteController extends Controller
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
     * Lists all OrderOnSite models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderOnSiteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderOnSite model.
     * @param string $order_id_onsite Order Id Onsite
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($order_id_onsite)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_id_onsite),
        ]);
    }

    /**
     * Creates a new OrderOnSite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrderOnSite();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'order_id_onsite' => $model->order_id_onsite]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderOnSite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $order_id_onsite Order Id Onsite
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($order_id_onsite)
    {
        $model = $this->findModel($order_id_onsite);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id_onsite' => $model->order_id_onsite]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderOnSite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $order_id_onsite Order Id Onsite
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($order_id_onsite)
    {
        $this->findModel($order_id_onsite)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderOnSite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $order_id_onsite Order Id Onsite
     * @return OrderOnSite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id_onsite)
    {
        if (($model = OrderOnSite::findOne(['order_id_onsite' => $order_id_onsite])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
