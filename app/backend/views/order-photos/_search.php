<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderPhotos\OrderPhotosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-photos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'order_photo_size') ?>

    <?= $form->field($model, 'order_count') ?>

    <?= $form->field($model, 'kind') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'hash') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
