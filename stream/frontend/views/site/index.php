<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = isset($stream->name) ? 'Seminar | '.$stream->name : 'Stream Service';
?>
<div class="row">

    <?php if(!isset($stream->url) || isset($_GET['sid'])):?>
        <div class="col s12">
            <div class="section jumbo">

                <div class="row">
                    <?=empty($stream->form_pre) ? Yii::t('frontend', 'info.start.usage') : $stream->form_pre;?>
                </div>
                <?php if($stream->hasErrors()) {
                    echo '<div class="row">';
                    foreach ($stream->getErrors('code') as $error) {
                        echo '
                        <div class="chip red lighten-2 error-chip"> '.$error.'
                        <i class="material-icons">close</i></div>
                        ';
                    }//Html::error($stream,'code', ['class' => 'chip red lighten-2']);
                    echo '</div>';
                } ?>
                <form axtion="index.php" method="get">
                    <div class="row">
                        <nav class="teal lighten-4">
                            <div class="nav-wrapper">
                                <div class="input-field">
                                    <input id="search" name="s" type="search" class="codesearch" required>
                                    <label for="search"><i class="material-icons">label</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit"><?= Yii::t('frontend', 'button.send')?>
                            <i class="material-icons right">cloud</i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    <?php else: ?>
        <div class="col s12">
            <div class="section">

                <div class="card hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <div id="ddplayer"><div class="indeterminate"></div></div>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <?= $stream->description ?><i class="material-icons right">more_vert</i>
                        </span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?= Yii::t('frontend', 'menu.stream.details')?><i class="material-icons right">close</i></span>
                        <?= $stream->details ?>
                    </div>
                    <?php foreach($stream->childStreams as $child): ?>
                    <div class="card-action">
                       <span class="time badge">
                           <i class="material-icons">schedule</i>
                           <?= date('D d M H:i',strtotime($child->start)) ?>
                       </span>
                        <a href="?s=<?= $child->code ?>"><?= $child->name ?></a>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

    <?php
    $jw = '
    jwplayer.key="ncdTabgDLIeEgRAICd0tGmSubWrsH0jMCrGHsg";
    jwplayer("ddplayer").setup({
                playlist: [{
                    sources: [{
                        file: "rtmp://'.$stream->url.'"
                    },{
                        file: "http://'.$stream->url.'/playlist.m3u8"
                    }]
                }],
                rtmp: {
                    bufferlength: 6
                },
                primary: "html5",
                width: "100%",
                aspectratio: "16:9"
            });';
    $this->registerJs($jw,\yii\web\View::POS_END,'jwplayer');
    ?>

    <?php endif; ?>

</div>