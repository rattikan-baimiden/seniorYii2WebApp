<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Typesexpense */

$this->title = 'Create Typesexpense';
$this->params['breadcrumbs'][] = ['label' => 'Typesexpenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typesexpense-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
