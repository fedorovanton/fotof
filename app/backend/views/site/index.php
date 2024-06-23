<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */

$this->title = 'Главная | ' . Yii::$app->name;
?>
<div class="site-index">

<div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Фотосалон "ФотоФ"</h1>
            <p class="fs-5 fw-light">Добро пожаловать в панель управления</p>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Управление заказами</h2>

                <p>
                    <?= Html::a('Ссылка &raquo;', ['orders/index'], ['class' => 'btn btn-outline-secondary'])?>
                </p>
            </div>

            <div class="col-lg-4">
                <h2>Управление фотографиями в заказах</h2>

                <p>
                    <?= Html::a('Ссылка &raquo;', ['order-photos/index'], ['class' => 'btn btn-outline-secondary'])?>
                </p>
            </div>
        </div>

    </div>
</div>
