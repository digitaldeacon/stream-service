<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen,projection">
     <!--Let browser know website is optimized for mobile-->
     <link rel="stylesheet" href="s/custom.css" media="screen,projection" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

   <body>

    <header>
      <nav class="blue lighten-4">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
              <img src="i/dd-logo-l-ico.png" class="responsive-img logo" />
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

    <div class="container">
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
    </div>

    <footer class="page-footer blue lighten-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Digital Deacon Streaming Services</h5>
            <p class="grey-text text-lighten-4">Digital Deacon gibt dir die Möglichkeit deine Termine auch im Netz zu zeigen.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
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
        <div class="container">&copy; 2016 DigitalDeacon <a class="grey-text text-lighten-4 right" href="http://ebtc-online.org">EBTC Online</a>
        </div>
      </div>
    </footer>

     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
     <script type="text/javascript" src="js/jwplayer-7.2.4/jwplayer.js"></script>
     <script>jwplayer.key="ncdTabgDLIeEgRAICd0tGmSubWrsH0jMCrGHsg";</script>
     <script type="text/javascript">
      jwplayer("ddplayer").setup({
         playlist: [{
             sources: [{
                 file: "rtmp://148.251.133.116:1935/live/mp4:hirtenkonferenz"
             },{
                 file: "http://148.251.133.116:1935/live/mp4:hirtenkonferenz/playlist.m3u8"
             }]
         }],
      rtmp: {
             bufferlength: 6
         },
         primary: "html5",
         width: "100%",
         aspectratio: "16:9"
       });
     </script>
   </body>

 </html>
