<?php

use app\models\PetRequests;
use app\models\Status;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Dropdown;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PetRequestsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявление';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pet-requests-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'admin_message:ntext',
            'missing_date',
            'user_id',
            'status_id',
            [
                'attribute'=>'status',
                'content'=> function($petRequest) {
                    $html = Html::beginForm(['update','id'=>$petRequest->id]);
                    if ($petRequest->status_id === Status::status_1) {

                        $html .= Html::activeDropDownList($petRequest, 'status_id',
                            [
                                2 =>'Принята',
                                3 =>'Отклонена'
                            ],
        
                            [
                                'prompt' => [
                                    'text' => 'В обработке',
                                    'options' => [
                                        'style' => 'display:none'
                                    ]
                                ]
                            ]
                        );

                        $html .= Html::submitButton('Подтвердить', ['class' => 'btn btn-link']);
                        $html .= Html::endForm();
                        return $html;
                    } elseif ($petRequest->status_id === Status::status_2) {

                        $html .= Html::activeDropDownList($petRequest, 'status_id',
                            [
                                4 =>'Найден',
                                5 =>'Не найден'
                            ],
        
                            [
                                'prompt' => [
                                    'text' => 'Принята',
                                    'options' => [
                                        'style' => 'display:none'
                                    ]
                                ]
                            ]
                        );

                        $html .= Html::submitButton('Подтвердить', ['class' => 'btn btn-link']);
                        $html .= Html::endForm();
                        return $html;
                    }
                }
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
