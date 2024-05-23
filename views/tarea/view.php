<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tarea $model */

$this->title = $model->tar_id;
$this->params['breadcrumbs'][] = ['label' => 'Tareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tarea-view">

    <h1></h1>

    <p>
        <?= Html::a('Update', ['update', 'tar_id' => $model->tar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tar_id' => $model->tar_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'tar_creacion',
            'tar_finalizacion',
            'tar_inicio',
            'tar_cierre',
        ],
    ]) ?>

<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> DevelopGregorio
