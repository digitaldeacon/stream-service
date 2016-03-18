<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stream */

$this->title = Yii::t('backend', 'Create Stream');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Streams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stream-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
