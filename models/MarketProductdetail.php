<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_productdetail".
 *
 * @property string $id
 * @property string $code
 * @property string $idproduct
 * @property string $variant1
 * @property string $variant2
 * @property string $variant3
 * @property string $variant4
 * @property string $city
 * @property string $idsupplier
 * @property string $minorder
 * @property string $stock
 * @property string $weight
 * @property string $weightunit
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $active
 *
 * @property MarketHistorystock[] $marketHistorystocks
 * @property MarketCitysupplier $city0
 * @property MarketProduct $idproduct0
 * @property MarketSupplier $idsupplier0
 * @property MarketProducthistprice[] $marketProducthistprices
 * @property MarketProductprice[] $marketProductprices
 */
class MarketProductdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market_productdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'idproduct', 'variant1', 'variant2', 'variant3', 'variant4', 'city', 'weight', 'weightunit', 'created_at', 'updated_at'], 'required'],
            [['minorder', 'stock', 'active'], 'integer'],
            [['weight'], 'number'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id', 'idproduct', 'city'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 16],
            [['variant1', 'variant2', 'variant3', 'variant4'], 'string', 'max' => 50],
            [['idsupplier'], 'string', 'max' => 4],
            [['weightunit'], 'string', 'max' => 10],
            [['city'], 'exist', 'skipOnError' => true, 'targetClass' => MarketCitysupplier::className(), 'targetAttribute' => ['city' => 'city']],
            [['idproduct'], 'exist', 'skipOnError' => true, 'targetClass' => MarketProduct::className(), 'targetAttribute' => ['idproduct' => 'id']],
            [['idsupplier'], 'exist', 'skipOnError' => true, 'targetClass' => MarketSupplier::className(), 'targetAttribute' => ['idsupplier' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'idproduct' => 'Idproduct',
            'variant1' => 'Variant1',
            'variant2' => 'Variant2',
            'variant3' => 'Variant3',
            'variant4' => 'Variant4',
            'city' => 'City',
            'idsupplier' => 'Idsupplier',
            'minorder' => 'Minorder',
            'stock' => 'Stock',
            'weight' => 'Weight',
            'weightunit' => 'Weightunit',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketHistorystocks()
    {
        return $this->hasMany(MarketHistorystock::className(), ['idproductdetail' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity0()
    {
        return $this->hasOne(MarketCitysupplier::className(), ['city' => 'city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduct0()
    {
        return $this->hasOne(MarketProduct::className(), ['id' => 'idproduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsupplier0()
    {
        return $this->hasOne(MarketSupplier::className(), ['id' => 'idsupplier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProducthistprices()
    {
        return $this->hasMany(MarketProducthistprice::className(), ['idproductdetail' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProductprices()
    {
        return $this->hasMany(MarketProductprice::className(), ['idproductdetail' => 'id']);
    }
}
