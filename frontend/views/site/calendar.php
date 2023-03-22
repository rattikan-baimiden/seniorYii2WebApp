<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Calendar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-calendar">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    echo frontend\fullcalendarWidget::widget(
      ['options'=>[
        'header'=>[
            'left'=>'prev,next today',
            'center'=> 'title',
            'right'=> 'month,agendaWeek,agendaDay'
        ],
        'lang'=>'Th',
        'loading'=>"js:function loading(bool) {if (bool) $('#loading').show();else $('#loading').hide();}",
      ],
    ]	
    );

    ?>

    
</div>
