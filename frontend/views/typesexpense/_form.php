<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Typesexpense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typesexpense-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_name') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
