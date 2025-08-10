<?php

namespace app\controllers\api\v1;

use app\models\cars\Car;
use app\resources\api\v1\cars\CarDetailResource;
use app\resources\api\v1\cars\CarListResource;
use yii\rest\ActiveController;

class CarController extends ActiveController
{
    public $modelClass = 'app\models\cars\Car';

    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        $cars = Car::find()
            ->with('brand')
            ->all();

        return array_map(fn($car) => new CarListResource($car), $cars);
    }

    public function actionView($id)
    {
        $car = Car::find()
            ->with(['brand', 'model'])
            ->where(['id' => $id])
            ->one();

        if (!$car) {
            throw new \yii\web\NotFoundHttpException('Запись не найдена');
        }

        return new CarDetailResource($car);
    }
}
