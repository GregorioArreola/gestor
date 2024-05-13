<?php
/* @var $this yii\web\View */
/* @var $tareas array of app\models\Tarea */

use yii\helpers\Url;
use yii\bootstrap5\Html;
use app\models\Prioridad;
use kartik\select2\Select2;


$this->title = 'Listado de Tareas';
?>


<?= Html::beginForm(['tarea/index'], 'get') ?>
    <?= Html::dropDownList('prioridad_id', Yii::$app->request->get('prioridad_id'), \app\models\Prioridad::getList(), ['prompt' => 'Seleccione Prioridad']) ?>
    <?= Html::dropDownList('periodo_id', Yii::$app->request->get('periodo_id'), \app\models\Periodo::getList(), ['prompt' => 'Seleccione periodo']) ?>
    <div class="btn-group">
        <?= Html::submitButton('Ordenar Ascendente', ['name' => 'order', 'value' => 'asc', 'class' => 'btn btn-default' . (Yii::$app->request->get('order') == 'asc' ? ' active' : '')]) ?>
        <?= Html::submitButton('Ordenar Descendente', ['name' => 'order', 'value' => 'desc', 'class' => 'btn btn-default' . (Yii::$app->request->get('order') == 'desc' ? ' active' : '')]) ?>
    </div>
    <?= Html::submitButton('Filtrar', ['class' => 'btn btn-primary']) ?>
<?= Html::endForm() ?>


<?php if (!empty($tareas)): ?>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre de la Tarea</th>
            <th>Fecha de Finalización</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tareas as $tarea): ?>
            <tr>
                <!-- Crear un enlace en el nombre de la tarea -->
                <td><?= Html::a(htmlspecialchars($tarea->tar_nombre), ['tarea/vertarea', 'tar_id' => $tarea->tar_id]) ?></td>
                <td><?= Yii::$app->formatter->asDate($tarea->tar_finalizacion, 'php:Y-m-d') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>No se encontraron tareas.</p>
<?php endif; ?>
