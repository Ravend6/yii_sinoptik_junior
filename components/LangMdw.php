<?php

namespace components;

use Yii;

class LangMdw extends \yii\base\Behavior
{
    public function events()
    {
        return [
            \yii\web\Application::EVENT_BEFORE_REQUEST => 'initLang',
        ];
    }

    public function initLang()
    {
        if (Yii::$app->getRequest()->getCookies()->has('lang')) {
            Yii::$app->language = Yii::$app->getRequest()->getCookies()->getValue('lang');
        }
    }
}
