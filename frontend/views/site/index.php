<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'PFMS';
?>
<!DOCTYPE html>

<head>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Hind+Siliguri:wght@300&family=Nunito&family=Open+Sans&family=Sarabun:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Balsamiq Sans', cursive;
        }
    </style>
</head>

<body style="background-color: white;">
    <div class="site-index">
        <div style="color: #0B0B45; text-align:center;">
            <h1 style="font-size: 35px; margin-top:45px;">WELCOME TO PFMS</h1>
            <p style="font-size: 11px;">(The Application of Personal Financial Management for Student)</p>
            <img src="../assets/pics/logo.jpg" style="width: 350px; height: 250px; margin-top:40px; ">
            <p style=" color: #0ececec; margin-top:90px;">New user? Start here. <?= Html::a('Register', ['/site/signup'], ['class' => 'profile-link']) ?></p>
            
        </div>
        <div class="body-content">


        </div>
    </div>
</body>

</html>