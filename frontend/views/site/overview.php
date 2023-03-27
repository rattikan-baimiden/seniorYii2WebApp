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
    <center>
    <h1>Username</h1>
    <div style = "color: #020035">   
        <?= Html::a('Overview', ['/site/overview'], ['class' => 'btn btn-info']); ?>  
        <?= Html::a('Calendar', ['/site/calendar'], ['class' => 'btn btn-info']); ?>
    </div>
    <br>
    <div class="card" style="width: 100%;" >
        <div class="container">
        <h4 class="card-title" ><b>Balance</b></h4> 
        <h2>100$</h2>
        <table>
            <tr>
                <th>
                    <div class="btn" style = "background-color: #020035; color:white;">
                        <h5><b>Amount Income</b></h5> 
                        <p>200$</p>
                    </div>      
                </th>
                <th>
                    <div class="btn" style = "background-color: #020035; color:white;">
                        <h5><b>Amount Expenses</b></h5> 
                        <p>200$</p>
                    </div>    
                </th>
            </tr>

        </table>
        </div>
    </div>
    <br>
    <h4><b>Recently</b></h4>
    <div class="card" style="width: 100%;" >
        <div class="container">
        <h4 class="card-title" ><b>List</b></h4> 
        </div>
    </div>
    </center>
</body>
</html>
