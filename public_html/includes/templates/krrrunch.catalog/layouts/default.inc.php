<?php
// Cookie acceptance - By EU law
  if (empty($_COOKIE['cookies_accepted'])) {
    if (!isset(document::$snippets['bottom'])) document::$snippets['bottom'] = '';
    document::$snippets['bottom'] .= '<div id="cookies-acceptance-wrapper">' . PHP_EOL
                                   . '  <div id="cookies-acceptance" class="twelve-eighty">' . PHP_EOL
                                   . '    ' . language::translate('terms_cookies_acceptance', 'We rely on cookies to provide our services. By using our services, you agree to our use of cookies.') .' '. functions::form_draw_button('accept_cookies', language::translate('title_ok', 'OK'), 'button') . PHP_EOL
                                   . '  </div>' . PHP_EOL
                                   . '</div>';
    document::$snippets['foot_tags'][] = '<script src="'. WS_DIR_EXT .'jquery/jquery.cookie.min.js"></script>';
    document::$snippets['javascript'][] = '  $("button[name=\'accept_cookies\']").click(function(){' . PHP_EOL
                                        . '    $("#cookies-acceptance-wrapper").fadeOut();' . PHP_EOL
                                        . '    $.cookie("cookies_accepted", "1", {path: "'. WS_DIR_HTTP_HOME .'", expires: 365});' . PHP_EOL
                                        . '  });';
  }
?>
<!DOCTYPE html>
<html lang="{snippet:language}">
<head>
<title>{snippet:title}</title>
<meta charset="{snippet:charset}" />
<meta name="description" content="{snippet:description}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400|Roboto:400,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css" integrity="sha256-K3Njjl2oe0gjRteXwX01fQD5fkk9JFFBdUHy/h38ggY=" crossorigin="anonymous" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha256-AIodEDkC8V/bHBkfyxzolUMw57jeQ9CauwhVW6YJ9CA=" crossorigin="anonymous" rel="stylesheet">
<link href="https://cdn.rawgit.com/cobyism/gridism/0.2.2/gridism.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link href="{snippet:template_path}assets/styles/main.css" rel="stylesheet">
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{snippet:template_path}assets/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{snippet:template_path}assets/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{snippet:template_path}assets/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{snippet:template_path}assets/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="{snippet:template_path}assets/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="{snippet:template_path}assets/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="{snippet:template_path}assets/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="{snippet:template_path}assets/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="{snippet:template_path}assets/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="{snippet:template_path}assets/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="{snippet:template_path}assets/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="{snippet:template_path}assets/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="{snippet:template_path}assets/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="{snippet:template_path}assets/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="{snippet:template_path}assets/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="{snippet:template_path}assets/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="{snippet:template_path}assets/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="{snippet:template_path}assets/favicon/mstile-310x310.png" />
<!--[if IE]><link rel="stylesheet" href="{snippet:template_path}styles/ie.css" media="all" /><![endif]-->
<!--[if IE 9]><link rel="stylesheet" href="{snippet:template_path}styles/ie9.css" media="all" /><![endif]-->
<!--[if lt IE 9]><link rel="stylesheet" href="{snippet:template_path}styles/ie8.css" media="all" /><![endif]-->
<!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
<!--snippet:head_tags-->
<!--snippet:style-->
</head>
<body class="home">
  <!-- Header -->
    <header class="k-header">
    <div class="k-workspace">
      <div class="k-wrap k-wrap--fluid">
       <a href="/" class="k-logo"><img src="{snippet:template_path}assets/images/krrrunch-logo.png" alt="#TODO"></a>
        <nav class="k-navbar">
          <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_site_menu.inc.php'); ?>
          <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_site_mobile.inc.php'); ?>
          <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_cart_mobile.inc.php'); ?>
          <div class="k-navbar-controls">
            <img aria-label="Cerrar" class="k-navbar-close" src="{snippet:template_path}assets/images/close-icon.svg" alt="Cerrar Menú" />
            <img aria-label="Abrir menu" class="k-navbar-hamburger" src="{snippet:template_path}assets/images/hamburger-icon.svg" alt="Abrir Menú" />
          </div>
        </nav>
      </div>
    </div>
  </header>
  
  <!--snippet:content-->
      
  <?php include vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_BOXES . 'box_site_footer.inc.php'); ?>

<!--snippet:foot_tags-->
<!--snippet:javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script src="{snippet:template_path}assets/scripts/k-menu.js"></script>
<script src="{snippet:template_path}assets/scripts/k-form.js"></script>
<script src="{snippet:template_path}assets/scripts/k-alert.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
  $('#slider').slick({
      dots: true,
      autoplay: true
  });
}); 
</script>
   <script type="text/javascript">
        var kinput = document.querySelectorAll(".k-input");
        var i;
        for (i = 0; i < kinput.length; i++) {
            new Floatl(kinput[i]);
        }
  </script>
  <?php if(settings::get('google_analytics_id')){ ?>
  <script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo settings::get('google_analytics_id'); ?>', 'auto');
  ga('send', 'pageview');
    </script>
<?php } ?> 

</body>
</html>