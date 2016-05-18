<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile("@web/lib/js/jwplayer-7.2.4/jwplayer.js",['position' => \yii\web\View::POS_END]);

$this->registerCssFile("@web/lib/s/custom.css");

$action = Yii::$app->controller->action->controller->id;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" media="screen,projection">
    <!--Let browser know website is optimized for mobile-->

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php if($action!='frame') : ?>
<header>
    <nav class="blue lighten-4">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">
                <img src="lib/i/dd-logo-l-ico.png" class="responsive-img logo" />
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="http://digital-deacon.org">Home</a></li>
                <li><a href="http://digital-deacon.org/services">Services</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="http://digital-deacon.org">Home</a></li>
                <li><a href="http://digital-deacon.org/services">Services</a></li>
            </ul>
        </div>
    </nav>
</header>
<?php endif; ?>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<?php if($action!='frame') : ?>
<footer class="page-footer blue lighten-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Digital Deacon Streaming Services</h5>
                <p class="grey-text text-lighten-4"><?=Yii::t('frontend', 'info.footer.about')?></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text"><?=Yii::t('frontend', 'menu.links')?></h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="http://digital-deacon.org">Digital Deacon</a></li>
                    <li><a class="grey-text text-lighten-3" href="http://materializecss.com">Materialize CSS</a></li>
                    <li><a class="grey-text text-lighten-3" href="https://www.jwplayer.com/">JWPLayer</a></li>
                    <li><a class="grey-text text-lighten-3" href="http://www.tmai.org/">TMAI</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <?=Yii::$app->params['app.name']?> v.<?=Yii::$app->params['version']?>,
            &copy; <?= date('Y') ?> DigitalDeacon
            <a class="grey-text text-lighten-4 right" href="http://ebtc-online.org">EBTC Online</a>
        </div>
    </div>
</footer>
<?php endif; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
