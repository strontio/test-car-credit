<?php

namespace app\exceptions;

class CreditProgramNotFoundException extends \DomainException
{
    public $message = 'Кредитная программа не найдена';
}