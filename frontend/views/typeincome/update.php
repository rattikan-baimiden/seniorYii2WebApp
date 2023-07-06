<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Typeincome */

$this->title = 'Update Typeincome: ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Typeincomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', '_id' => (string) $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="typeincome-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
