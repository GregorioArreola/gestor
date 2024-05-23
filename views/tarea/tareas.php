<?php
/* @var $this yii\web\View */
/* @var $tareas array of app\models\Tarea */

use yii\helpers\Url;
use yii\bootstrap5\Html;
use app\models\Prioridad;
use kartik\select2\Select2;

$this->title = '';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="card-title text-center mb-3 display-5">Listado de tareas</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::beginForm(['tarea/index'], 'get') ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <?= Html::dropDownList('prioridad_id', Yii::$app->request->get('prioridad_id'), \app\models\Prioridad::getList(), ['prompt' => 'Seleccione Prioridad', 'class' => 'form-select mb-3']) ?>
                                </div>
                                <div class="col-md-3">
                                    <?= Html::dropDownList('periodo_id', Yii::$app->request->get('periodo_id'), \app\models\Periodo::getList(), ['prompt' => 'Seleccione periodo', 'class' => 'form-select mb-3']) ?>
                                </div>
                                <div class="col-md-3">
                                    <div class="btn-group mb-3">
                                        <?= Html::submitButton('Ordenar Ascendente', ['name' => 'order', 'value' => 'asc', 'class' => 'btn btn-default' . (Yii::$app->request->get('order') == 'asc' ? ' active' : '')]) ?>
                                        <?= Html::submitButton('Ordenar Descendente', ['name' => 'order', 'value' => 'desc', 'class' => 'btn btn-default' . (Yii::$app->request->get('order') == 'desc' ? ' active' : '')]) ?>
                                    </div>
                                </div>

                            </div>
                            <?= Html::endForm() ?>
                        </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                                    <?= Html::submitButton('Filtrar', ['class' => 'btn btn-primary mb-3']) ?>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (!empty($tareas)) : ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la Tarea</th>
                                            <th>Fecha de Finalización</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tareas as $tarea) : ?>
                                            <tr>
                                                <td><?= Html::a(htmlspecialchars($tarea->tar_nombre), ['tarea/vertarea', 'tar_id' => $tarea->tar_id]) ?></td>
                                                <td><?= Yii::$app->formatter->asDate($tarea->tar_finalizacion, 'php:Y-m-d') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-center">No se encontraron tareas.</p>
                            <?php endif; ?>
                            <div class="col-md-3">
                                    <?= Html::a('Crear tarea', ['create'], ['class' => 'btn btn-success mb-3']) ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
