<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_citysupplier".
 *
 * @property string $city
 * @property integer $active
 *
 * @property MarketProductdetail[] $marketProductdetails
 */
class MarketCitysupplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market_citysupplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city'], 'required'],
            [['active'], 'integer'],
            [['city'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city' => 'City',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProductdetails()
    {
        return $this->hasMany(MarketProductdetail::className(), ['city' => 'city']);
    }
}
