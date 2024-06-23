<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Orders\Orders $model */

$h1 = 'Изменить заказ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
$this->title = $h1 . ' | ' . Yii::$app->name;
?>
<div class="orders-update">

    <h1><?= Html::encode($h1) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
