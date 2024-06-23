<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\OrderPhotos\OrderPhotos $model */

$h1 = 'Просмотр фотографии заказа: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Фотографии заказа', 'url' => ['index']];
$this->params['breadcrumbs'][] = $h1;
$this->title = $h1 . ' | ' . Yii::$app->name;

\yii\web\YiiAsset::register($this);
?>
<div class="order-photos-view">

    <h1><?= Html::encode($h1) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_id',
            'order_photo_size',
            'order_count',
            'kind',
            'name',
            'hash',
            'size',
            'type',
            'created_at',
        ],
    ]) ?>

</div>
