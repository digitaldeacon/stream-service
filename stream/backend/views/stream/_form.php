<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\switchinput\SwitchInput;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Stream */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stream-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?php $streamsArray = ArrayHelper::map(\backend\models\Stream::find()
        ->where('id != :id',['id'=>$model->id])
        ->orderBy('name')->all(), 'id', 'name') ?>
    <?= $form->field($model, 'parent')->dropDownList($streamsArray, ['prompt' => '']) ?>

    <?= $form->field($model, 'active')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX
    ]); ?>

    <?= $form->field($model, 'start')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATETIME
    ]);
    ?>

    <?= $form->field($model, 'end')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATETIME
    ]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'details')->widget(TinyMce::className(), [
        'options' => ['rows' => 12],
        'language' => 'es',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]); ?>

    <?= $form->field($model, 'config')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
