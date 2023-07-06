<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Limit */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .bg-register-image {
        background: url("https://img.freepik.com/premium-vector/vector-cartoon-business-finance-management-icon-comic-style-time-is-money-concept-illustration-pictogram-financial-strategy-business-splash-effect-concept_157943-5361.jpg?w=2000");
        background-position: center;
        background-size: cover;
    }
    .bg-register-color {
        background-image: url('https://webgradients.com/public/webgradients_png/010%20Winter%20Neva.png');
        background-size: cover;
    }
    .typeBlock {
        border-radius: 2rem;
        
    }
    .bg-color {
        background-color: #0B0B45;
        color:#ececec;
    }

</style>
<body style="background-image: url('https://minzel.io/svg/logout_background_blue_spot_1.svg');background-size: cover;background-position: center;">
    <div class="">
        <div class="site-signup">
            <div class="card o-hidden border-0 my-5 shadow typeBlock">
                <div class="">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <img src="https://cdn3.iconfinder.com/data/icons/finance-dark-lines/510/Cash_finance_limit_money_settings-512.png" class="rounded mx-auto d-block" alt="..." width="100px">
                                <br/>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add limit</h1>
                                </div>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'form-signup',
                                    'options' => ['class' => 'user']
                                ]); ?>
                                    <?= $form->field($model, 'amount', [
                                        'inputOptions' => [
                                            'class' => 'form-control form-control-user',
                                        ]
                                    ])->textInput(['autofocus' => true]) ?>

                                    <!-- create_date -->
                                    <?= $form->field($model, 'create_date', [
                                        'inputOptions' => [
                                            'class' => 'form-control form-control-user',
                                        ]
                                    ])->hiddenInput(['autofocus' => true])->label(false) ?>

                                    <!-- update_date -->
                                    <?= $form->field($model, 'update_date', [
                                        'inputOptions' => [
                                            'class' => 'form-control form-control-user',
                                        ]
                                    ])->hiddenInput(['autofocus' => true])->label(false) ?>

                                    <?= $form->field($model, 'update_by')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

                                    <?= $form->field($model, 'create_by')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

                                    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false) ?>

                                    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-user btn-block']) ?>
                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

