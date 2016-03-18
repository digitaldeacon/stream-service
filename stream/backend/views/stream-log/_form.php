<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StreamLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stream-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stream_id')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'info' => 'Info', 'error' => 'Error', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
