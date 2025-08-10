<?php

namespace app\controllers\api\v1;

use app\models\forms\CreditCalculateForm;
use app\resources\api\v1\CreditCalculateResource;
use app\services\CreditCalculatorService;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class CreditController extends ActiveController
{
    public $modelClass = 'app\models\CreditProgram';

    public function actions()
    {
        return [];
    }

    function actionCalculate($price, $initialPayment, $loanTerm)
    {
        $form = new CreditCalculateForm(Yii::$app->request->get());

        if (!$form->validate()) {
            return ['errors' => $form->errors];
        }

        try {
            $service = new CreditCalculatorService($form->initialPayment, $form->loanTerm, $form->price);
            $creditData = $service->getCreditParams();
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        return new CreditCalculateResource($creditData['creditProgram'], $creditData['monthPayment']);
    }
}