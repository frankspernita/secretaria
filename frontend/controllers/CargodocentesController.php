<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Resoluciones;
use frontend\models\Asignaturas;
use frontend\models\DatosPersonales;
use frontend\models\Cargodocentes;
use frontend\models\CargodocentesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\TipoCargos;

/**
 * CargodocentesController implements the CRUD actions for Cargodocentes model.
 */
class CargodocentesController extends Controller
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
     * Lists all Cargodocentes models.
     * @return mixed
     */
    public function actionIndex($i = 0, $departamento)
    {
        $searchModel = new CargodocentesSearch();
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
     * Displays a single Cargodocentes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionVencimientos($i = 0)
    {
        $searchModel = new CargodocentesSearch();
        $searchModel->Estado = $i == 0 ? 'Activo' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('vencimientos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cargodocentes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionHistorial()
    {
        $searchModel = new CargodocentesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('historial', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cargodocentes model.
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
     * Creates a new Cargodocentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($departamento)
    {

        $model = new Cargodocentes();
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'D'])->all(),'idDatosP','Nombre','Apellido');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'Activo';
            $model->idDepartamento = $departamento;
            
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idDocente]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }
        return $this->render('create', [
            'model' => $model,
            'listaPersonas' => $listaPersonas,
        ]);
    }

    /**
     * Updates an existing Cargodocentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'D'])->all(),'idDatosP','Nombre','Apellido');

        if ($model->load(Yii::$app->request->post())) {
            $model->idDocente = $id;
                       
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idDocente
                      ]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listaPersonas' => $listaPersonas,
        ]);
    }

    /**
     * Deletes an existing Cargodocentes model.
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
     * Finds the Cargodocentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cargodocentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cargodocentes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDocs($id)
    {
        return $this->render('docs', [
            'model' => $this->findModel($id),
        ]);
    }
}
