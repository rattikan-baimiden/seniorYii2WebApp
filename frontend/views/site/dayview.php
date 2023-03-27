<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Dayview';
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    }

    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
    padding: 2px 16px;
    }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
    
</head>
<body style = "background-color: white">
    <p style = "color: #020035;" > <?= Html::a('Back', ['/site/calendar']); ?></p>
    <center>
    <br>
    <div class="card" style="width: 100%;" >
        <div class="container">
            <h4 class="card-title" ><b>Income List</b></h4> 
            <p>Salary 100$</p>
        </div>
    </div>
    <br>
    <div class="card" style="width: 100%;" >
        <div class="container">
            <h4 class="card-title" ><b>Expense List</b></h4> 
            <p>Foods 100$</p>
        </div>
    </div>
    <br>
    </center>
</body>
</html>
