<?php

namespace app\controllers;

use Yii;
use materias;
use app\models\Tarea;
use app\models\Materia;
use app\models\Periodo;
use yii\web\Controller;
use app\models\Personal;
use app\models\TareaSearch;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * TareaController implements the CRUD actions for Tarea model.
 */
class TareaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Tarea models.
     *
     * @return string
     */
    public function actionIndex() {
        $prioridad_id = Yii::$app->request->get('prioridad_id');
        $periodo_id = Yii::$app->request->get('periodo_id');
        $order = Yii::$app->request->get('order', 'asc');
        $usuario_actual_id = Yii::$app->user->identity->getId();
    
        // Consulta para obtener las tareas con los filtros aplicados
        $query = Tarea::find()->joinWith([
            'tarFkmateria.matFkperiodo.perFkpersonal' => function ($query) use ($usuario_actual_id) {
                $query->where(['personal.per_fkusuario' => $usuario_actual_id]);
            }
        ]);
    
        if (!empty($prioridad_id)) {
            $query->andWhere(['tarea.tar_fkprioridad' => $prioridad_id]);
        }
    
        if (!empty($periodo_id)) {
            $query->andWhere(['periodo.per_id' => $periodo_id]);
        }
    
        $query->orderBy(['tarea.tar_id' => $order === 'asc' ? SORT_ASC : SORT_DESC]);
        $tareas = $query->all();
    
        // Consulta para obtener los periodos vinculados al usuario logueado
        $periodos = Periodo::find()
            ->innerJoin('materia', 'periodo.per_id = materia.mat_fkperiodo')
            ->innerJoin('personal', 'periodo.per_fkpersonal = personal.per_id')
            ->where(['personal.per_fkusuario' => $usuario_actual_id])
            ->distinct()
            ->all();
    
        return $this->render('tareas', [
            'tareas' => $tareas,
            'periodos' => $periodos,
            'currentOrder' => $order,
            'periodo_id' => $periodo_id,
            'prioridad_id' => $prioridad_id
        ]);
    }
    

    // Elimina cualquier llave adicional aquí antes de la declaración de la función actionView
    
    /**
     * Displays a single Tarea model.
     * @param int $tar_id Tar ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tar_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tar_id),
        ]);
    }

    // Otras funciones...

    /**
     * Finds the Tarea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tar_id Tar ID
     * @return Tarea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tar_id)
    {
        if (($model = Tarea::findOne(['tar_id' => $tar_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        $model = new Tarea();
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // Establecer la fecha y hora actual para el campo de creación
                $model->tar_creacion = date('Y-m-d H:i:s');
    
                // Establecer el estado inicial de la tarea
                $model->tar_fkestado = 2;  // Asumiendo que el ID 2 corresponde al estado inicial deseado
    
                // Asegurarse de que el campo tar_cierre sea nulo
                $model->tar_cierre = null;
    
                if ($model->save()) {
                    return $this->redirect(['view', 'tar_id' => $model->tar_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionGetMaterias($periodo_id)
    {
        $materias = Materia::find()->where(['mat_fkperiodo' => $periodo_id])->all();
        if (!empty($materias)) {
            foreach ($materias as $materia) {
                echo "<option value='" . $materia->mat_id . "'>" . $materia->mat_nombre . "</option>";
            }
        } else {
            echo "<option>- No hay materias disponibles -</option>";
        }
    }
    
    public function actionUpdate($tar_id)
    {
        $model = $this->findModel($tar_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tar_id' => $model->tar_id]);
        }

        return $this->render('_viewupdate', [
            'model' => $model,
        ]);

    }
}
