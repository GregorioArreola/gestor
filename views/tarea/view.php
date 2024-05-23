<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tarea */

$this->title = $model->tar_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarea-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'tar_id' => $model->tar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'tar_id' => $model->tar_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que quiere eliminar esta tarea?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'tar_id',
        'tar_nombre',
        'tar_descripcion',
        [
            'attribute' => 'tar_fkprioridad',
            'value' => $model->tarFkprioridad ? $model->tarFkprioridad->prio_nombre : 'No definida',
        ],
        [
            'attribute' => 'tar_fkestado',
            'value' => $model->tarFkestado ? $model->tarFkestado->est_nombre : 'No definido',
        ],
        [
            'attribute' => 'tar_fkmateria',
            'value' => $model->tarFkmateria ? $model->tarFkmateria->mat_nombre : 'No definido',
        ],
        [
            'attribute' => 'tar_creacion',
            'format' => ['date', 'php:Y-m-d'], // Muestra solo la fecha en formato YYYY-MM-DD
        ],
        [
            'attribute' => 'tar_finalizacion',
            'format' => ['date', 'php:Y-m-d'], // Muestra solo la fecha en formato YYYY-MM-DD
        ],
        [
            'attribute' => 'tar_inicio',
            'format' => ['date', 'php:Y-m-d'], // Muestra solo la fecha en formato YYYY-MM-DD
        ],
        [
            'attribute' => 'tar_cierre',
            'format' => ['date', 'php:Y-m-d'], // Muestra solo la fecha en formato YYYY-MM-DD
        ],
    ],
]) ?>


</div>