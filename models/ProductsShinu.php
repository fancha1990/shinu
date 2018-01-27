<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_shinu".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $price
 * @property integer $category_id
 * @property integer $in_stock
 * @property integer $product_code
 * @property string $description
 * @property string $reviews
 * @property string $manufacturer
 * @property string $seasonality
 * @property string $type_of_car
 * @property integer $width
 * @property integer $height
 * @property string $diameter
 * @property string $index_of_payload
 * @property string $index_of_speed
 * @property string $studded
 * @property string $url
 */
class ProductsShinu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_shinu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'price', 'category_id', 'in_stock', 'product_code', 'description', 'reviews', 'manufacturer', 'seasonality', 'type_of_car', 'width', 'height', 'diameter', 'index_of_payload', 'index_of_speed', 'studded', 'url'], 'required'],
            [['price', 'category_id', 'in_stock', 'product_code', 'width', 'height'], 'integer'],
            [['name', 'img', 'description', 'reviews', 'manufacturer', 'seasonality', 'type_of_car', 'diameter', 'index_of_payload', 'index_of_speed', 'studded', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'in_stock' => 'In Stock',
            'product_code' => 'Product Code',
            'description' => 'Description',
            'reviews' => 'Reviews',
            'manufacturer' => 'Manufacturer',
            'seasonality' => 'Seasonality',
            'type_of_car' => 'Type Of Car',
            'width' => 'Width',
            'height' => 'Height',
            'diameter' => 'Diameter',
            'index_of_payload' => 'Index Of Payload',
            'index_of_speed' => 'Index Of Speed',
            'studded' => 'Studded',
            'url' => 'Url',
        ];
    }
}
