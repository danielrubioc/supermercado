<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employees`.
 * Has foreign keys to the tables:
 *
 * - `supermarkets`
 */
class m170111_163435_create_employees_table extends Migration
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
            'supermarket_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `supermarket_id`
        $this->createIndex(
            'idx-employees-supermarket_id',
            'employees',
            'supermarket_id'
        );

        // add foreign key for table `supermarkets`
        $this->addForeignKey(
            'fk-employees-supermarket_id',
            'employees',
            'supermarket_id',
            'supermarkets',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `supermarkets`
        $this->dropForeignKey(
            'fk-employees-supermarket_id',
            'employees'
        );

        // drops index for column `supermarket_id`
        $this->dropIndex(
            'idx-employees-supermarket_id',
            'employees'
        );

        $this->dropTable('employees');
    }
}
