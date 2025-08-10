<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_model}}`.
 */
class m250810_140809_create_car_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_model}}', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string(512),
        ]);

        $this->addForeignKey(
            'fk_model_brand',
            '{{%car_model}}',
            'brand_id',
            '{{%brand}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_model_brand', '{{%model}}');
        $this->dropTable('{{%model}}');
    }
}
