<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property integer $id
 * @property string $title
 * @property string $img_url
 * @property string $description
 * @property integer $new_price
 * @property integer $old_price
 * @property string $discount
 * @property string $region_id
 * @property string $city_id
 * @property integer $dt_add
 * @property string $service_type_id
 * @property integer $user_id
 * @property $address_selected
 * @property $dt_start
 * @property $dt_end
 * @property integer $status
 * @property string $service_id_str
 * @property string $circs
 *
 * @property Services $service
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['service_id', 'new_price', 'old_price',  'dt_add'], 'integer'],
            [['description','dt_start','dt_end'], 'string'],
            [['title', 'img_url', 'discount','service_id_str','address_selected','service_type_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'service_id' => 'Сервис',
            'img_url' => 'Изображение',
            'description' => 'Описание',
            'short_description' => 'Короткое описание',
            'new_price' => 'Новая цена, руб',
            'old_price' => 'Старая цена, руб',
            'discount' => 'Скидка, %',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'dt_add' => 'Dt Add',
            'circs' => 'Условия:'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
