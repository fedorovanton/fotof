<?php

namespace common\models;

use Yii;
use common\models\base\OrderPhotos as BaseOrderPhotos;
use yii\helpers\ArrayHelper;

/**
 * @property Order $order
 */
class OrderPhotos extends BaseOrderPhotos
{
    public const PHOTO_SIZE_10_15 = 1;
    public const PHOTO_SIZE_13_18 = 2;
    public const PHOTO_SIZE_15_21 = 3;
    public const PHOTO_SIZE_20_30 = 4;
    public const PHOTO_SIZE_30_40 = 5;

    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['id' => 'order_id']);
    }

    public function getPhotoUrl(): string
    {
        // Путь к папке с фотографиями
        $path = 'http://fotof.local/uploads/' . $this->kind;

        // Путь к папке с заказом
        $path .= '/' . $this->order_id;

        // Название файла
        $path .= '/' . $this->hash . '.' . $this->type;

        return $path;
    }

    public static function getOrderPhotoSizes(): array
    {
        return [
            self::PHOTO_SIZE_10_15 => '10x15 см',
            self::PHOTO_SIZE_13_18 => '13x18 см',
            self::PHOTO_SIZE_15_21 => '15x21 см',
            self::PHOTO_SIZE_20_30 => '20x30 см',
            self::PHOTO_SIZE_30_40 => '30x40 см',
        ];
    }

    public function getOrderPhotoSizeValue(): string
    {
        return ArrayHelper::getValue(self::getOrderPhotoSizes(), $this->order_photo_size);
    }

    public static function getPhotoSizePrices(): array
    {
        return [
            self::PHOTO_SIZE_10_15 => 10,
            self::PHOTO_SIZE_13_18 => 15,
            self::PHOTO_SIZE_15_21 => 20,
            self::PHOTO_SIZE_20_30 => 25,
            self::PHOTO_SIZE_30_40 => 30,
        ];
    }

    public static function getCombinedPhotoSizesAndPrices(): array
    {
        $sizes = self::getOrderPhotoSizes();
        $prices = self::getPhotoSizePrices();

        $combined = [];
        foreach ($sizes as $key => $size) {
            if (isset($prices[$key])) {
                $combined[$size] = $prices[$key];
            }
        }

        return $combined;
    }

    public static function getPricePhotoBySizePhoto(int $sizePhoto): float
    {
        return ArrayHelper::getValue(self::getPhotoSizePrices(), $sizePhoto);
    }

    public function getPrice(): float
    {
        return $this->order_count * self::getPricePhotoBySizePhoto($this->order_photo_size);
    }
}
