<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Bossy Money';
?>
<!DOCTYPE html>
<head>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
</head>
<body style = "background-color: white">
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4" style = "color: #020035; font-size: 70px;" >WELCOME TO BOSSY MONEY</h1>
        <span style="font-size: 15em; color: #020035;">
            <i class="fa-solid fa-hand-holding-dollar fa-flip" style="--fa-animation-duration: 3s;" ></i>
        </span>

        <p style = "color: #020035;" >New user? Start here. <?= Html::a('Register', ['/site/signup']); ?></p>   
    </div>
    <div class="body-content">

    
    </div>
</div>
</body>
</html>
