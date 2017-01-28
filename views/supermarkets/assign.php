<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Asignación de productos');
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="products-index">
<h3>Asigna productos al supermercado <?= $supermarket->name; ?></h3>
	<div class="container">
	
		<?php $form = ActiveForm::begin(); ?>

			<input type="hidden" name="supermarket_id" value="<?= $supermarket->id; ?>">

			<div class="form-group">
				<select id='pre-selected-options' multiple='multiple' name="products[]">
				  	<?php foreach ($productos as $key => $value) { ?>
				  		 <?php if(ArrayHelper::keyExists($key, $selected_products, false)){ ?>
							<option value='<?= $key; ?>' selected><?= $value; ?></option>
				  		 <?php }else{ ?>
				  		 	<option value='<?= $key; ?>'><?= $value; ?></option>			
				  		 <?php } ?>			
				  	<?php } ?>		
				</select>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar cambios</button>
			</div>
		
		<?php ActiveForm::end(); ?>

	</div>
</div>
