<?php

namespace app\resources\api\v1\cars;

use app\models\cars\Car;

class CarListResource extends CarResource
{
    public CarBrandResource $brand;

    public function __construct(Car $car)
    {
        parent::__construct($car);
        $this->brand = new CarBrandResource($car->brand);
    }
}