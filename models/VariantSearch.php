<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Variant;

/**
 * VariantSearch represents the model behind the search form of `app\models\Variant`.
 */
class VariantSearch extends Variant
{

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'product_category',
                    'price',
                    'created_by_id',
                    'state_id'
                ],
                'integer'
            ],
            [
                [
                    'title',
                    'image',
                    'color',
                    'size',
                    'created_on'
                ],
                'safe'
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
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
        $query = Variant::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (! $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_category' => $this->product_category,
            'price' => $this->price,
            'created_by_id' => $this->created_by_id,
            'state_id' => $this->state_id,
            'created_on' => $this->created_on
        ]);

        $query->andFilterWhere([
            'like',
            'title',
            $this->title
        ])
            ->andFilterWhere([
            'like',
            'image',
            $this->image
        ])
            ->andFilterWhere([
            'like',
            'color',
            $this->color
        ])
            ->andFilterWhere([
            'like',
            'size',
            $this->size
        ]);

        return $dataProvider;
    }
}
