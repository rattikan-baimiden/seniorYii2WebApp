<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Typeincome */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typeincome-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_name') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
