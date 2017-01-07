<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Supermarkets */

$this->title = 'Create Supermarkets';
$this->params['breadcrumbs'][] = ['label' => 'Supermarkets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supermarkets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
