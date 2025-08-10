<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m250810_140810_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'model_id' => $this->integer()->notNull(),
            'image_url' => $this->string(1024),
            'price' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_car_model',
            '{{%car}}',
            'model_id',
            '{{%car_model}}',
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
        $this->dropForeignKey('fk_car_model', '{{%car}}');
        $this->dropTable('{{%car}}');
    }
}
