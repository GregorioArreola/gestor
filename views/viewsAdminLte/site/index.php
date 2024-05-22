<?php
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
                        <li><?= $tarea->tar_nombre ?></li>
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
                    <?php foreach ($tareasRecientes as $tarea) : ?>
                        <li><?= $tarea->tar_nombre ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>No hay tareas recientes.</li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas próximas a vencer',
                'theme' => 'gradient-warning',
            ]) ?>


        </div>
    </div>
</div>