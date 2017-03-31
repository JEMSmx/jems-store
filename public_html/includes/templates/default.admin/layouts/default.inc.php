<!DOCTYPE html>
<html lang="{snippet:language}">
<head>
<title>{snippet:title}</title>
<meta charset="{snippet:charset}" />
<meta name="robots" content="noindex, nofollow" />
<link href="{snippet:template_path}styles/loader.css" rel="stylesheet" media="all" />
<link href="{snippet:template_path}styles/theme.css" rel="stylesheet" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{snippet:template_path}images/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{snippet:template_path}images/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{snippet:template_path}images/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{snippet:template_path}images/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="{snippet:template_path}images/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="{snippet:template_path}images/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="{snippet:template_path}images/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="{snippet:template_path}images/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="{snippet:template_path}images/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="{snippet:template_path}images/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="{snippet:template_path}images/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="{snippet:template_path}images/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="{snippet:template_path}images/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="{snippet:template_path}images/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="{snippet:template_path}images/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="{snippet:template_path}images/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="{snippet:template_path}images/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="{snippet:template_path}images/favicon/mstile-310x310.png" />
<!--snippet:head_tags-->
<!--snippet:style-->
</head>
<body>

<div id="body-wrapper">
  <div id="body">
    <div id="content-wrapper">
    <table style="width: 100%;">
      <tr>
        <td id="sidebar" style="vertical-align: top; width: 230px;">
          <div class="logotype">
            <a href="<?php echo document::href_link(WS_DIR_ADMIN); ?>"><img src="<?php echo functions::image_process(FS_DIR_HTTP_ROOT . WS_DIR_IMAGES . 'logotype.png', array('width' => 220, 'height' => 70, 'clipping' => 'FIT_ONLY_BIGGER')); ?>" alt="<?php echo settings::get('store_name'); ?>" title="<?php echo settings::get('store_name'); ?>" /></a>
          </div>
          <div class="header">
            <a href="<?php echo document::href_ilink(''); ?>" title="<?php echo language::translate('title_catalog', 'Catalog'); ?>"><?php echo functions::draw_fonticon('fa-chevron-circle-left'); ?></a>
            <a href="<?php echo document::href_link(WS_DIR_ADMIN); ?>" title="<?php echo htmlspecialchars(language::translate('title_home', 'Home')); ?>"><?php echo functions::draw_fonticon('fa-home fa-lg'); ?></a>
            <a href="<?php echo document::href_link(WS_DIR_ADMIN . 'logout.php'); ?>" title="<?php echo language::translate('text_logout', 'Logout'); ?>"><?php echo functions::draw_fonticon('fa-sign-out fa-lg'); ?></a>
          </div>

          <!--snippet:dashboard-->

          <!--snippet:box_apps_menu-->

        </td>
        <td id="column_left" style="vertical-align: top;">
          <!--snippet:column_left-->
        </td>
        <td id="content" style="vertical-align: top;">
          <!--snippet:notices-->
          <!--snippet:content-->
        </td>
      </tr>
    </table>
    </div>
  </div>
</div>

<!--snippet:foot_tags-->
<!--snippet:javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js"></script>
</body>
</html>