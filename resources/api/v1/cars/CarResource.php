<?php

namespace app\resources\api\v1\cars;

use app\models\cars\Car;

class CarResource
{
    public int $id;
    public ?string $photo;
    public int $price;

    public function __construct(Car $car)
    {
        $this->id = $car->id;
        $this->photo = $car->image_url;
        $this->price = (int) $car->price;
    }
}