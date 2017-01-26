<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supermarkets".
 *
 * @property integer $id
 * @property string $name
 *
 * @property SupermarketProduct[] $supermarketProducts
 */
class Supermarkets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supermarkets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupermarketProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])
                ->viaTable('product_supermarket', ['supermarket_id'  => 'id']);
    }
    
    public function getEmployees()
    {
         return $this->hasMany(Employees::className(), ['supermarket_id' => 'id']);
    }
}
