<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StreamLog */

$this->title = Yii::t('backend', 'Create Stream Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Stream Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stream-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
