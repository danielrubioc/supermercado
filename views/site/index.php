<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <?= Html::img('img/market.png') ?>
      <div class="caption">
        <h3>Supermercados</h3>
        <p>
          <a href="/supermarkets" class="btn btn-primary" role="button">Acceder</a>
        </p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <?= Html::img('img/product.png') ?>
      <div class="caption">
        <h3>Productos</h3>
        <p>
          <a href="/products" class="btn btn-primary" role="button">Acceder</a>
        </p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <?= Html::img('img/employees.png') ?>
      <div class="caption">
        <h3>Empleados</h3>
        <p>
          <a href="/employees" class="btn btn-primary" role="button">Acceder</a>
        </p>
      </div>
    </div>
  </div>
</div>