<?php

use yii\bootstrap5\Html;
$this->title = 'Inicio';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas recientes',
                'theme' => 'gradient-success',
            ]) ?>
            <ul>
                <?php if (!empty($tareasRecientes)) : ?>
                    <?php foreach ($tareasRecientes as $tarea) : ?>
                        <li><?= Html::a($tarea->tar_nombre, ['tarea/view', 'tar_id' => $tarea->tar_id]) ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>No hay tareas recientes.</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas vencidas',
                'theme' => 'gradient-danger',
            ]) ?>
<ul>
                <?php if (!empty($tareasVencidas)) : ?>
                    <?php foreach ($tareasVencidas as $tarea) : ?>
                        <li><?= Html::a($tarea->tar_nombre, ['tarea/view', 'tar_id' => $tarea->tar_id]) ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>No hay tareas vencidas.</li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas próximas a vencer',
                'theme' => 'gradient-warning',
            ]) ?>

<ul>
                <?php if (!empty($tareasProximasVencer)) : ?>
                    <?php foreach ($tareasProximasVencer as $tarea) : ?>
                        <li><?= Html::a($tarea->tar_nombre, ['tarea/view', 'tar_id' => $tarea->tar_id]) ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>No hay tareas a vencer proximamente.</li>
                <?php endif; ?>
            </ul>


        </div>
    </div>
</div>