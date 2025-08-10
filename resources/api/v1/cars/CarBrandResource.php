<?php

namespace app\resources\api\v1\cars;

use app\models\cars\CarBrand;

class CarBrandResource
{
    public int $id;
    public string $name;

    public function __construct(CarBrand $carBrand)
    {
        if ($carBrand) {
            $this->id = $carBrand->id;
            $this->name = $carBrand->name;
        }
    }
}