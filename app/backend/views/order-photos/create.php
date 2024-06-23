<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderPhotos\OrderPhotos $model */

$this->title = 'Create Order Photos';
$this->params['breadcrumbs'][] = ['label' => 'Order Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
