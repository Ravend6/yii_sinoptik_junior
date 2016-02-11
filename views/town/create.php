<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Source;
use app\models\Town;


$this->title = Yii::t('app', 'Create Town');
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Town'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="town-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="town-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'amount')->textInput() ?>

        <?= $form->field($model, 'latitude')->textInput() ?>

        <?= $form->field($model, 'longitude')->textInput() ?>

        <?= $form->field($model, 'source_id')->dropDownList(
            Town::getSourceList()
            // Source::getNear()
            // ArrayHelper::map(Source::find()->all(), 'id', 'name')
            // ['prompt' => 'Select Source', 'disabled' => 'disabled']
        ) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
