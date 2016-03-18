<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StreamLog */

$this->title = $model->stream_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Stream Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stream-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'stream_id' => $model->stream_id, 'type' => $model->type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'stream_id' => $model->stream_id, 'type' => $model->type], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'stream_id',
            'type',
            'value:ntext',
            'timestamp',
        ],
    ]) ?>

</div>
