<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Calendar';
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Fullcalendar Get Event Date On Click Example Using Jquery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css" />
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

        .cartTotal {
            width: 150px;
            height: 560;
            border-radius: 10px;
            text-align: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/c3c7a2a31a.js" crossorigin="anonymous"></script>
</head>


<body style="background-color: #f8f9fa; font-size: 14px;">
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
                            <?= Html::a('<i class="fa-regular fa-calendar" style="color:#0B0B45; font-size: 1.4em;"></i>', ['/site/calendar']); ?>
                        </th>
                        <th>
                            <?= Html::a('<i class="fa-solid fa-money-check" style="color:#0B0B45; font-size: 1.4em;"></i>', ['/site/limit']); ?>
                        </th>
                        <th>
                            <?= Html::a('<i class="fa-solid fa-chart-simple" style="color:#0B0B45; font-size: 1.4em;"></i>', ['/site/bar']); ?>
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
    <div class="container" style="margin-top: 30px; margin-bottom: 40px;">
        <div class="row">
            <div class="col-md-12 text-center">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js"></script>
<script src="https://fullcalendar.io/assets/demo-to-codepen.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            selectable: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            dateClick: function(info) {
                document.location.href = 'http://localhost/yii2webApp/frontend/web/index.php?r=site%2Fincome';
            },
            select: function(info) {
                alert('selected ' + info.startStr);
            }
        });

        calendar.render();
    });
</script>
<div class=" card" style="width: 100%; margin-top:0px;">
    <div class="container">
        <div style="margin-left: 280px;">
            <?= Html::a('<i class="fa fa-chevron-right" style="margin-top:10px;"></i>', ['/site/income']); ?>
        </div>
        <p style="text-align: center; margin-bottom:0px;">Views more</p>
        <br>
    </div>
</div>

</html>