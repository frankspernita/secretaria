<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Resoluciones;
use frontend\models\ResolucionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;

/**
 * ResolucionesController implements the CRUD actions for Resoluciones model.
 */
class ResolucionesController extends Controller
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
     * Lists all Resoluciones models.
     * @return mixed
     */
    public function actionIndex($i = 0, $departamento)
    {
        $searchModel = new ResolucionesSearch();
        $searchModel->idDepartamento = $departamento;
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'departamento' => $departamento,
        ]);
    }

    /**
     * Displays a single Resoluciones model.
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
     * Creates a new Resoluciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($departamento)
    {
        $model = new Resoluciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'Activo';
            $model->idDepartamento = $departamento;
            $model->FechaInicio = Yii::$app->formatter->asDatetime($model->FechaInicio, 'y-M-d 00:00:00');
            $model->FechaVencimiento = Yii::$app->formatter->asDatetime($model->FechaVencimiento, 'y-M-d 00:00:00');
            
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idResolucion]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Resoluciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->FechaInicio = Yii::$app->formatter->asDatetime($model->FechaInicio, 'y-M-d 00:00:00');
            $model->FechaVencimiento = Yii::$app->formatter->asDatetime($model->FechaVencimiento, 'y-M-d 00:00:00');
            
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idResolucion]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Resoluciones model.
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

        return $this->redirect(['index', 'id' => $model->idResolucion, 'departamento' => $model->idDepartamento]);
    }

    /**
     * Finds the Resoluciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resoluciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resoluciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
