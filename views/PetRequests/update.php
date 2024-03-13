<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PetRequests $model */

$this->title = 'Update Pet Requests: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pet Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pet-requests-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
