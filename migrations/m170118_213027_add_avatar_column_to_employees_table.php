<?php

use yii\db\Migration;

/**
 * Handles adding avatar to table `employees`.
 */
class m170118_213027_add_avatar_column_to_employees_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('employees', 'avatar', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('employees', 'avatar');
    }
}
