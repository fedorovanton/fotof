<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Orders\Orders $model */

$h1 = 'Просмотр заказа: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $h1;
$this->title = $h1 . ' | ' . Yii::$app->name;

\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

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
            'public_number',
            'status',
            'amount',
            'created_at',
            'completion_at',
        ],
    ]) ?>

</div>
