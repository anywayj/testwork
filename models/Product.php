<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property double $price
 * @property int $count
 * @property string $description
 * @property string $icon
 * @property string $date
 * @property int $category_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'count', 'date', 'category_id'], 'required','message'=>Yii::t('app', 'Не может быть пустым')],
            [['price'], 'number'],
            [['count', 'category_id'], 'integer','message'=>Yii::t('app', 'Только целые числа')],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Наименование',
            'price' => 'Цена',
            'count' => 'Кол-во',
            'description' => 'Описание',
            'icon' => 'Иконка',
            'date' => 'Дата',
            'category_id' => 'Категория',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getImageUrl()
    {
        return Url::to('@web/icons/' . $this->icon, true);
    }
}
