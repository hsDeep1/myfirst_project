<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Signup;

/**
 * SignupSearch represents the model behind the search form of `app\models\Signup`.
 */
class SignupSearch extends Signup
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
                    'contact_no',
                    'state_id',
                    'created_by_id',
                    'type_id'
                ],
                'integer'
            ],
            [
                [
                    'name',
                    'username',
                    'password',
                    'email',
                    'adress',
                    'created_on',
                    'authkey'
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
        $query = Signup::find();

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
            'contact_no' => $this->contact_no,
            'state_id' => $this->state_id,
            'created_on' => $this->created_on,
            'created_by_id' => $this->created_by_id,
            'type_id' => $this->type_id
        ]);

        $query->andFilterWhere([
            'like',
            'name',
            $this->name
        ])
            ->andFilterWhere([
            'like',
            'username',
            $this->username
        ])
            ->andFilterWhere([
            'like',
            'password',
            $this->password
        ])
            ->andFilterWhere([
            'like',
            'email',
            $this->email
        ])
            ->andFilterWhere([
            'like',
            'adress',
            $this->adress
        ])
            ->andFilterWhere([
            'like',
            'authkey',
            $this->authkey
        ]);

        return $dataProvider;
    }
}
