<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_photos}}`.
 */
class m240621_185418_create_order_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_photos}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull()->comment('ID заказа'),
            'order_photo_size' => $this->integer()->notNull()->comment('Размер фотографии'),
            'order_count' => $this->integer()->notNull()->comment('Количество, шт.'),

            'kind' => $this->string()->notNull()->comment('Вид файла'),
            'name' => $this->string(255)->comment('Название файла'),
            'hash' => $this->string(32)->comment('Хэш'),
            'size' => $this->bigInteger()->comment('Размер'),
            'type' => $this->string(10)->comment('Расширение файла'),

            'created_at' => $this->dateTime()->defaultExpression('NOW()')->comment('Дата и время добавления'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_photos}}');
    }
}
