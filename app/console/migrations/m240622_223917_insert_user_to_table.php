<?php

use yii\db\Migration;

/**
 * Вставляет пользователя оператора
 */
class m240622_223917_insert_user_to_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(
            'user',
            [
                'username' => 'operator1',
                'password_hash' => Yii::$app->security->generatePasswordHash('operator1'),
                'auth_key' => Yii::$app->security->generateRandomString(),
                'email' => 'operator1@mail.ru',
                'status' => 10, // ACTIVE
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'operator1']);
    }
}
