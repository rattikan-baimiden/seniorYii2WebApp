<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>

<style>
    .bg-login-image {
        background: url("https://img.freepik.com/premium-vector/vector-cartoon-business-finance-management-icon-comic-style-time-is-money-concept-illustration-pictogram-financial-strategy-business-splash-effect-concept_157943-5361.jpg?w=2000");
        background-position: center;
        background-size: cover;
    }
    .bg-login-color {
        background-image: url('https://webgradients.com/public/webgradients_png/010%20Winter%20Neva.png');
        background-size: cover;
    }
</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6 bg-login-color">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Log in</h1>
                                </div>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'options' => ['class' => 'user']
                                ]); ?>
                                    <?= $form->field($model, 'username', [
                                        'inputOptions' => [
                                            'class' => 'form-control form-control-user',
                                            'placholder' => 'Enter your username'
                                        ]
                                    ])->textInput(['autofocus' => true]) ?>

                                    <?= $form->field($model, 'password', [
                                        'inputOptions' => [
                                            'class' => 'form-control form-control-user',
                                            'placholder' => 'Enter your password'
                                        ]
                                    ])->passwordInput() ?>


                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
                                <?php ActiveForm::end() ?>
                            </div>
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
