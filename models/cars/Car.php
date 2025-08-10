<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $model_id
 * @property string|null $image_url
 * @property int $price
 *
 * @property CarModel $model
 * @property Request[] $requests
 */
class Car extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['image_url', 'string', 'max' => 1024],
            ['image_url', 'default', 'value' => null],
            [['model_id', 'price'], 'required'],
            [['model_id', 'price'], 'integer'],
            [['image_url'], 'string', 'max' => 1024],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarModel::class, 'targetAttribute' => ['model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_id' => 'Model ID',
            'image_url' => 'Image Url',
            'price' => 'Price',
        ];
    }

    public function getModel()
    {
        return $this->hasOne(CarModel::class, ['id' => 'model_id']);
    }

    public function getBrand(): \yii\db\ActiveQuery
    {
        // Через модель тянем бренд
        return $this->hasOne(CarBrand::class, ['id' => 'brand_id'])->via('model');
    }
}
