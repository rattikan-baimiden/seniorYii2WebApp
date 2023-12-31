<?php

use app\models;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypeincomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Typeincomes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeincome-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Typeincome', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // '_id',
            'type_name',
            // 'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Typeincome $model, $key, $index, $column) {
                    return Url::toRoute([$action, '_id' => (string) $model->_id]);
                 }
            ],
        ],
    ]); ?>


</div>
