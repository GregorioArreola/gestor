<?php

namespace app\controllers;

use app\models\Tareausuario;
use app\models\TareausuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TareausuarioController implements the CRUD actions for Tareausuario model.
 */
class TareausuarioController extends Controller
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
     * Lists all Tareausuario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TareausuarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tareausuario model.
     * @param int $tarusu_id Tarusu ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tarusu_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tarusu_id),
        ]);
    }

    /**
     * Creates a new Tareausuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tareausuario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tarusu_id' => $model->tarusu_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tareausuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tarusu_id Tarusu ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tarusu_id)
    {
        $model = $this->findModel($tarusu_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tarusu_id' => $model->tarusu_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tareausuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tarusu_id Tarusu ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tarusu_id)
    {
        $this->findModel($tarusu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tareausuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tarusu_id Tarusu ID
     * @return Tareausuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tarusu_id)
    {
        if (($model = Tareausuario::findOne(['tarusu_id' => $tarusu_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
