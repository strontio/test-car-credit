<?php

namespace app\resources\api\v1\cars;

use app\models\cars\CarModel;

class CarModelResource
{
    public int $id;
    public string $name;

    public function __construct(CarModel $carModel)
    {
        if ($carModel) {
            $this->id = $carModel->id;
            $this->name = $carModel->name;
        }
    }
}