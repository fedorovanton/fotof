<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

$h1 = 'Контакты';
$this->title = $h1 . ' | ' . Yii::$app->name;
$this->params['breadcrumbs'][] = $h1;
?>
<div class="site-contact">
    <h1><?= $h1 ?></h1>

    <p><strong>Телефон:</strong> <a href="tel:+79102752820">8-910-275-28-20</a></p>
    <p><strong>E-mail:</strong> <a href="mailto:foto_f_13@mail.ru">foto_f_13@mail.ru</a></p>
    <p><strong>ВКонтакте:</strong> <a href="https://vk.com/fotof46">https://vk.com/fotof46</a></p>

    <h3>График работы:</h3>
    <p>
        <strong>понедельник-пятница:</strong> 9:00-19:00<br>
        <strong>суббота, воскресение:</strong> выходной<br>
        Без перерыва
    </p>

    <h3>Адрес:</h3>
    <p>
        <strong>Курская область, г. Железногорск, улица Димитрова, д. 14</strong>
    </p>

    <p>
        Если у вас есть вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами. Спасибо.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Имя') ?>

                <?= $form->field($model, 'email')->label('Email') ?>

                <?= $form->field($model, 'subject')->label('Тема письма') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Текст письма') ?>

                <?= $form->field($model, 'verifyCode')->widget(
                    Captcha::class,
                    ['template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>']
                )->label('Проверочный код') ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
