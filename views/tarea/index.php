<?php

use app\models\Tarea;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TareaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarea-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tarea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tar_id',
            'tar_nombre',
            'tar_descripcion',
            'tar_fkprioridad',
            'tar_fkestado',
            //'tar_creacion',
            //'tar_finalizacion',
            //'tar_inicio',
            //'tar_cierre',
            //'tar_fkmateria',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tarea $model, $key, $index) {
                    return Url::toRoute([$action, 'tar_id' => $model->tar_id]);
                }
            ],
        ],
    ]); ?>


</div>