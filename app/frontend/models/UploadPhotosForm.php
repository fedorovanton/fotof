<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadPhotosForm extends Model
{
    public string $orderPublicNumber;

    /**
     * @var UploadedFile[]
     */
    public $photos;

    public function rules()
    {
        return [
            [['photos'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $order = $this->craeteOrder();
            $this->orderPublicNumber = $order->public_number;

            foreach ($this->photos as $file) {
                $uploadDir = $this->getUploadDir($order);

                $hash = Yii::$app->security->generateRandomString(10);
                $filename = $hash . '.' . $file->extension;
                $filePath = $uploadDir . '/' . $filename;

                if ($file->saveAs($filePath)) {
                    $orderPhoto = new OrderPhotos();
                    $orderPhoto->order_id = $order->id;
                    $orderPhoto->order_photo_size = OrderPhotos::PHOTO_SIZE_10_15;
                    $orderPhoto->order_count = 0;
                    $orderPhoto->kind = 'order_photos';
                    $orderPhoto->name = $file->name;
                    $orderPhoto->hash = $hash;
                    $orderPhoto->size = $file->size;
                    $orderPhoto->type = $file->extension;
                    $orderPhoto->save();
                } else {
                    // не загрузился
                }
            }

            return true;
        } else {
            return false;
        }
    }

    private function craeteOrder(): Orders
    {
        $order = new Orders();
        $order->public_number = Yii::$app->security->generateRandomString(10);
        $order->created_at = date('Y-m-d H:i:s');
        $order->status = Orders::STATUS_NEW;
        $order->amount = 0;
        $order->save();

        return $order;
    }

    private function getUploadDir(Orders $order): string
    {
        $uploadDir = Yii::getAlias('@webroot/uploads/order_photos/' . $order->id);

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        return $uploadDir;
    }
}
