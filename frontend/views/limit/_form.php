<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Limit */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .bg-register-image {
        background: url("https://www.sketchappsources.com/resources/source-image/investing-finance-icons-fullratio.png");
        background-position: center;
        background-size: cover;
    }
    .bg-register-color {
        background-image: url('https://media.istockphoto.com/id/657808882/photo/gradient-blue-light-background.jpg?s=612x612&w=0&k=20&c=ZpJp7r_3f3BFcHgoAw2GG4QEr_BjOAlXZBmvjLYCEFM=');
        background-size: cover;
    }
    .block {
        border-radius: 10rem;
        padding: 1.5rem 1rem;
    }
</style>

<div class="container">
    <div class="site-signup">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7 bg-register-color">
                        <div class="p-5">
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

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

