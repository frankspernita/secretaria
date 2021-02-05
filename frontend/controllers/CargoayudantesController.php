<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Resoluciones;
use frontend\models\Asignaturas;
use frontend\models\DatosPersonales;
use frontend\models\Cargoayudantes;
use frontend\models\CargoayudantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;

/**
 * CargoayudantesController implements the CRUD actions for Cargoayudantes model.
 */
class CargoayudantesController extends Controller
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
     * Lists all Cargoayudantes models.
     * @return mixed
     */
    public function actionIndex($i = 0, $departamento)
    {
        $searchModel = new CargoayudantesSearch();
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
     * Displays a single Cargoayudantes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionVencimientos($i = 0)
    {
        $searchModel = new CargoayudantesSearch();
        $searchModel->Estado = $i == 0 ? 'A' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('vencimientos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cargoayudantes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cargoayudantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($departamento)
    {
        $model = new Cargoayudantes();
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'A'])->all(),'idDatosP','Nombre','Apellido');
        $listaAsignatura = ArrayHelper::map(Asignaturas::find()->where(['Estado' => 'Activo','idDepartamento' => $departamento])->all(),'idAsignatura','Asignatura');
        $listaResolucion = ArrayHelper::map(Resoluciones::find()->where(['Estado' => 'Activo', 'idDepartamento' => $departamento])->all(),'idResolucion','Resolucion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'Activo';
            $model->idDepartamento = $departamento;
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idCargoAyudante , 'departamento' => $departamento]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'listaPersonas' => $listaPersonas,
            'listaAsignatura' => $listaAsignatura,
            'listaResolucion' => $listaResolucion,
        ]);
    }

    /**
     * Updates an existing Cargoayudantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $departamento)
    {
        $model = $this->findModel($id);
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'A'])->all(),'idDatosP','Nombre','Apellido');
        $listaAsignatura = ArrayHelper::map(Asignaturas::find()->where(['Estado' => 'Activo','idDepartamento' => $departamento])->all(),'idAsignatura','Asignatura');
        $listaResolucion = ArrayHelper::map(Resoluciones::find()->where(['Estado' => 'Activo', 'idDepartamento' => $departamento])->all(),'idResolucion','Resolucion');

        if ($model->load(Yii::$app->request->post())) {
            $model->idDepartamento = $departamento;            
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idCargoAyudante
                        , 'departamento' => $departamento
                      ]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listaPersonas' => $listaPersonas,
            'listaAsignatura' => $listaAsignatura,
            'listaResolucion' => $listaResolucion,
        ]);
    }

    /**
     * Deletes an existing Cargoayudantes model.
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

        return $this->redirect(['index', 'id' => $model->idCargoAyudante, 'departamento' => $model->idDepartamento]);
    }

    /**
     * Finds the Cargoayudantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cargoayudantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cargoayudantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
