<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class OrderPhotoPrintOptionsForm extends Model
{
    public $ids;
    public $sizes;
    public $counts;

    public function rules()
    {
        return [
            [['ids', 'sizes', 'counts'], 'safe'],
        ];
    }

    public function save(): bool
    {
        $amount = 0;

        foreach ($this->ids as $index => $orderPhotoId) {
            $orderPhoto = OrderPhotos::findOne(['id' => $orderPhotoId]);
            $orderPhoto->order_photo_size = $this->sizes[$index];
            $orderPhoto->order_count = $this->counts[$index];
            $orderPhoto->save();

            $pricePhoto = OrderPhotos::getPricePhotoBySizePhoto($orderPhoto->order_photo_size);
            $amount += $orderPhoto->order_count * $pricePhoto;
        }

        $orderPhoto->order->amount = $amount;
        $orderPhoto->order->save();

        return true;
    }

    // private function craeteOrder(): Orders
    // {
    //     $order = new Orders();
    //     $order->public_number = Yii::$app->security->generateRandomString(10);
    //     $order->created_at = date('Y-m-d H:i:s');
    //     $order->status = Orders::STATUS_NEW;
    //     $order->amount = 0;
    //     $order->save();

    //     return $order;
    // }

    // private function getUploadDir(Orders $order): string
    // {
    //     $uploadDir = Yii::getAlias('@webroot/uploads/order_photos/' . $order->id);

    //     if (!is_dir($uploadDir)) {
    //         mkdir($uploadDir, 0777, true);
    //     }

    //     return $uploadDir;
    // }
}
