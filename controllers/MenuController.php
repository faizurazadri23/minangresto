<?php

namespace app\controllers;

use app\models\Menu;
use app\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param string $kd_menu Kd Menu
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kd_menu)
    {
        return $this->render('view', [
            'model' => $this->findModel($kd_menu),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $gambar = UploadedFile::getInstance($model, 'photo_menu');

                if($model->validate()){
                    if(!empty($gambar)){
                        $model->photo_menu  = $gambar;
                        $nama_file = date('Ymdhis').'.'. $model->photo_menu->extension;
                        $lokasi_simpan = 'image/menu';
                        FileHelper::createDirectory($lokasi_simpan);
                        $model->photo_menu->saveAs($lokasi_simpan.'/'.$nama_file);
                        $model->photo_menu = $lokasi_simpan.'/'.$nama_file;
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
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kd_menu Kd Menu
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kd_menu)
    {
        $model = $this->findModel($kd_menu);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'photo_menu');

                if($model->validate()){
                    if(!empty($gambar)){
                        $model->photo_menu  = $gambar;
                        $nama_file = date('Ymdhis').'.'. $model->photo_menu->extension;
                        $lokasi_simpan = 'image/menu';
                        FileHelper::createDirectory($lokasi_simpan);
                        $model->photo_menu->saveAs($lokasi_simpan.'/'.$nama_file);
                        $model->photo_menu = $lokasi_simpan.'/'.$nama_file;
                    }
                    $model->save(false);
                    return $this->redirect(['index']);
                }

            // return $this->redirect(['view', 'kd_menu' => $model->kd_menu]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kd_menu Kd Menu
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kd_menu)
    {
        $this->findModel($kd_menu)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kd_menu Kd Menu
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kd_menu)
    {
        if (($model = Menu::findOne(['kd_menu' => $kd_menu])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
