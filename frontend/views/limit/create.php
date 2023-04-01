<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Limit */

$this->title = 'Add Limit';
// $this->params['breadcrumbs'][] = ['label' => 'Limits', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="limit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
