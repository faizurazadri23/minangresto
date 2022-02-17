<?php

namespace app\controllers;

use app\models\Kategori;
use app\models\KategoriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KategoriController implements the CRUD actions for Kategori model.
 */
class KategoriController extends Controller
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
     * Lists all Kategori models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KategoriSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kategori model.
     * @param string $kd_kategori Kd Kategori
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kd_kategori)
    {
        return $this->render('view', [
            'model' => $this->findModel($kd_kategori),
        ]);
    }

    /**
     * Creates a new Kategori model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kategori();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kd_kategori' => $model->kd_kategori]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kategori model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kd_kategori Kd Kategori
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kd_kategori)
    {
        $model = $this->findModel($kd_kategori);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kd_kategori' => $model->kd_kategori]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kategori model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kd_kategori Kd Kategori
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kd_kategori)
    {
        $this->findModel($kd_kategori)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kategori model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kd_kategori Kd Kategori
     * @return Kategori the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kd_kategori)
    {
        if (($model = Kategori::findOne(['kd_kategori' => $kd_kategori])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
