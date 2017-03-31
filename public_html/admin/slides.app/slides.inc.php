<?php
  if (!isset($_GET['page'])) $_GET['page'] = 1;
  
  if (!empty($_POST['enable']) || !empty($_POST['disable'])) {
  
    if (!empty($_POST['slides'])) {
      foreach ($_POST['slides'] as $key => $value) $_POST['slides'][$key] = database::input($value);
      database::query(
        "update ". DB_TABLE_SLIDES ."
        set status = '". ((!empty($_POST['enable'])) ? 1 : 0) ."'
        where id in ('". implode("', '", $_POST['slides']) ."');"
      );
    }
    
    header('Location: '. document::link());
    exit;
  }
?>
<div style="float: right;"><?php echo functions::form_draw_link_button(document::link('', array('doc' => 'edit_slide'), true), language::translate('title_add_new_slide', 'Add New Slide'), '', 'add'); ?></div>
<h1 style="margin-top: 0px;"><?php echo $app_icon; ?> <?php echo language::translate('title_slides', 'Slides'); ?></h1>

<?php echo functions::form_draw_form_begin('slides_form', 'post'); ?>

  <table width="100%" align="center" class="dataTable">
    <tr class="header">
      <th><?php echo functions::draw_fonticon('fa-check-square-o fa-fw checkbox-toggle'); ?></th>
      <th></th>
      <th><?php echo language::translate('title_id', 'ID'); ?></th>
      <th width="100%"><?php echo language::translate('title_name', 'Name'); ?></th>
      <th style="text-align: center;"><?php echo language::translate('title_valid_from', 'Valid From'); ?></th>
      <th style="text-align: center;"><?php echo language::translate('title_valid_to', 'Valid To'); ?></th>
      <th style="text-align: center;"><?php echo language::translate('title_priority', 'Priority'); ?></th>
      <th>&nbsp;</th>
    </tr>
<?php

  $slides_query = database::query(
    "select * from ". DB_TABLE_SLIDES ."
    order by language_code asc, priority asc;"
  );

  if (database::num_rows($slides_query) > 0) {
    
    if ($_GET['page'] > 1) database::seek($slides_query, (settings::get('data_table_rows_per_page') * ($_GET['page']-1)));
    
    $page_items = 0;
    while ($slide = database::fetch($slides_query)) {
?>
    <tr class="row<?php echo !$slide['status'] ? ' semi-transparent' : null; ?>">
      <td><?php echo functions::form_draw_checkbox('slides['. $slide['id'] .']', $slide['id']); ?></td>
      <td><?php echo functions::draw_fonticon('fa-circle', 'style="color: '. (!empty($slide['status']) ? '#99cc66' : '#ff6666') .';"'); ?></td>
      <td><?php echo $slide['id']; ?></td>
      <td><a href="<?php echo document::href_link('', array('doc' => 'edit_slide', 'slide_id' => $slide['id']), true); ?>"><?php echo $slide['name']; ?></a></td>
      <td style="text-align: center;"><?php echo (date('Y', strtotime($slide['date_valid_from'])) > '1970') ? language::strftime(language::$selected['format_datetime'], strtotime($slide['date_valid_from'])) : '-'; ?></td>
      <td style="text-align: center;"><?php echo (date('Y', strtotime($slide['date_valid_to'])) > '1970') ? language::strftime(language::$selected['format_datetime'], strtotime($slide['date_valid_to'])) : '-'; ?></td>
      <td style="text-align: center;"><?php echo $slide['priority']; ?></td>
      <td style="text-align: right;"><a href="<?php echo document::href_link('', array('doc' => 'edit_slide', 'slide_id' => $slide['id']), true); ?>" title="<?php echo language::translate('title_edit', 'Edit'); ?>"><?php echo functions::draw_fonticon('fa-pencil'); ?></a></td>
    </tr>
<?php
      if (++$page_items == settings::get('data_table_rows_per_page')) break;
    }
  }
?>
    <tr class="footer">
      <td colspan="9"><?php echo language::translate('title_slides', 'Slides'); ?>: <?php echo database::num_rows($slides_query); ?></td>
    </tr>
  </table>

  <script>
    $(".dataTable .checkbox-toggle").click(function() {
      $(this).closest("form").find(":checkbox").each(function() {
        $(this).attr('checked', !$(this).attr('checked'));
      });
      $(".dataTable .checkbox-toggle").attr("checked", true);
    });

    $('.dataTable tr').click(function(event) {
      if ($(event.target).is('input:checkbox')) return;
      if ($(event.target).is('a, a *')) return;
      if ($(event.target).is('th')) return;
      $(this).find('input:checkbox').trigger('click');
    });
  </script>

  <p><span class="button-set"><?php echo functions::form_draw_button('enable', language::translate('title_enable', 'Enable'), 'submit', '', 'on'); ?> <?php echo functions::form_draw_button('disable', language::translate('title_disable', 'Disable'), 'submit', '', 'off'); ?></span></p>

<?php
  echo functions::form_draw_form_end();
  
// Display page links
  echo functions::draw_pagination(ceil(database::num_rows($slides_query)/settings::get('data_table_rows_per_page')));
  
?>