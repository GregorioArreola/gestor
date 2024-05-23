<?php
use yii\helpers\Html;
$this->title = 'Inicio';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <!-- Tareas recientes -->
        <div class="col-md-4 col-sm-6 col-12 mb-4">
            <div class="card text-white bg-gradient-success">
                <div class="card-header">Tareas recientes</div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <?= Html::img('@web/images/reciente4.png', ['alt' => 'Tareas recientes', 'class' => 'img-fluid me-3', 'style' => 'height: 100px;']) ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if (!empty($tareasRecientes)) : ?>
                            <?php foreach ($tareasRecientes as $tarea) : ?>
                                <li class="list-group-item bg-transparent text-white"><?= $tarea->tar_nombre ?></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li class="list-group-item bg-transparent text-white">No hay tareas recientes.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Tareas vencidas -->
        <div class="col-md-4 col-sm-6 col-12 mb-4">
            <div class="card text-white bg-gradient-danger">
                <div class="card-header">Tareas vencidas</div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <?= Html::img('@web/images/vencida2.png', ['alt' => 'Tareas vencidas', 'class' => 'img-fluid me-3', 'style' => 'height: 100px;']) ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if (!empty($tareasVencidas)) : ?>
                            <?php foreach ($tareasVencidas as $tarea) : ?>
                                <li class="list-group-item bg-transparent text-white"><?= $tarea->tar_nombre ?></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li class="list-group-item bg-transparent text-white">No hay tareas vencidas.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Tareas próximas a vencer -->
        <div class="col-md-4 col-sm-6 col-12 mb-4">
            <div class="card text-white bg-gradient-warning">
                <div class="card-header">Tareas próximas a vencer</div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <?= Html::img('@web/images/proxima.png', ['alt' => 'Tareas próximas a vencer', 'class' => 'img-fluid me-3', 'style' => 'height: 100px;']) ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if (!empty($tareasProximas)) : ?>
                            <?php foreach ($tareasProximas as $tarea) : ?>
                                <li class="list-group-item bg-transparent text-white"><?= $tarea->tar_nombre ?></li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li class="list-group-item bg-transparent text-white">No hay tareas próximas a vencer.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
