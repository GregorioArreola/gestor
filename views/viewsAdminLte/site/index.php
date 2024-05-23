<?php

use yii\bootstrap5\Html;
$this->title = 'Inicio';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas recientes',
                'theme' => 'gradient-success',

            ]) ?>
        </div>

    </div>

    <div class="row">
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
                    <li>No hay tareas recientes.</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas proximas a vencer',
                'theme' => 'gradient-warning',
            ]) ?>
<<<<<<< HEAD
        </div>
    </div>

=======
>>>>>>> parent of 262b5e9 (no se)
        </div>
    </div>

</div>
</div>
</div>