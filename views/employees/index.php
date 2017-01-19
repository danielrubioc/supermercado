<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Employees');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Employees'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'last_name',
            'phone',
            'email:email',
            'supermarket.name',
            /* mostrar imagen dentro de widget
            [   
                'attribute' => 'Avatar',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value' => function ($model) {
                    return $model->getImageUrl(); 
                },
            ],
            */
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php  ?>
