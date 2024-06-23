<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "order_photos".
 *
 * @property int $id
 * @property int $order_id ID заказа
 * @property int $order_photo_size Размер фотографии
 * @property int $order_count Количество, шт.
 * @property string $kind Вид файла
 * @property string|null $name Название файла
 * @property string|null $hash Хэш
 * @property int|null $size Размер
 * @property string|null $type Расширение файла
 * @property string|null $created_at Дата и время добавления
 */
class OrderPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'order_photo_size', 'order_count', 'kind'], 'required'],
            [['order_id', 'order_photo_size', 'order_count', 'size'], 'integer'],
            [['created_at'], 'safe'],
            [['kind', 'name'], 'string', 'max' => 255],
            [['hash'], 'string', 'max' => 32],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'ID заказа',
            'order_photo_size' => 'Размер фотографии',
            'order_count' => 'Количество, шт.',
            'kind' => 'Вид файла',
            'name' => 'Название файла',
            'hash' => 'Хэш',
            'size' => 'Размер',
            'type' => 'Расширение файла',
            'created_at' => 'Дата и время добавления',
        ];
    }
}
