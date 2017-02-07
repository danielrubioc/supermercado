<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 *
 * @property SupermarketProduct[] $supermarketProducts
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 256],
            [['sku'], 'string', 'max' => 256],
            [['category_id'], 'integer'],
            [['name', 'category_id', 'sku'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku' => 'SKU',
            'name' => 'Nombre',
            'category_id' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupermarketProducts()
    {
        return $this->hasMany(Supermarkets::className(), ['id' => 'supermarket_id'])
                ->viaTable('product_supermarket', ['product_id' => 'id']);
    }
    public function getCategories()
    {
        return $this->hasOne(Products::className(), ['id' => 'category_id']);
    }
}
