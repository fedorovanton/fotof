<?php

use frontend\models\OrderPhotos;
use frontend\models\Orders;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var Orders $order */
/** @var ActiveForm $form */

$h1 = 'Параметры печати для заказа: ' . $order->public_number;
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;
?>
<div class="site-contact">
    <h1><?= $h1 ?></h1>

    <div class="row">
        <div class="col-4">
            <table class="table table->bordered table-sm">
                <tr>
                    <th>Размер</th>
                    <th>Цена</th>
                </tr>
                <?php foreach (OrderPhotos::getCombinedPhotoSizesAndPrices() as $sizeName => $sizePrice) { ?>
                    <tr>
                        <td><?= $sizeName ?></td>
                        <td><?= $sizePrice . ' руб.' ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Фотография</th>
            <th>Размер</th>
            <th>Количество</th>
        </tr>
        <?php foreach ($order->orderPhotos as $orderPhoto) { ?>
            <tr>
                <td>
                    <?= Html::img($orderPhoto->getPhotoUrl()) ?>
                    <?= $form->field($model, 'ids[]')->hiddenInput(['value' => $orderPhoto->id])->label(false) ?>
                </td>
                <td><?= $form->field($model, 'sizes[]')->dropDownList(OrderPhotos::getOrderPhotoSizes())->label('Размер фотографии') ?></td>
                <td><?= $form->field($model, 'counts[]')->input('number', ['value' => 1])->label('Количество') ?></td>
            </tr>

        <?php } ?>
    </table>

    <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
