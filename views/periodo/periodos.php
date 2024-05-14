<?php
/* @var $this yii\web\View */
/* @var $periodos array of app\models\Periodo */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'Listado de periodos';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-3"><?= $this->title ?></h1>
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
                        <p>
                            <?= Html::a('Crear periodo', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    <?php else: ?>
                        <p class="text-center">No se encontraron periodos.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
