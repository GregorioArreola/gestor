<?php
/* @var $this yii\web\View */
/* @var $tareas array of app\models\Periodo */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'Listado de periodos';
?>

<?php if (!empty($periodos)): ?>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre del periodo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($periodos as $periodo): ?>
            <tr>
                
                <td><?= Html::a(htmlspecialchars($periodo->per_nombre), ['periodo/materiasperiodo', 'per_id' => $periodo->per_id]) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>No se encontraron periodos.</p>
<?php endif; ?>
