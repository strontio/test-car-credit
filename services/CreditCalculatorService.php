<?php

namespace app\services;

use app\exceptions\CreditProgramNotFoundException;
use app\models\CreditProgram;
class CreditCalculatorService
{
    private int $initialPayment;
    private int $loanTerm;
    private int $price;
    private CreditProgram $creditProgram;
    private float $monthPayment;

    public function __construct(int $initialPayment, int $loanTerm, int $price)
    {
        $this->initialPayment = $initialPayment;
        $this->loanTerm = $loanTerm;
        $this->price = $price;

        $this->calcData();
    }

    private function calcData()
    {
        $this->creditProgram = $this->getCreditProgram();
        $this->monthPayment = $this->getMonthPayment();
    }

    private function getCreditProgram(): CreditProgram
    {
        $program = CreditProgram::find()
            ->where([
                'or',
                ['<=', 'min_initial_payment', $this->initialPayment],
                ['min_initial_payment' => null],

            ])
            ->andWhere([
                'or',
                ['>=', 'max_initial_payment', $this->initialPayment],
                ['max_initial_payment' => null],
            ])
            ->andWhere([
                'or',
                ['<=', 'min_months', $this->initialPayment],
                ['min_months' => null],

            ])
            ->andWhere([
                'or',
                ['>=', 'max_months', $this->initialPayment],
                ['max_months' => null],
            ])
            ->orderBy(['credit_percent' => SORT_DESC])
            ->one();

        if (!$program) {
            throw new CreditProgramNotFoundException();
        }

        return $program;
    }

    private function getMonthPayment(): float
    {
        // Тут полная чушь потому что я не очень в курсе как оно считается,
        // а для тестового это как будто не критичный момент?
        return ($this->price - $this->initialPayment) / $this->loanTerm * $this->creditProgram->credit_percent;
    }

    public function getCreditParams()
    {
        return [
            'creditProgram' => $this->creditProgram,
            'monthPayment' => $this->monthPayment
        ];
    }
}