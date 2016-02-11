<?php
use yii\helpers\Url;
?>

<h1><?= Yii::t('app', 'Towns') ?></h1>
<?php foreach ($towns as $town): ?>
    <article>
        <h4><a href="<?= Url::to(['town/view', 'id' => $town->id]) ?>"><?= Yii::t('app', $town->name) ?></a></h4>
    </article>
<?php endforeach; ?>
