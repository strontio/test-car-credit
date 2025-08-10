<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m250810_140811_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer()->notNull(),
            'program_id' => $this->integer()->notNull(),
            'initial_payment' => $this->integer(),
            'loan_term' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_request_car',
            '{{%request}}',
            'car_id',
            '{{%car}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_request_program',
            '{{%request}}',
            'program_id',
            '{{%credit_program}}',
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
        $this->dropTable('{{%request}}');
    }
}
