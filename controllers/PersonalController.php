<?php

namespace app\controllers;

use Yii;
use webvimark\modules\UserManagement\models\User;
use yii\web\Controller;
use app\models\Personal;
use yii\filters\VerbFilter;
use app\models\PersonalSearch;
use yii\web\NotFoundHttpException;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Personal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
     * @param int $per_id Per ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($per_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($per_id),
        ]);
    }

    /**
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Personal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'per_id' => $model->per_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $per_id Per ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($per_id)
    {
        $model = $this->findModel($per_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'per_id' => $model->per_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $per_id Per ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($per_id)
    {
        $this->findModel($per_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $per_id Per ID
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($per_id)
    {
        if (($model = Personal::findOne(['per_id' => $per_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegistrar()
    {
        $model = new Personal();
        $model2 = new User();
    
        if ($this->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();  // Inicia una transacción
            try {
                if ($model->load($this->request->post()) && $model2->load($this->request->post())) {
                    $model2->status = 1;
                    $model2->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model2->password);
    
                    // Guarda el modelo User y verifica errores
                    if (!$model2->save()) {
                        throw new \Exception('No se pudo guardar el usuario.');
                    }
    
                    // Asigna el rol al usuario
                    $model2::assignRole($model2->id, "UEstandar");
    
                    // Establece la clave foránea y guarda el modelo Personal
                    $model->per_fkusuario = $model2->id;
                    if (!$model->save()) {
                        throw new \Exception('No se pudo guardar el personal.');
                    }
    
                    // Si todo ha ido bien, confirma la transacción
                    $transaction->commit();
                    return $this->redirect(['view', 'per_id' => $model->per_id]);
                }
            } catch (\Exception $e) {
                // Si hay error, realiza rollback y muestra el error
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        } else {
            $model->loadDefaultValues();
        }
    
        // Renderiza la vista de registro en caso de no POST o errores
        return $this->render('registro', [
            'model' => $model,
            'model2' => $model2,
        ]);
    }
    
}
