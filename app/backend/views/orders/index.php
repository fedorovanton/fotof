<?php

use backend\models\Orders\Orders;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\Orders\OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$h1 = 'Заказы';
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;

?>
<div class="orders-index">

    <h1><?= Html::encode($h1) ?></h1>

    <p>
        <?php // echo Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'public_number',
            'status' => [
                'attribute' => 'status',
                'label' => 'Статус',
                'value' => function (Orders $model) {
                    switch ($model->status) {
                        case Orders::STATUS_NEW:
                            $badge = 'secondary';
                            break;
                        case Orders::STATUS_IN_PROCESSING:
                            $badge = 'warning';
                            break;
                        case Orders::STATUS_COMPLETED:
                            $badge = 'success';
                            break;
                    }

                    return Html::tag('span', $model->getStatusValue(), ['class' => 'badge bg-' . $badge]);
                },
                'format' => 'raw',
            ],
            'amount' => [
                'attribute' => 'amount',
                'label' => 'Цена',
                'value' => function (Orders $model) {
                    return $model->amount . ' руб.';
                },
            ],
            'created_at',
            'complete_order' => [
                'label' => 'Выполнить?',
                'value' => function (Orders $model) {
                    if ($model->status == Orders::STATUS_NEW) {
                        return Html::a('Взять в работу', ['progress-order', 'id' => $model->id], ['class' => 'btn btn-warning']);
                    } elseif ($model->status == Orders::STATUS_IN_PROCESSING) {
                        return Html::a('Выполнить', ['complete-order', 'id' => $model->id], ['class' => 'btn btn-success']);
                    }
                },
                'format' => 'raw',
            ],
            'completion_at',
            'photos' => [
                'label' => 'Фотографии заказа',
                'value' => function (Orders $model) {
                    return Html::a('Список фотографий', ['order-photos/index', 'OrderPhotosSearch[order_id]' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Orders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
