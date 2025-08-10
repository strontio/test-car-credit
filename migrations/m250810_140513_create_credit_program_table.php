<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%credit_program}}`.
 */
class m250810_140513_create_credit_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%credit_program}}', [
            'id' => $this->primaryKey(),
            'min_initial_payment' => $this->integer(),
            'max_initial_payment' => $this->integer(),
            'min_months' => $this->integer(),
            'max_months' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%credit_program}}');
    }
}
