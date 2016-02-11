<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "source".
 *
 * @property integer $id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property integer $temperature
 *
 * @property Town[] $towns
 */
class Source extends \yii\db\ActiveRecord
{
    public $distance;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latitude', 'longitude'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['temperature'], 'integer'],
            [['name'], 'string', 'max' => 128]
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
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'temperature' => Yii::t('app', 'Temperature'),
        ];
    }

    public function getFullName()
    {
        return $this->name . ' - ' . round($this->distance) . ' km';
    }

    public static function getNear()
    {
        return ['1' => 'ближ'];
    }

    public static function getSoureListByNear(Town $town)
    {
        $rawSources = Source::find()->all();
        $sources = [];
        foreach ($rawSources as $source) {
            $source->distance = $source->totalDistance($town);
            $sources[] = $source;
        }
        ArrayHelper::multisort($sources, function ($source) {
            return $source->distance;
        });
        return $sources;
    }


    public function totalDistance($obj)
    {
        return $this->distance($obj->latitude, $obj->longitude,
            $this->latitude, $this->longitude);
    }

    private function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
    {
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lng1 *= $pi80;
        $lat2 *= $pi80;
        $lng2 *= $pi80;

        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;

        return ($miles ? ($km * 0.621371192) : $km);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTowns()
    {
        return $this->hasMany(Town::className(), ['source_id' => 'id']);
    }
}
