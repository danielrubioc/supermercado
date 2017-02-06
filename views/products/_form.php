<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <label>Supermercado</label>
    <p><?= Html::activeDropDownList($model, 'supermarketProducts', $supermarkets, ['class'=>'form-control']) ?></p>
    
    <?=   $form->field($model, 'category_id')->widget(Select2::classname(), 
                [
                    'data' => $category,
                    'options' => ['placeholder' => 'Selecciona la categoría del producto ...'],
                    'pluginOptions' => [
                    ],
                ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
