<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "credit_program".
 *
 * @property int $id
 * @property int|null $min_initial_payment
 * @property int|null $max_initial_payment
 * @property int|null $min_months
 * @property int|null $max_months
 * @property float|null $credit_percent
 * @property string $program_name
 *
 * @property Request[] $requests
 */
class CreditProgram extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'credit_program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['min_initial_payment', 'max_initial_payment', 'min_months', 'max_months', 'credit_percent'], 'default', 'value' => null],
            [['min_initial_payment', 'max_initial_payment', 'min_months', 'max_months'], 'default', 'value' => null],
            [['min_initial_payment', 'max_initial_payment', 'min_months', 'max_months'], 'integer'],
            [['credit_percent'], 'number'],
            [['credit_percent'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min_initial_payment' => 'Min Initial Payment',
            'max_initial_payment' => 'Max Initial Payment',
            'min_months' => 'Min Months',
            'max_months' => 'Max Months',
            'credit_percent' => 'Credit Percent',
        ];
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['program_id' => 'id']);
    }

    public function scopeByPrice()
    {
        
    }

    public function scopeByInitialPayment()
    {
        
    }
}
