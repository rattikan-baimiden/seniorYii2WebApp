<?php

use app\models\Expenses;
/** @var yii\web\View $this */

use app\models\Incomes;
use app\models\Typesexpense;
use phpDocumentor\Reflection\Types\String_;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Overview';
?>
<!DOCTYPE html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Hind+Siliguri:wght@300&family=Nunito&family=Open+Sans&family=Sarabun:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Balsamiq Sans', cursive;
        }

        .card {
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            width: 40%;
            margin: 2rem auto;
            height: 560;
            border-radius: 30px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .containerB {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 20px;
        }

        .cartTotal {
            width: 150px;
            height: 560;
            border-radius: 10px;
            text-align: center;
            background-color: #0d6efd;
        }

        p {
            margin-top: 0;
            margin-bottom: 0rem;
        }

        .border {
            border-radius: 10rem;
        }

        .font {
            font-size: 14px;
        }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
</head>

<?php $form = ActiveForm::begin(); ?>

<body style="background-color: #f8f9fa; font-size: 14px;">
    <div class="card" style="width: 100%; margin-top:2px;background-size: cover; background-image: url('https://img.freepik.com/free-vector/gradient-background-green-tones_23-2148395299.jpg');">
        <div class="containerB">
            <div style="font-size: 14px; margin-right: 20px; margin-top: 15px; color:#2F4F4F; ">
                <table style="width:100%; margin-bottom:20px;">
                    <tr>
                        <td>
                            <?php 
                                echo (String)Yii::$app->user->identity->username;
                            ?>
                        </td>
                        <th></th>
                        <th style="text-align: right;">
                            <?= Html::a('<i class="fa-solid fa-plus" style="color:white; font-size: 1em;" data-toggle="modal" data-target="#exampleModalCenter"></i>'); ?>
                            <?= Html::a('<i class="fa-solid fa-th-list" style="color:white; font-size: 1.4em;" data-toggle="modal" data-target="#exampleModalCenter"></i>'); ?>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                    
                </table>
                
                <p>Balance</p>
                <h4><b> 
                    <?php 
                        $income = Incomes::find()->where(["create_by"=>(String)Yii::$app->user->identity->id])->all();
                        $inlist = [];
                        $type_i = [];
                        foreach ($income as $i) {
                            $inlist[] = $i->amount;
                            $type_i[] = $i->income_type;
                        }
                        $total_income = array_sum($inlist);

                        $expense = Expenses::find()->where(["create_by"=>(String)Yii::$app->user->identity->id])->all();
                        $exlist = [];
                        $type_e = [];
                        foreach ($expense as $e) {
                            $exlist[] = $e->amount;
                            $type_e[] = $e->expense_type;
                        }
                        $total_expense = array_sum($exlist);
                        echo (int)$total_income-(int)$total_expense;
                    ?>
                </b></h4>
                <table style="width:110%">
                    <tr>
                        <td>Amount Income (baht) </td>
                        <th></th>
                        <th>
                            <?php
                                echo $total_income;
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td>Amount Expenses (baht)</td>
                        <td></td>
                        <th>
                            <?php 
                                echo $total_expense;
                            ?>
                        </th>
                    </tr>
                    <tr style="text-align: center;margin-top: 20px;"> 
                        
                    </tr>
                </table>
                <div >
                    <table style="width:110%">
                        <tr>
                            <td>
                                <?= Html::a('<i class="fa-solid fa-plus" style="color:white; font-size: 1em; margin-top: 10px;"></i>', ['expenses/create']); ?>
                                <?= Html::a('<i class="fa-solid fa-duotone fa-money-bill-trend-up" style="color: white;font-size: 2em; margin-top: 10px;"></i>', ['expenses/create']); ?>
                            </td>
                            <td>__________</td>
                            <td style="text-align: center;">
                                <?= Html::a('<i class="fa-solid fa-plus" style="color:white; font-size: 1em;text-align: left; margin-top: 10px;"></i>', ['incomes/create']); ?>
                                <?= Html::a('<i class="fa-solid fa-regular fa-sack-dollar" style="color: white;font-size: 2em;text-align: left; margin-top: 10px;"></i>', ['incomes/create']); ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="width:100%">
        <div style="margin-top:10px; margin-bottom:10px;">
            <center>
                <table style="border:1; width:80%; text-align:center;">
                    <tr>
                        <th>
                            <?= Html::a('<i class="fas fa-plus" style="margin-top:10px;color: #41DBC6;font-size: 15px;"></i>', ['site/pocket']); ?>
                            <?= Html::a('<i class="fa-solid fa-wallet" style="color:#41DBC6; font-size: 2em; "></i>', ['/site/pocket']); ?>
                        </th>
                        <th>
                            <?= Html::a('<i class="fa-regular fa-calendar" style="color:red; font-size: 2em;"></i>', ['/site/calendar']); ?>
                        </th>
                        <th>
                            <?= Html::a('<i class="fa-solid fa-money-check" style="color:blue; font-size: 2em;"></i>', ['/site/limit']); ?>
                        </th>
                        <th>
                            <?= Html::a('<i class="fa-solid fa-chart-simple" style="color:orange; font-size: 2em;"></i>', ['/site/bar']); ?>
                        </th>
                    </tr>
                    <tr>
                        <td>Pocket</td>
                        <td>Calendar</td>
                        <td>Limits</td>
                        <td>Analyze</td>
                    </tr>
                </table>
            </center>
        </div>
    </div>

    <p style="margin-right: 100px;"><b>Your Pocket</b></p>
    <div class=" card" style="width: 100%; margin-top:7px;height: 100px;">
        <div class="container">
            <?php 
                // Filter the rows with non-null ratio
                $typesexpenseModel->query->andFilterWhere(['IS NOT', 'ratio', null]);

                echo GridView::widget([
                    'dataProvider' => $typesexpenseModel,
                    'columns' => [
                        [
                            'attribute' => 'type_name',
                            'format' => 'raw',
                            'contentOptions' => ['class' => ''],
                            'value' => function ($model) {
                                return $model->ratio !== null ? implode(",", (array)$model->type_name) : '';
                            },
                        ],
                        [
                            'attribute' => 'ratio',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->ratio !== null ? $model->ratio : '';
                            },
                        ],
                    ],
                    'summary' => '',
                    'options' => [
                        'class' => 'table table-bordered table-borderless',
                        'style' => 'border: none;', // เพิ่มสไตล์ CSS เพื่อลบเส้นขอบ
                    ],
                    'tableOptions' => [
                        'class' => 'table table-bordered table-borderless',
                        'style' => 'border: none;', // เพิ่มสไตล์ CSS เพื่อลบเส้นขอบ
                    ],
                    'showHeader' => false, // เพิ่มตัวเลือก showHeader เป็น false เพื่อเอาหัวข้อตารางออก
                ]);
            ?>
            <br>
        </div>
    </div>
    
    
    <h4 style="margin-right: 220px;"><b>Recently</b></h4>
    <div class=" card" style="width: 100%; margin-top:7px;">
        <div class="container">
            <table style="width:90%">
                <tr>
                    <th style="padding-top: 10px; padding-left:10px;">
                        <font size="3.5" class="body">Expenses</font>
                    </th>
                    <th></th>
                    <th style="text-align:right;">
                        <?= Html::a('<i class="fa fa-chevron-right" style="margin-top:10px;"></i>', ['/site/expense']); ?>
                    </th>
                </tr>
                <tr>
                    <td style="padding-top: 10px; padding-left:10px;"><?php echo implode("<br>", (array)$type_e) ?></td>
                    <th></th>
                    <th style=" text-align: right;"><?php echo implode("<br>", (array)$exlist) ?></th>
                </tr>
                
            </table>
            <br>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #f8f9fa;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="margin-top: 15px; margin-bottom:17px;">
                        <?= Html::a('Add Savings', ['savings/create'], ['class' => 'btn btn-light border font', 'style' => 'color:black; width:100%; margin-bottom:10px;']); ?><br>
                        <?= Html::a('Add Limit', ['limit/create'], ['class' => 'btn btn-light border font', 'style' => 'color:black; width:100%; margin-bottom:10px;']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<?php ActiveForm::end(); ?>