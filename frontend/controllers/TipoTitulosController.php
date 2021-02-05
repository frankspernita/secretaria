<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TipoTitulos;
use frontend\models\TipoTitulosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Model;
use yii\helpers\ArrayHelper;

/**
 * TipoTitulosController implements the CRUD actions for TipoTitulos model.
 */
class TipoTitulosController extends Controller
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
     * Lists all TipoTitulos models.
     * @return mixed
     */
    public function actionIndex($i = 0)
    {
        $searchModel = new TipoTitulosSearch();
        $searchModel->Estado = $i == 0 ? 'A' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoTitulos model.
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
     * Creates a new TipoTitulos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoTitulos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->Estado = 'A';
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {    
                        $model->save();               
                    
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idTipoTitulo]);
                   
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
     * Updates an existing TipoTitulos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idTipoTitulo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoTitulos model.
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
     * Finds the TipoTitulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TipoTitulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TipoTitulos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
