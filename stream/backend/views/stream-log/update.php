<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StreamLog */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Stream Log',
]) . $model->stream_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Stream Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stream_id, 'url' => ['view', 'stream_id' => $model->stream_id, 'type' => $model->type]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="stream-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
