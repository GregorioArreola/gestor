<?php

namespace app\controllers;

use Yii;
use app\models\Materia;
use app\models\Periodo;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\MateriaSearch;
use yii\web\NotFoundHttpException;

/**
 * MateriaController implements the CRUD actions for Materia model.
 */
class MateriaController extends Controller
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
     * Lists all Materia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MateriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materia model.
     * @param int $mat_id Mat ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mat_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($mat_id),
        ]);
    }

    /**
     * Creates a new Materia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Materia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mat_id' => $model->mat_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Materia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $mat_id Mat ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mat_id)
    {
        $model = $this->findModel($mat_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mat_id' => $model->mat_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Materia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $mat_id Mat ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mat_id)
    {
        $this->findModel($mat_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Materia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $mat_id Mat ID
     * @return Materia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mat_id)
    {
        if (($model = Materia::findOne(['mat_id' => $mat_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

#no sirve
    public function actionMateriasperiodo($per_id)
    {
        $periodos = Materia::find()
            ->select(['periodo.per_id','periodo.per_nombre','materia.mat_nombre'])
            ->innerJoinWith('matFKperiodo') //llave foranea seguida de punto...
            ->where(['per_id' => $per_id])
            ->all();

        // Aquí puedes procesar las tareas en $tareas, por ejemplo, enviarlas a una vista o algo similar
        return $this->render('materiaperiodo', [
            'materiaperiodo' => $periodos
        ]);
    }


    public function actionMaterias()
    {
        $usuario_actual_id = Yii::$app->user->identity->getId();  // Obtiene el ID del usuario actualmente logueado

        $materias = Materia::find()
            ->select(['mat_nombre','mat_id'])
            ->innerJoinWith('matFkperiodo.perFkpersonal') //llave foranea seguida de punto...
            ->where(['personal.per_fkusuario' => $usuario_actual_id])
            ->all();

        // Aquí puedes procesar las tareas en $tareas, por ejemplo, enviarlas a una vista o algo similar
        return $this->render('materias', [
            'materias' => $materias
        ]);
    }

    public function actionViewMateria($mat_id)
    {
        $materia = Materia::find()
            ->with('tareas') // Asume que 'tareas' es la relación en el modelo de Materia que devuelve las tareas asociadas
            ->where(['mat_id' => $mat_id])
            ->one();
    
        if ($materia === null) {
            throw new NotFoundHttpException("La materia solicitada no existe.");
        }
    
        return $this->render('verMateria', [
            'model' => $materia
        ]);
    }
    

}
