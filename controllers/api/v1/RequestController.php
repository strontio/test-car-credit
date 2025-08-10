<?php

namespace app\controllers\api\v1;

use app\models\forms\CreditCalculateForm;
use app\models\Request;
use app\resources\api\v1\CreditCalculateResource;
use app\services\CreditCalculatorService;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class RequestController extends ActiveController
{
    public $modelClass = 'app\models\Request';

    protected function normalizeRequestData(array $data): array
    {
        $result = [];
        foreach ($data as $k => $v) {
            $newKey = \yii\helpers\Inflector::camel2id($k, '_');
            if (is_array($v)) {
                $v = $this->normalizeRequestData($v);
            }
            $result[$newKey] = $v;
        }

        return $result;
    }

    public function actions()
    {
        return [];
    }

    public function actionCreate()
    {
        $body = Yii::$app->request->getBodyParams();

        $body = $this->normalizeRequestData($body);

        $model = new Request();
        $model->load($body, '');
        if ($model->save()) {
            return ['success' => true   ];
        }
        return ['success' => false, 'errors' => $model->errors];
    }
}