<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Nodocentes;
use frontend\models\NodocentesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\DatosPersonales;

/**
 * NodocentesController implements the CRUD actions for Nodocentes model.
 */
class NodocentesController extends Controller
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
     * Lists all Nodocentes models.
     * @return mixed
     */
    public function actionIndex($i = 0, $departamento)
    {
        $searchModel = new NodocentesSearch();
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
     * Displays a single Nodocentes model.
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
     * Creates a new Nodocentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($departamento)
    {
        $model = new Nodocentes();
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'N'])->all(),'idDatosP','Nombre','Apellido');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'Activo';
            $model->idDepartamento = $departamento;
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idNoDocente]);
                   
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
     * Updates an existing Nodocentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'N'])->all(),'idDatosP','Nombre','Apellido');

        if ($model->load(Yii::$app->request->post())) {
                        
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view',
                        'id' => $model->idNoDocente
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
     * Deletes an existing Nodocentes model.
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

        return $this->redirect(['index', 'id' => $model->idNoDocente, 'departamento' => $model->idDepartamento]);
    }

    /**
     * Finds the Nodocentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nodocentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nodocentes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
