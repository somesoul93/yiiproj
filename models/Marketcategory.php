<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_category".
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $image
 * @property string $level
 * @property string $parent
 * @property string $orderto
 * @property string $created_at
 * @property string $updated_at
 * @property integer $active
 *
 * @property MarketCategoryProduct[] $marketCategoryProducts
 * @property MarketProduct[] $idproducts
 */
class MarketCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name', 'image', 'level', 'parent', 'orderto', 'created_at', 'updated_at'], 'required'],
            [['level', 'orderto'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['active'], 'integer'],
            [['id', 'parent'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 4],
            [['name', 'image'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
            'image' => 'Image',
            'level' => 'Level',
            'parent' => 'Parent',
            'orderto' => 'Orderto',
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
        return $this->hasMany(MarketCategoryProduct::className(), ['idcategory' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproducts()
    {
        return $this->hasMany(MarketProduct::className(), ['id' => 'idproduct'])->viaTable('market_category_product', ['idcategory' => 'id']);
    }
}
