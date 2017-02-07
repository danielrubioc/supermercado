<?php

use yii\db\Migration;

/**
 * Handles adding price to table `product_supermarket`.
 */
class m170207_221054_add_price_column_to_product_supermarket_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product_supermarket', 'price', $this->integer());
        $this->addColumn('product_supermarket', 'quantity', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product_supermarket', 'price');
        $this->dropColumn('product_supermarket', 'quantity');
    }
}
