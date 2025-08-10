<?php

namespace app\resources\api\v1\cars;

use app\models\cars\Car;

class CarDetailResource extends CarResource
{
    public CarBrandResource $brand;
    public CarModelResource $model;

    public function __construct(Car $car)
    {
        parent::__construct($car);
        $this->brand = new CarBrandResource($car->brand);
        $this->model = new CarModelResource($car->model);
    }
}