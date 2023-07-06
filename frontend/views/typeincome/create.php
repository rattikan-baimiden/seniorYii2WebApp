<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Typeincome */

$this->title = 'Create Typeincome';
$this->params['breadcrumbs'][] = ['label' => 'Typeincomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeincome-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
