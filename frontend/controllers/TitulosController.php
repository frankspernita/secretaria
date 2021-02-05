<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Titulos;
use frontend\models\TitulosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\DatosPersonales;
use frontend\models\TipoTitulos;

/**
 * TitulosController implements the CRUD actions for Titulos model.
 */
class TitulosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
              'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                [
                'allow' => true,
                'roles' => ['@'],
              ],
              ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Titulos models.
     * @return mixed
     */
    public function actionIndex($idP, $i = 0)
    {
        $searchModel = new TitulosSearch();
        $searchModel->idDatosP = $idP;
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelClient = DatosPersonales::findOne($idP);
        $modelClient->load(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelClient' => $modelClient,
        ]);
    }

    /**
     * Displays a single Titulos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Titulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idP)
    {
        $model = new Titulos();
        
        $listaTitulo = ArrayHelper::map(TipoTitulos::find()->where(['Estado' => 'A'])->all(),'idTipoTitulo','Descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'Activo';
            $model->idDatosP = $idP;
            $model->Fecha = Yii::$app->formatter->asDatetime($model->Fecha, 'y-M-d 00:00:00');
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idTitulo]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'listaTitulo' => $listaTitulo,
        ]);
    }

    /**
     * Updates an existing Titulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $listaTitulo = ArrayHelper::map(TipoTitulos::find()->where(['Estado' => 'A'])->all(),'idTipoTitulo','Descripcion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Fecha = Yii::$app->formatter->asDatetime($model->Fecha, 'y-M-d 00:00:00');
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idTitulo]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'listaTitulo' => $listaTitulo,
        ]);
    }

    /**
     * Deletes an existing Titulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->Estado == 'Inactivo'){
            $model->Estado = 'Activo';
        }else{
            $model->Estado = 'Inactivo';
        }
        $model->save();

        return $this->redirect(['index', 'idP' => $model->idDatosP]);
    }

    /**
     * Finds the Titulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Titulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Titulos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
