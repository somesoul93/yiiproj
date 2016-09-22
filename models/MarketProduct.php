<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_product".
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $variant1
 * @property string $variant2
 * @property string $variant3
 * @property string $variant4
 * @property string $image
 * @property string $condt
 * @property string $minorder
 * @property string $stock
 * @property string $sold
 * @property string $description
 * @property string $visit
 * @property string $top
 * @property string $created_at
 * @property string $updated_at
 * @property integer $active
 *
 * @property MarketCategoryProduct[] $marketCategoryProducts
 * @property MarketCategory[] $idcategories
 * @property MarketProductdetail[] $marketProductdetails
 * @property MarketProductimage[] $marketProductimages
 */
class MarketProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name', 'variant1', 'variant2', 'variant3', 'variant4', 'image', 'condt', 'description', 'created_at', 'updated_at'], 'required'],
            [['minorder', 'stock', 'sold', 'visit', 'active'], 'integer'],
            [['description'], 'string'],
            [['top'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['id'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 100],
            [['variant1', 'variant2', 'variant3', 'variant4'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 255],
            [['condt'], 'string', 'max' => 10],
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
            'name' => 'Name',
            'variant1' => 'Variant1',
            'variant2' => 'Variant2',
            'variant3' => 'Variant3',
            'variant4' => 'Variant4',
            'image' => 'Image',
            'condt' => 'Condt',
            'minorder' => 'Minorder',
            'stock' => 'Stock',
            'sold' => 'Sold',
            'description' => 'Description',
            'visit' => 'Visit',
            'top' => 'Top',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketCategoryProducts()
    {
        return $this->hasMany(MarketCategoryProduct::className(), ['idproduct' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategories()
    {
        return $this->hasMany(MarketCategory::className(), ['id' => 'idcategory'])->viaTable('market_category_product', ['idproduct' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProductdetails()
    {
        return $this->hasMany(MarketProductdetail::className(), ['idproduct' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProductimages()
    {
        return $this->hasMany(MarketProductimage::className(), ['idproduct' => 'id']);
    }
}
