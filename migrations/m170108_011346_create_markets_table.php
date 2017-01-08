<?php

use yii\db\Migration;

/**
 * Handles the creation of table `markets`.
 */
class m170108_011346_create_markets_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('supermarkets', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('markets');
    }
}
