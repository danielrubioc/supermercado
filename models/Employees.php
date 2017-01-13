<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property integer $phone
 * @property string $email
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
        
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone','supermarket_id'], 'integer'],
            [['name', 'last_name', 'email'], 'string', 'max' => 255],
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
            'last_name' => 'Apellido',
            'phone' => 'Contacto',
            'email' => 'Correo',
            'supermarket_id' => 'Supermercado',
        ];
    }
    public function getSupermarket()
    {
        return $this->hasOne(Supermarkets::className(), ['id' => 'supermarket_id']);
    }
}
