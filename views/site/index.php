<?php
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
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tareas proximas a vencer',
                'theme' => 'gradient-warning',
            ]) ?>
        </div>
    </div>

</div>
</div>
</div>