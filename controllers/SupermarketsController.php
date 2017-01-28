<?php

namespace app\controllers;

use Yii;
use app\models\Supermarkets;
use app\models\Employees;
use app\models\SearchSupermarkets;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Products;
use yii\helpers\ArrayHelper;

/**
 * SupermarketsController implements the CRUD actions for Supermarkets model.
 */
class SupermarketsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Supermarkets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchSupermarkets();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Supermarkets model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $employees = $model->employees;
        return $this->render('view', [
            'model' => $model,
            'employees' => $employees
        ]);
    }

    /**
     * Creates a new Supermarkets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Supermarkets();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Guardado correctamente!");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Supermarkets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Modificado correctamente!");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Supermarkets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', "Eliminado correctamente!");
        return $this->redirect(['index']);
    }

    public function actionAssign($id){
        $supermarket = Supermarkets::findOne($id);
        $old_products = $supermarket->supermarketProducts;
        
        if (Yii::$app->request->post('products')) {
            if (count($old_products)) {
                foreach ($old_products as $old_product) {
                    $supermarket->unlink('supermarketProducts', Products::findOne($old_product), true);
                }
            }
            
            $new_products = Yii::$app->request->post('products');
            
            if (count($new_products)) {
                foreach ($new_products as $new_product) {
                    $supermarket->link('supermarketProducts', Products::findOne($new_product));
                }
            }
            
            $old_products = $supermarket->supermarketProducts;
        }
        
        $selected_products = ArrayHelper::map($old_products, 'id', 'name');
        $productos = ArrayHelper::map(Products::find()->all(), 'id', 'name');  
        
        return $this->render('assign', [
            'productos'=>$productos, 
            'supermarket'=>$supermarket, 
            'selected_products'=>$selected_products,
        ]);
    }

    /**
     * Finds the Supermarkets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Supermarkets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Supermarkets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
