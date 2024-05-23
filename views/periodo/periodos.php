<?php
/* @var $this yii\web\View */
/* @var $periodos array of app\models\Periodo */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = '';
?>

<body class="bg-light">


    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Cambia el color del card aquí -->
                <div class="card  text-white" style="background-color: rgba(0, 0, 0, 0.5);">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <?= Html::img('@web/images/lista2.png', ['alt' => 'Tareas recientes', 'class' => 'img-fluid me-3', 'style' => 'height: 100px;']) ?>
                        </div>
                        <h1 class="card-title text-center mb-3">Listado de Periodo</h1>
                        <?php if (!empty($periodos)) : ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre del periodo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($periodos as $periodo) : ?>
                                        <tr>
                                            <td><?= Html::a(htmlspecialchars($periodo->per_nombre), ['periodo/materiasperiodo', 'per_id' => $periodo->per_id], ['class' => 'text-white']) ?>
</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        <?php else : ?>
                            <p class="text-center">No se encontraron periodos.</p>
                        <?php endif; ?>
                        <p>
                            <?= Html::a('Crear periodo', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>