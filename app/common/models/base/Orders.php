<?php

namespace common\models\base;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $public_number Публичный номер заказа
 * @property int $status Статус заказа
 * @property float $amount Сумма заказа
 * @property string $created_at Дата и время создания
 * @property string|null $completion_at Дата и время завершения заказа
 */
class Orders extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_IN_PROCESSING = 1;
    const STATUS_COMPLETED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['public_number'], 'required'],
            [['status'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'completion_at'], 'safe'],
            [['public_number'], 'string', 'max' => 36],
            ['status', 'default', 'value' => self::STATUS_NEW],
            ['status', 'in', 'range' => [self::STATUS_NEW, self::STATUS_IN_PROCESSING, self::STATUS_COMPLETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'public_number' => 'Публичный номер заказа',
            'status' => 'Статус заказа',
            'amount' => 'Сумма заказа',
            'created_at' => 'Дата и время создания',
            'completion_at' => 'Дата и время завершения заказа',
        ];
    }
}
