<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Supermarkets */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Supermarkets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supermarkets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

    <table class="table">
        <caption><h4>Empleados</h4></caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($employees)){ ?>
            <?php foreach($employees as $index => $employee){ ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $employee->name; ?></td>
                <td><?= $employee->last_name; ?></td>
            </tr>
            <?php } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="3" class="text-center"><h3>No hay empleados en este supermercado</h3></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
