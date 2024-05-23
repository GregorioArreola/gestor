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
            'tar_fkprioridad',
            'tar_fkestado',
            'tar_creacion',
            'tar_finalizacion',
            'tar_inicio',
            'tar_cierre',
            'tar_fkmateria',
        ],
    ]) ?>


</div>