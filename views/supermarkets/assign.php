<?php


$this->title = Yii::t('app', 'Asignación de productos');
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="products-index">
<h3>Selecciona los productos asciados al supermercado</h3>
	<div class="container">
		<select id='pre-selected-options' multiple='multiple'>
		  	<?php foreach ($productos as $key => $value) { ?>
		  		 <option value='<?= $key?>'><?= $value ?></option>			
		  	<?php } ?>		
		</select>
	</div>
</div>


