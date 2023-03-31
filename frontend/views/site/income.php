<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Income';
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            width: 40%;
            margin: 2rem auto;
            height: 560;
            border-radius: 30px;
            margin-top: 10px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: white">
    <center>
        <h1 style="margin-top: 20px; margin-bottom: 30px;">Username</h1>
        <div style="color: #020035">
            <?= Html::a('Overview', ['/site/overview'], ['class' => 'btn btn-primary']); ?>
            <?= Html::a('Calendar', ['/site/calendar'], ['class' => 'btn btn-light']); ?>
            <?= Html::a('Limit', ['/site/limit'], ['class' => 'btn btn-light']); ?>
            <?= Html::a('Analyze', ['/site/bar'], ['class' => 'btn btn-light']); ?>
        </div>
        <div style="margin-top: 15px;">
            <?= Html::a('Income', ['/site/income'], ['class' => 'btn btn-info']); ?>
            <?= Html::a('Expense', ['/site/expense'], ['class' => 'btn btn-light']); ?>
        </div>
        <br>
        <div class="card" style="width: 100%; ">
            <div class="container">
                <div style="margin-right: 300px; margin-top: 10px;">
                    <?= Html::a('<i class="fa fa-chevron-left"></i>', ['/site/overview']); ?>
                </div>
                <h4 class="card-title"><b>Income List</b></h4>
                <p>Salary 100$</p>
            </div>
        </div>
    </center>


</body>

</html>