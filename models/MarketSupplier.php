<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "market_supplier".
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $namedisplay
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $logo
 * @property string $info
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property MarketProductdetail[] $marketProductdetails
 */
class MarketSupplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market_supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name', 'namedisplay', 'username', 'password_hash', 'created_at', 'updated_at', 'status'], 'required'],
            [['phone', 'address', 'info'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['id', 'city'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 6],
            [['name', 'email', 'logo', 'username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['namedisplay'], 'string', 'max' => 100],
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
            'namedisplay' => 'Namedisplay',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'city' => 'City',
            'logo' => 'Logo',
            'info' => 'Info',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketProductdetails()
    {
        return $this->hasMany(MarketProductdetail::className(), ['idsupplier' => 'id']);
    }
}
