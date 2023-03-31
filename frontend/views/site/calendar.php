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
</head>


<body>
    <center>
        <h1 style="margin-top: 20px; margin-bottom: 30px;">Username</h1>
        <div style="color: #020035">
            <?= Html::a('Overview', ['/site/overview'], ['class' => 'btn btn-light']); ?>
            <?= Html::a('Calendar', ['/site/calendar'], ['class' => 'btn btn-primary']); ?>
            <?= Html::a('Limit', ['/site/limit'], ['class' => 'btn btn-light']); ?>
            <?= Html::a('Analyze', ['/site/bar'], ['class' => 'btn btn-light']); ?>
        </div>
    </center>
    <div class="container" style="margin-top: 15px; margin-bottom: 40px;">
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
            eventClick: function(info) {
                var eventObj = info.event;
                if (eventObj.start) {
                    alert('Clicked' + eventObj.start);
                }
            }
        });
        calendar.render();
    });
</script>

</html>