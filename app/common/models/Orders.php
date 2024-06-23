<?php

namespace common\models;

use common\models\base\Orders as BaseOrders;
use yii\helpers\ArrayHelper;

/**
 * @property OrderPhotos[] $orderPhotos
 */
class Orders extends BaseOrders
{
    public function getOrderPhotos()
    {
        return $this->hasMany(OrderPhotos::class, ['order_id' => 'id']);
    }

    public static function getStatusList(): array
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_IN_PROCESSING => 'В обработке',
            self::STATUS_COMPLETED => 'Выполнен',
        ];
    }

    public function getStatusValue(): string
    {
        return ArrayHelper::getValue(self::getStatusList(), $this->status);
    }
}
