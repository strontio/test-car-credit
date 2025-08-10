<?php

namespace app\resources\api\v1;

use app\models\CreditProgram;

class CreditCalculateResource
{
    public int $programId;
    public int $interestRate;
    public float $monthPayment;
    public string $title;

    public function __construct(CreditProgram $program, float $monthPayment)
    {
        $this->programId = $program->id;
        $this->interestRate = round($program->credit_percent, 1);
        $this->title = $program->program_name;
        $this->monthPayment = $monthPayment;
    }
}