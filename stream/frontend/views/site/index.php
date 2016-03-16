<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="row">

    <?php if(!isset($_GET['action'])):?>
        <div class="col s12">
            <div class="section jumbo">

                <div class="row">
                    Um den Stream zu schauen benötigen sei einen Berechtigungscode, den sie hier eingeben müssen. Wenn sie keinen gültigen Code besitzen wenden sie sich an: shop@ebtc-media.org.
                </div>
                <form method="get">
                    <div class="row">
                        <nav class="teal lighten-4">
                            <div class="nav-wrapper">
                                <div class="input-field">
                                    <input id="search" type="search" class="codesearch" required>
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
            <div class="section">

                <div class="card hoverable">
                    <div class="card-image">
                        <div id="ddplayer"><div class="indeterminate"></div></div>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

</div>