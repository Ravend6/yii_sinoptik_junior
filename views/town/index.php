<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Towns');
?>

<h1><?= Yii::t('app', 'Towns') ?></h1>
<p>
    <?= Html::a(Yii::t('app', 'Create Town'), ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?php foreach ($towns as $town): ?>
    <article>
        <h4><a href="<?= Url::to(['town/view', 'id' => $town->id]) ?>"><?= Yii::t('app', $town->name) ?></a></h4>
    </article>
<?php endforeach; ?>
