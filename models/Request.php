<?php

namespace app\models;

use app\models\cars\Car;
use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $car_id
 * @property int $program_id
 * @property int|null $initial_payment
 * @property int|null $loan_term
 *
 * @property Car $car
 * @property CreditProgram $program
 */
class Request extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['initial_payment', 'loan_term'], 'default', 'value' => null],
            [['car_id', 'program_id'], 'required'],
            [['car_id', 'program_id', 'initial_payment', 'loan_term'], 'default', 'value' => null],
            [['car_id', 'program_id', 'initial_payment', 'loan_term'], 'integer'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => CreditProgram::class, 'targetAttribute' => ['program_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'program_id' => 'Program ID',
            'initial_payment' => 'Initial Payment',
            'loan_term' => 'Loan Term',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }

    /**
     * Gets query for [[Program]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(CreditProgram::class, ['id' => 'program_id']);
    }

}
