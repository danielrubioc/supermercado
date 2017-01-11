<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_supermarket`.
 * Has foreign keys to the tables:
 *
 * - `products`
 * - `supermarkets`
 */
class m170111_153121_create_product_supermarket_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_supermarket', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'supermarket_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_supermarket-product_id',
            'product_supermarket',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-product_supermarket-product_id',
            'product_supermarket',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `supermarket_id`
        $this->createIndex(
            'idx-product_supermarket-supermarket_id',
            'product_supermarket',
            'supermarket_id'
        );

        // add foreign key for table `supermarkets`
        $this->addForeignKey(
            'fk-product_supermarket-supermarket_id',
            'product_supermarket',
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
        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-product_supermarket-product_id',
            'product_supermarket'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_supermarket-product_id',
            'product_supermarket'
        );

        // drops foreign key for table `supermarkets`
        $this->dropForeignKey(
            'fk-product_supermarket-supermarket_id',
            'product_supermarket'
        );

        // drops index for column `supermarket_id`
        $this->dropIndex(
            'idx-product_supermarket-supermarket_id',
            'product_supermarket'
        );

        $this->dropTable('product_supermarket');
    }
}
