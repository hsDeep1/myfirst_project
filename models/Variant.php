<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "variant".
 *
 * @property int $id
 * @property int|null $product_category
 * @property string $title
 * @property string $image
 * @property string $color
 * @property string $size
 * @property int $price
 * @property int|null $created_by_id
 * @property int|null $state_id
 * @property string|null $created_on
 *
 * @property Signup $createdBy
 * @property Product $productCategory
 */
class Variant extends \yii\db\ActiveRecord
{

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variant';
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
                    'price'
                ],
                'required'
            ],
            [
                [
                    'created_on'
                ],
                'safe'
            ],
            [
                [
                    'title',
                    'image',
                    'color',
                    'size'
                ],
                'string',
                'max' => 255
            ],
            [
                [
                    'product_category'
                ],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => [
                    'product_category' => 'id'
                ]
            ],
            [
                [
                    'created_by_id'
                ],
                'exist',
                'skipOnError' => true,
                'targetClass' => Signup::className(),
                'targetAttribute' => [
                    'created_by_id' => 'id'
                ]
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
            'product_category' => 'Product Category',
            'title' => 'Title',
            'image' => 'Image',
            'color' => 'Color',
            'size' => 'Size',
            'price' => 'Price',
            'created_by_id' => 'Created By ID',
            'state_id' => 'State ID',
            'created_on' => 'Created On'
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Signup::className(), [
            'id' => 'created_by_id'
        ]);
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(Product::className(), [
            'id' => 'product_category'
        ]);
    }
}
