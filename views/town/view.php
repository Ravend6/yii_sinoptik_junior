<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<h1><?= Yii::t('app', $model->name) ?></h1>
<p><?= Yii::t('app', 'Amount') ?> <?= $model->amount ?></p>
<p><?= Yii::t('app', 'Latitude') ?> <?= $model->latitude ?></p>
<p><?= Yii::t('app', 'Longitude') ?> <?= $model->longitude ?></p>
<?php if ($model->source): ?>
    <p>
        <?= Yii::t('app', 'Temperature') ?>
        <?=  $model->source->temperature > 0 ? '+' : '' ?><?= $model->source->temperature ?>
    </p>
<?php endif; ?>

<a class="btn btn-primary" href="<?= Url::to(['town/update', 'id' => $model->id]) ?>">
    <span class="glyphicon glyphicon-pencil"></span>
    <?= Yii::t('yii', 'Update') ?>
</a>
<a class="btn btn-danger" href="<?= Url::to(['town/delete/', 'id' => $model->id]) ?>"
    data-confirm="<?= Yii::t('yii', 'Are you sure you want to delete this item?') ?>"
    data-method="post"><span class="glyphicon glyphicon-trash"></span>
    <?= Yii::t('yii', 'Delete') ?></a>
