<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MarketProductdetail;

/**
 * MarketProductdetailSearch represents the model behind the search form about `app\models\MarketProductdetail`.
 */
class MarketProductdetailSearch extends MarketProductdetail
{   

    public $product;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'idproduct', 'variant1', 'variant2', 'variant3', 'variant4', 'city', 'idsupplier', 'weightunit', 'description', 'created_at', 'updated_at','product'], 'safe'],
            [['minorder', 'stock', 'active'], 'integer'],
            [['weight'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MarketProductdetail::find();

        // add conditions that should always apply here
        $query->joinWith(['product']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Important: here is how we set up the sorting
        // The key is the attribute name on our "MarketProductdetailSearch" instance
        $dataProvider->sort->attributes['product'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['market_product.name' => SORT_ASC],
            'desc' => ['market_product.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'minorder' => $this->minorder,
            'stock' => $this->stock,
            'weight' => $this->weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'idproduct', $this->idproduct])
            ->andFilterWhere(['like', 'variant1', $this->variant1])
            ->andFilterWhere(['like', 'variant2', $this->variant2])
            ->andFilterWhere(['like', 'variant3', $this->variant3])
            ->andFilterWhere(['like', 'variant4', $this->variant4])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'idsupplier', $this->idsupplier])
            ->andFilterWhere(['like', 'weightunit', $this->weightunit])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'market_product.name', $this->product]);

        return $dataProvider;
    }
}
