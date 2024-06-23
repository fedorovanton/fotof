<?php

use backend\models\OrderPhotos\OrderPhotos;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\OrderPhotos\OrderPhotosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$h1 = 'Фотографии заказа';
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;

?>
<div class="order-photos-index">

    <h1><?= Html::encode($h1) ?></h1>

    <p>
        <?php // echo Html::a('Create Order Photos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'photo' => [
                'label' => 'Фотография',
                'value' => function (OrderPhotos $model) {
                    return Html::img($model->getPhotoUrl(), ['img-thumbnail']);
                },
                'format' => 'raw',
            ],
            'id',
            'order_id' => [
                'attribute' => 'order_id',
                'label' => 'ID заказа',
                'value' => function (OrderPhotos $model) {
                    return Html::a($model->order_id, ['orders/index', 'OrdersSearch[id]' => $model->order_id]);
                },
                'format' => 'raw',
            ],
            'order_photo_size',
            'order_count',
            'price' => [
                'label' => 'Цена',
                'value' => function (OrderPhotos $model) {
                    return $model->getPrice() . ' руб.';
                },
            ],
            'kind',
            'name',
            'hash',
            'size',
            'type',
            'created_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, OrderPhotos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
