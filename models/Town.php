<?php

namespace app\models;

use Yii;
use yii\helpers\Arrayhelper;

/**
 * This is the model class for table "town".
 *
 * @property integer $id
 * @property string $name
 * @property string $amount
 * @property double $latitude
 * @property double $longitude
 * @property integer $source_id
 *
 * @property Source $source
 */
class Town extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'town';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'amount', 'latitude', 'longitude', 'source_id'], 'required'],
            [['amount', 'source_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['name'], 'string', 'max' => 128],
            [['source_id'], 'in', 'range' => array_keys(static::getSourceList())]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'amount' => Yii::t('app', 'Amount'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'source_id' => Yii::t('app', 'Source'),
        ];
    }

    public static function getSourceList() {
        $sources = Source::find()->asArray()->all();

        return Arrayhelper::map($sources, 'id', 'name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }
}
