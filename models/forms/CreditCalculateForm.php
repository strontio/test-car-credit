<?php

namespace app\models\forms;

class CreditCalculateForm extends \yii\base\Model
{
    public int $price;
    public int $initialPayment;
    public int $loanTerm;

    public function rules()
    {
        return [
            [['price', 'initialPayment', 'loanTerm'], 'required'],
            [['price', 'initialPayment', 'loanTerm'], 'integer', 'min' => 1],
            ['price', 'compare', 'compareAttribute' => 'initialPayment', 'operator' => '>', 'type' => 'number', 'message' => 'Price must be greater than initial payment'],
        ];
    }
}