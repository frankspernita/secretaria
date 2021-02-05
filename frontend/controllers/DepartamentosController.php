<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Departamentos;
use frontend\models\DepartamentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\DatosPersonales;

/**
 * DepartamentosController implements the CRUD actions for Departamentos model.
 */
class DepartamentosController extends Controller
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
     * Lists all Departamentos models.
     * @return mixed
     */
    public function actionIndex($i = 0)
    {
        $searchModel = new DepartamentosSearch();
        $searchModel->Estado = $i == 0 ? 'A' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Departamentos model.
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
     * Creates a new Departamentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Departamentos();
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'D'])->all(),'idDatosP','Nombre','Apellido');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'A';
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idDepartamento]);
                   
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
     * Updates an existing Departamentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listaPersonas = ArrayHelper::map(DatosPersonales::find()->where(['Estado' => 'A', 'Tipo' => 'D'])->all(),'idDatosP','Nombre','Apellido');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDepartamento]);
        }

        return $this->render('update', [
            'model' => $model,
            'listaPersonas' => $listaPersonas,
        ]);
    }

    /**
     * Deletes an existing Departamentos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->Estado == 'I'){
            $model->Estado = 'A';
        }else{
            $model->Estado = 'I';
        }
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Departamentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Departamentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Departamentos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
