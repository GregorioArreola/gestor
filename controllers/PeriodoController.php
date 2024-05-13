<?php

namespace app\controllers;

use app\models\Materia;
use Yii;
use app\models\Periodo;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\PeriodoSearch;
use yii\web\NotFoundHttpException;

/**
 * PeriodoController implements the CRUD actions for Periodo model.
 */
class PeriodoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Periodo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Periodo model.
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
     * Creates a new Periodo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Periodo();

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
     * Updates an existing Periodo model.
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
     * Deletes an existing Periodo model.
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
     * Finds the Periodo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $per_id Per ID
     * @return Periodo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($per_id)
    {
        if (($model = Periodo::findOne(['per_id' => $per_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPeriodos()
    {
        $usuario_actual_id = Yii::$app->user->identity->getId();  // Obtiene el ID del usuario actualmente logueado

        $periodos = Periodo::find()
            ->select(['periodo.per_id','periodo.per_nombre'])
            ->innerJoinWith('perFkpersonal') //llave foranea seguida de punto...
            ->where(['personal.per_fkusuario' => $usuario_actual_id])
            ->all();

        // Aquí puedes procesar las tareas en $tareas, por ejemplo, enviarlas a una vista o algo similar
        return $this->render('periodos', [
            'periodos' => $periodos
        ]);
    }
    public function actionMateriasperiodo($per_id)
    {
        $model = Periodo::find()
            ->where(['per_id' => $per_id])
            ->one();
    
        if ($model === null) {
            throw new NotFoundHttpException("El periodo solicitado no existe.");
        }
    
        return $this->render('verperiodo', [
            'model' => $model
        ]);
    }
    
   
}
