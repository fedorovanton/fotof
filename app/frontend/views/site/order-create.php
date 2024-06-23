<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$h1 = 'Оформить печать';
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;
?>
<div class="site-create-order">
    <h1><?= $h1 ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true])->label('Фотографии') ?>

    <?= Html::submitButton('Отправить фотографии', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>
</div>
