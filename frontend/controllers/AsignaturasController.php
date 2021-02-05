<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Asignaturas;
use frontend\models\AsignaturasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\Areas;

/**
 * AsignaturasController implements the CRUD actions for Asignaturas model.
 */
class AsignaturasController extends Controller
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
     * Lists all Asignaturas models.
     * @return mixed
     */
    public function actionIndex($i = 0, $departamento)
    {
        $searchModel = new AsignaturasSearch();
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
     * Displays a single Asignaturas model.
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
     * Creates a new Asignaturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($departamento)
    {
        $model = new Asignaturas();
        $listaAreas = ArrayHelper::map(Areas::find()->where(['Estado' => 'A', 'idDepartamento' => $departamento])->all(),'idArea','Area');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->idDepartamento = $departamento;
            $model->Estado = 'Activo';
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idAsignatura]);
                   
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        }

        return $this->render('create', [
            'model' => $model,
            'listaAreas' => $listaAreas,
        ]);
    }

    /**
     * Updates an existing Asignaturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listaAreas = ArrayHelper::map(Areas::find()->where(['Estado' => 'A', 'idDepartamento' => $departamento])->all(),'idArea','Area');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idAsignatura]);
        }

        return $this->render('update', [
            'model' => $model,
            'listaAreas' => $listaAreas,
        ]);
    }

    /**
     * Deletes an existing Asignaturas model.
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

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asignaturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Asignaturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asignaturas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
