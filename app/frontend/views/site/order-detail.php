<?php

use frontend\models\Orders;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var Orders $order */
/** @var ActiveForm $form */

$h1 = 'Мой заказ: ' . $order->public_number;
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;
?>
<div class="site-contact">
    <h1><?= $h1 ?></h1>

    <div class="row">
        <div class="col-4">
            <table class="table table->bordered table-sm">
                <tr>
                    <th>Стоимость заказа</th>
                    <th>Статус заказа</th>
                    <th>Дата создания</th>
                    <th>Дата исполнения</th>
                </tr>
                <tr>
                    <td><?= $order->getStatusValue() ?></td>
                    <td><?= $order->amount ?>  руб.</td>
                    <td><?= $order->created_at ?></td>
                    <td><?= $order->completion_at ?></td>
                </tr>
            </table>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Фотография</th>
            <th>Размер</th>
            <th>Количество</th>
            <th>Цена</th>
        </tr>
        <?php foreach ($order->orderPhotos as $orderPhoto) { ?>
            <tr>
                <td><?= Html::img($orderPhoto->getPhotoUrl()) ?></td>
                <td><?= $orderPhoto->getOrderPhotoSizeValue() ?></td>
                <td><?= $orderPhoto->order_count ?></td>
                <td><?= $orderPhoto->getPrice() ?> руб.</td>
            </tr>
        <?php } ?>
    </table>
</div>
