<?php

/* @var $this yii\web\View */

$this->title = isset($stream->name) ? 'Seminar | '.$stream->name : 'My Yii Application';
?>
<div class="row">

    <?php if(!isset($stream->url)):?>
        <div class="col s12">
            <div class="section jumbo">

                <div class="row">
                    Um den Stream zu schauen benötigen sei einen Berechtigungscode, den sie hier eingeben müssen. Wenn sie keinen gültigen Code besitzen wenden sie sich an: shop@ebtc-media.org.
                </div>
                <form method="post">
                    <div class="row">
                        <nav class="teal lighten-4">
                            <div class="nav-wrapper">
                                <div class="input-field">
                                    <input id="search" name="code" type="search" class="codesearch" required>
                                    <label for="search"><i class="material-icons">label</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Abschicken
                            <i class="material-icons right">cloud</i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    <?php else: ?>
        <div class="col s12">
            <div class="section"><?= $stream->details ?></div>
            <div class="section">

                <div class="card hoverable">
                    <div class="card-image">
                        <div id="ddplayer"><div class="indeterminate"></div></div>
                    </div>
                    <div class="card-content">
                        <p><?= $stream->description ?></p>
                    </div>
                </div>

            </div>
        </div>

    <?php
    $jw = 'jwplayer("ddplayer").setup({
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
    //$this->registerJs()
    ?>

    <?php endif; ?>

</div>