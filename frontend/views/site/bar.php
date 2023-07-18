<?php

/** @var yii\web\View $this */

use app\models\Expenses;
use app\models\Incomes;
use app\models\Types;
use yii\helpers\Html;

$this->title = 'Chart';
?>

<!DOCTYPE html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Hind+Siliguri:wght@300&family=Nunito&family=Open+Sans&family=Sarabun:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Balsamiq Sans', cursive;
        }

        .border {
            border-radius: 10rem;
        }

        .card {
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            width: 40%;
            margin: 2rem auto;
            height: 560;
            border-radius: 30px;
        }

        .font {
            font-size: 14px;
        }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #f8f9fa; font-size: 14px;">
    <div class="site-index" >
        <h3 style="margin-top: 10px; margin-bottom: 20px;">Username</h3>
        <div class="card" style="width:100%">
            <div style="margin-top:10px; margin-bottom:10px;">
                <center>
                    <table style="border:1; width:80%; text-align:center;">
                        <tr>
                            <th>
                                <?= Html::a('<i class="fa-solid fa-house" style="color:#0B0B45; font-size: 1.4em; "></i>', ['/site/overview']); ?>
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
                            <td>Overview</td>
                            <td>Calendar</td>
                            <td>Limits</td>
                            <td>Analyze</td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
        <center>
            <div style="margin-top: 15px; margin-bottom:10px;">
                <?= Html::a('Finance', ['/site/bar'], ['class' => 'btn btn-info border font']); ?>
                <?= Html::a('Saving', ['/site/line'], ['class' => 'btn btn-light border font']); ?>
                <?= Html::a('Percentage', ['/site/pie'], ['class' => 'btn btn-light border font']); ?>
                <?= Html::a('Calculator', ['/site/calculator'], ['class' => 'btn btn-light border font']); ?>
            </div>
        </center>

    </div>

    <!-- chart income      -->
    <div style="margin-top:15px; margin-bottom:20px;">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php 
        $type_i = Incomes::find()->where(["create_by"=>(String)Yii::$app->user->identity->id])->all();
        $type_label_i = [];
        foreach ($type_i as $i) {
            $type_label_i[] = $i->income_type;
        }
        $label_i = json_encode($type_label_i);

        $type_data_i = [];
        foreach ($type_i as $i) {
            $type_data_i[] = $i->amount;
        }
        $data_i = json_encode($type_data_i);
    ?>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {

            type: 'bar',
            data: {
                labels: JSON.parse('<?= $label_i; ?>'),
                datasets: [{
                        label: 'Incomes',
                        data: JSON.parse('<?= $data_i; ?>'),
                        borderWidth: 1
                    }

                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <div>
        <canvas id="myChart1"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php 
        $type = Expenses::find()->where(["create_by"=>(String)Yii::$app->user->identity->id])->all();
        $type_label = [];
        foreach ($type as $v) {
            $type_label[] = $v->expense_type;
        }
        $label = json_encode($type_label);

        $type_data = [];
        foreach ($type as $v) {
            $type_data[] = $v->amount;
        }
        $data = json_encode($type_data);
    ?>

    <script>
        const ctx1 = document.getElementById('myChart1');

        new Chart(ctx1, {

            type: 'bar',
            data: {
                labels: JSON.parse('<?= $label; ?>'),
                datasets: [{
                        label: 'Expenses',
                        data: JSON.parse('<?= $data; ?>'),
                        borderWidth: 1
                    }

                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>