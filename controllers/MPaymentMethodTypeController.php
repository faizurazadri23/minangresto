<?php

namespace app\controllers;

use app\models\MPaymentMethodType;
use app\models\MPaymentMethodTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MPaymentMethodTypeController implements the CRUD actions for MPaymentMethodType model.
 */
class MPaymentMethodTypeController extends Controller
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
     * Lists all MPaymentMethodType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MPaymentMethodTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MPaymentMethodType model.
     * @param string $type_id Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($type_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($type_id),
        ]);
    }

    /**
     * Creates a new MPaymentMethodType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MPaymentMethodType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'type_id' => $model->type_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MPaymentMethodType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $type_id Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($type_id)
    {
        $model = $this->findModel($type_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'type_id' => $model->type_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MPaymentMethodType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $type_id Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($type_id)
    {
        $this->findModel($type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MPaymentMethodType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $type_id Type ID
     * @return MPaymentMethodType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($type_id)
    {
        if (($model = MPaymentMethodType::findOne(['type_id' => $type_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
