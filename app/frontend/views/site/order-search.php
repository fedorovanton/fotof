<?php

use frontend\models\SearchOrderForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var SearchOrderForm $model */
/** @var ActiveForm $form */

$h1 = 'Найти заказ';
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;
?>
<div class="site-contact">
    <h1><?= $h1 ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <td><?= $form->field($model, 'publicNumber')->textInput()->label('Номер заказа') ?></td>

    <?= Html::submitButton('Найти заказ', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
