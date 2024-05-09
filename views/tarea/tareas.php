<?php
/* @var $this yii\web\View */
/* @var $tareas array of app\models\Tarea */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'Listado de Tareas';
?>

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
