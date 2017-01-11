<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employees`.
 */
class m170111_154006_create_employees_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('employees', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->integer(),
            'email' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('employees');
    }
}
