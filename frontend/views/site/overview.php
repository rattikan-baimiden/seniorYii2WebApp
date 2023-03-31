<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Overview';
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
        }

        p {
            margin-top: 0;
            margin-bottom: 0rem;
        }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: white">
    <center>
        <h1 style="margin-top: 20px; margin-bottom: 30px;">Username</h1>
        <div>
            <?= Html::a('Overview', ['/site/overview'], ['class' => 'btn btn-primary']); ?>
            <?= Html::a('Calendar', ['/site/calendar'], ['class' => 'btn btn-light']); ?>
            <?= Html::a('Limit', ['/site/limit'], ['class' => 'btn btn-light']); ?>
            <?= Html::a('Analyze', ['/site/bar'], ['class' => 'btn btn-light']); ?>
        </div>
        <br>
        <div class="card" style="width: 100%; margin-top:2px;">
            <div class="containerB">
                <div style="font-size: 16px; margin-right: 220px; margin-top: 10px;">
                    <p>May 17,2022<br>Balance</p>
                </div>
                <h2 style="margin-top: 0px;">100 ฿</h2>
                <table>
                    <tr>
                        <th>
                            <div class="cartTotal" style="background-color: #020035; color:white; ">
                                <p>Amount Income</p>
                                <p>200 ฿</p>
                            </div>
                        </th>
                        <th>
                            <div style="margin-left: 5px;">
                                <div class="cartTotal" style="background-color: #020035; color:white;">
                                    <p>Amount Expenses</p>
                                    <p>200 ฿</p>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <h4 style="margin-right: 220px;"><b>Recently</b></h4>
        <div class=" card" style="width: 100%; margin-top:7px;">
            <div class="container">
                <div style="margin-left: 280px;">
                    <?= Html::a('<i class="fa fa-chevron-right"></i>', ['/site/income']); ?>
                </div>
            </div>
        </div>
    </center>
</body>

</html>