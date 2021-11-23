<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "signup".
 *
 * @property int $id
 * @property string $name
 * @property int $contact_no
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $adress
 * @property int|null $state_id
 * @property string|null $created_on
 * @property int|null $created_by_id
 * @property int|null $type_id
 * @property string|null $authkey
 *
 * @property Category[] $categories
 * @property Product[] $products
 * @property Variant[] $variants
 */
class Signup extends \yii\db\ActiveRecord
{

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'signup';
    }

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'name',
                    'contact_no',
                    'username',
                    'password',
                    'email',
                    'adress'
                ],
                'required'
            ],
            [
                [
                    'contact_no',
                    'state_id',
                    'created_by_id',
                    'type_id'
                ],
                'integer'
            ],
            [
                [
                    'created_on'
                ],
                'safe'
            ],
            [
                [
                    'name',
                    'username',
                    'password',
                    'email',
                    'adress',
                    'authkey'
                ],
                'string',
                'max' => 255
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'contact_no' => 'Contact No',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'adress' => 'Adress',
            'state_id' => 'State ID',
            'created_on' => 'Created On',
            'created_by_id' => 'Created By ID',
            'type_id' => 'Type ID',
            'authkey' => 'Authkey'
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), [
            'created_by_id' => 'id'
        ]);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), [
            'created_by_id' => 'id'
        ]);
    }

    /**
     * Gets query for [[Variants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariants()
    {
        return $this->hasMany(Variant::className(), [
            'created_by_id' => 'id'
        ]);
    }
}
