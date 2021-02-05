<?php

namespace frontend\controllers;

use Yii;
use frontend\models\DatosPersonales;
use frontend\models\DatosPersonalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Domicilios;
use frontend\models\Model;
use yii\helpers\ArrayHelper;
use frontend\models\DomiciliosSearch;
use frontend\models\Cargoayudantes;
use frontend\models\Cargodocentes;
use frontend\models\Resoluciones;
use yii\helpers\Json;
use yii\data\SqlDataProvider;

/**
 * DatosPersonalesController implements the CRUD actions for DatosPersonales model.
 */
class DatosPersonalesController extends Controller
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
     * Lists all DatosPersonales models.
     * @return mixed
     */
    public function actionIndex($i = 0)
    {
        $searchModel = new DatosPersonalesSearch();
        $searchModel->Estado = $i == 0 ? 'A' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DatosPersonales model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new DomiciliosSearch();
        $searchModel->idDatosP = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new DatosPersonales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DatosPersonales();
        $modelsdomicilios = [new Domicilios];

        if ($model->load(Yii::$app->request->post())) {
            $model->Estado = 'A';
            $model->FechaNac = Yii::$app->formatter->asDatetime($model->FechaNac, 'y-M-d 00:00:00');

            $modelsdomicilios = Model::createMultiple(Domicilios::classname());
            Model::loadMultiple($modelsdomicilios, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsdomicilios) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsdomicilios as $modeldomicilio) {
                            $modeldomicilio->idDatosP = $model->idDatosP;
                            $modeldomicilio->Estado = 'A';
                            if (! ($flag = $modeldomicilio->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idDatosP]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsdomicilios' => (empty($modelsdomicilios)) ? [new Domicilios] : $modelsdomicilios
        ]);
    }

    /**
     * Updates an existing DatosPersonales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsdomicilios = $model->domicilio;

        if ($model->load(Yii::$app->request->post())) {
          $oldIDs = ArrayHelper::map($modelsdomicilios, 'idDomicilio', 'idDatosP');
          $modelsdomicilios = Model::createMultiple(Domicilios::classname(), $modelsdomicilios, 'DatosP', 'Domicilio');
          Model::loadMultiple($modelsdomicilios, Yii::$app->request->post());
          $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsdomicilios, 'idDomicilio', 'idDatosP')));
          $model->FechaNac = Yii::$app->formatter->asDatetime($model->FechaNac, 'y-M-d 00:00:00');
          // validate all models
          $valid = $model->validate();
          $valid = Model::validateMultiple($modelsdomicilios) && $valid;

          if ($valid) {
              $transaction = \Yii::$app->db->beginTransaction();
              try {
                  if ($flag = $model->save(false)) {
                      if (!empty($deletedIDs)) {
                          Domicilios::deleteAll('idDatosP = '.$model->idDatosP);
                      }
                      foreach ($modelsdomicilios as $modeldomicilio) {
                          $modeldomicilio->Estado = 'A';
                          $modeldomicilio->idDatosP = $model->idDatosP;
                          if (! ($flag = $modeldomicilio->save(false))) {
                              $transaction->rollBack();
                              break;
                          }
                      }
                  }
                  if ($flag) {
                      $transaction->commit();
                      return $this->redirect(['view', 'id' => $model->idDatosP]);
                  }
              } catch (Exception $e) {
                  $transaction->rollBack();
              }
          }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsdomicilios' => (empty($modelsdomicilios)) ? [new Domicilios] : $modelsdomicilios
        ]);
    }

    /**
     * Deletes an existing DatosPersonales model.
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
     * Finds the DatosPersonales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DatosPersonales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DatosPersonales::findOne($id)) !== null) {
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


    public function actionVencimientos($i = 0)
    {

        $searchModel = new DatosPersonalesSearch();
        $searchModel->Estado = $i == 0 ? 'A' : null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        $sql = 'SELECT              
                    datos_personales.Apellido,
                    datos_personales.Nombre,
                    resoluciones.Resolucion,
                    cargodocentes.FechaInicio,
                    cargodocentes.FechaVenc
                FROM datos_personales
                INNER JOIN cargodocentes ON datos_personales.idDatosP = cargodocentes.idDatosP
                INNER JOIN cargoayudantes ON cargoayudantes.idDatosP = datos_personales.idDatosP
                INNER JOIN resoluciones ON cargodocentes.idResolucion = resoluciones.idResolucion
                WHERE (datos_personales.Estado = "A")

                UNION ALL

                SELECT              
                    datos_personales.Apellido,
                    datos_personales.Nombre,
                    resoluciones.Resolucion,
                    cargoayudantes.FechaInicio,
                    cargoayudantes.FechaVenc
                FROM datos_personales
                INNER JOIN cargodocentes ON datos_personales.idDatosP = cargodocentes.idDatosP
                INNER JOIN cargoayudantes ON cargoayudantes.idDatosP = datos_personales.idDatosP
                INNER JOIN resoluciones ON cargoayudantes.idResolucion = resoluciones.idResolucion
                WHERE (datos_personales.Estado = "A")'; 

            $sqlProvider = new SqlDataProvider([
                'sql' => $sql,
                'sort' => [
                        'attributes' => ['Apellido','Nombre','Resolucion','FechaInicio','FechaVenc'],
                        'defaultOrder' => ['Apellido' => SORT_DESC,'Nombre' => SORT_DESC,'Resolucion' => SORT_DESC,'FechaInicio' => SORT_DESC,'FechaVenc' => SORT_DESC],
                    ],
                        
                        'pagination' => [
                                'pageSize' => 15,
                        ],

                ]);
            return $this->render('vencimientos',[
                'sqlProvider' => $sqlProvider,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                ] );           
    }
}
