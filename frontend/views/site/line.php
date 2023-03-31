<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Line';
?>

<center>
    <h1 style="margin-top: 20px; margin-bottom: 30px;">Username</h1>
    <div style="color: #020035">
        <?= Html::a('Overview', ['/site/overview'], ['class' => 'btn btn-light']); ?>
        <?= Html::a('Calendar', ['/site/calendar'], ['class' => 'btn btn-light']); ?>
        <?= Html::a('Limit', ['/site/limit'], ['class' => 'btn btn-light']); ?>
        <?= Html::a('Analyze', ['/site/bar'], ['class' => 'btn btn-primary']); ?>
    </div>

    <div style="margin-top: 15px; margin-bottom: 40px;">
        <?= Html::a('Total of each', ['/site/bar'], ['class' => 'btn btn-light']); ?>
        <?= Html::a('Saving', ['/site/line'], ['class' => 'btn btn-info']); ?>
        <?= Html::a('Pie', ['/site/pie'], ['class' => 'btn btn-light']); ?>
        <?= Html::a('Calculator', ['/site/calculator'], ['class' => 'btn btn-light']); ?>
    </div>
</center>

<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['week 1', 'week 2', 'week 3', 'week 4', 'week 5', 'week 6'],
            datasets: [{
                    label: '# Goal',
                    data: [20, 20, 20, 20, 20, 20],
                    borderWidth: 1
                },
                {
                    label: '# Saving',
                    data: [5, 10, 13, 14, 15, 18],
                    borderWidth: 1
                }
            ],

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