<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => 'Пользователь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><b><?= Html::encode($this->title) ?></b></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
