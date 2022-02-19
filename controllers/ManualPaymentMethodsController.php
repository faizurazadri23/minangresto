<?php

namespace app\controllers;

use app\models\ManualPaymentMethods;
use app\models\ManualPaymentMethodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * ManualPaymentMethodsController implements the CRUD actions for ManualPaymentMethods model.
 */
class ManualPaymentMethodsController extends Controller
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
     * Lists all ManualPaymentMethods models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ManualPaymentMethodsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ManualPaymentMethods model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ManualPaymentMethods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ManualPaymentMethods();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $gambar = UploadedFile::getInstance($model, 'photo');

                if($model->validate()){
                    if(!empty($gambar)){
                        $model->photo  = $gambar;
                        $nama_file = date('Ymdhis').'.'. $model->photo->extension;
                        $lokasi_simpan = 'image/payment';
                        FileHelper::createDirectory($lokasi_simpan);
                        $model->photo->saveAs($lokasi_simpan.'/'.$nama_file);
                        $model->photo = $lokasi_simpan.'/'.$nama_file;
                    }
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ManualPaymentMethods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'photo');

                if($model->validate()){
                    if(!empty($gambar)){
                        $model->photo  = $gambar;
                        $nama_file = date('Ymdhis').'.'. $model->photo->extension;
                        $lokasi_simpan = 'image/payment';
                        FileHelper::createDirectory($lokasi_simpan);
                        $model->photo->saveAs($lokasi_simpan.'/'.$nama_file);
                        $model->photo = $lokasi_simpan.'/'.$nama_file;
                    }
                    $model->save(false);
                    return $this->redirect(['index']);
                }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ManualPaymentMethods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ManualPaymentMethods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ManualPaymentMethods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ManualPaymentMethods::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
