<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Asignaturasdocentes;
use frontend\models\AsignaturasdocentesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\Cargodocentes;
use frontend\models\Asignaturas;
use frontend\models\Resoluciones;
use frontend\models\CargodocentesSearch;

/**
 * AsignaturasdocentesController implements the CRUD actions for Asignaturasdocentes model.
 */
class AsignaturasdocentesController extends Controller
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
     * Lists all Asignaturasdocentes models.
     * @return mixed
     */
    public function actionIndex($id, $i = 0, $departamento)
    {
        $searchModel = new AsignaturasdocentesSearch();
        $searchModel->idDocente = $id;
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelClient = Cargodocentes::findOne($id);
        $modelClient->load(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelClient' => $modelClient,
            'departamento' => $departamento,
            'idP' => $id,
        ]);
    }

    /**
     * Displays a single Asignaturasdocentes model.
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
     * Creates a new Asignaturasdocentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idP, $departamento)
    {
        $model = new Asignaturasdocentes();
        $listaAsignatura = ArrayHelper::map(Asignaturas::find()->where(['Estado' => 'Activo','idDepartamento' => $departamento])->all(),'idAsignatura','Asignatura');
        $listaResolucion = ArrayHelper::map(Resoluciones::find()->where(['Estado' => 'Activo', 'idDepartamento' => $departamento])->all(),'idResolucion','Resolucion');
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'Activo';
            $model->idDepartamento = $departamento;
            $model->idDocente = $idP;
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idAsignaturaDocente, 'departamento' => $departamento]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'listaAsignatura' => $listaAsignatura,
            'listaResolucion' => $listaResolucion,
        ]);
    }

    /**
     * Updates an existing Asignaturasdocentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $departamento)
    {
        $model = $this->findModel($id);
        $listaAsignatura = ArrayHelper::map(Asignaturas::find()->where(['Estado' => 'Activo','idDepartamento' => $departamento])->all(),'idAsignatura','Asignatura');
        $listaResolucion = ArrayHelper::map(Resoluciones::find()->where(['Estado' => 'Activo', 'idDepartamento' => $departamento])->all(),'idResolucion','Resolucion');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idAsignaturaDocente, 'departamento' => $departamento]);
        }

        return $this->render('update', [
            'model' => $model,
            'listaAsignatura' => $listaAsignatura,
            'listaResolucion' => $listaResolucion,
        ]);
    }

    /**
     * Deletes an existing Asignaturasdocentes model.
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

        return $this->redirect(['index', 'id' => $model->idDocente, 'departamento' => $model->idDepartamento]);
    }

    /**
     * Finds the Asignaturasdocentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Asignaturasdocentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asignaturasdocentes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
