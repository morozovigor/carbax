<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "product_img".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $img
 * @property integer $cover
 * @property integer $user_id
 */
class ProductImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'img', 'cover'], 'required'],
            [['product_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['cover', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'img' => 'Img',
            'cover' => 'Cover',
        ];
    }
}
