<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PetRequests $model */

$this->title = 'Создание заявления';
$this->params['breadcrumbs'][] = ['label' => 'Заявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pet-requests-create">

    <h1><b><?= Html::encode($this->title) ?></b></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
