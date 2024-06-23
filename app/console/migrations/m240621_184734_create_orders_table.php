<?php

use yii\db\Migration;

/**
 * Миграция создает таблицу для хранения заказов
 */
class m240621_184734_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'public_number' => $this->string(36)->notNull()->comment('Публичный номер заказа'),
            'status' => $this->integer()->notNull()->defaultValue(0)->comment('Статус заказа'),
            'amount' => $this->decimal(11, 2)->defaultValue(0.0)->notNull()->comment('Сумма заказа'),
            'created_at' => $this->dateTime()->defaultExpression('NOW()')->notNull()->comment('Дата и время создания'),
            'completion_at' => $this->dateTime()->null()->comment('Дата и время завершения заказа'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('orders');
    }
}
