<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Employees */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="img-avatar-bx pull-right">
     <?= Html::img($model->getImageUrl(), ['alt' => 'avatar-'.$model->name, 'class' => 'img-responsive']);?>   
    </div>  
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'last_name',
            'phone',
            'email:email',
            'supermarket.name',
        ],
    ]) ?>

</div>
