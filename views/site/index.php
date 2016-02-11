<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1 class="page-header">Главная</h1>
    <nav>
        <ul>
            <li><a href="<?= Url::to(['source/index']) ?>"><?= Yii::t('app', 'Sources') ?></a></li>
            <li><a href="<?= Url::to(['source/create']) ?>"><?= Yii::t('app', 'Create Source') ?></a></li>
            <li><a href="<?= Url::to(['town/index']) ?>"><?= Yii::t('app', 'Towns') ?></a></li>
            <li><a href="<?= Url::to(['town/create']) ?>"><?= Yii::t('app', 'Create Town') ?></a></li>
        </ul>
    </nav>
</div>
