<div id="create-account" class="box">
  <h1 class="title"><?php echo language::translate('title_store_locator', 'Store locator'); ?></h1>
  <div class="content">
    <?php echo functions::form_draw_form_begin('store_locator_form', 'post'); ?>
    <table>
      <tr>
        <td>
          <?php echo language::translate('title_country', 'Country'); ?><br />
          <?php echo functions::form_draw_countries_list('country_code', true); ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php echo language::translate('title_zone_state_province', 'Zone/State/Province'); ?><br />
          <?php echo form_draw_zones_list(isset($_POST['country_code']) ? $_POST['country_code'] : '', 'zone_code', true); ?>
        </td>
      </tr>
      <tr>
        <td><?php echo functions::form_draw_button('create_account', language::translate('title_search', 'Search')); ?></td>
      </tr>
    </table>
    <?php echo functions::form_draw_form_end(); ?>
  </div>

  <script>
    $("select[name='country_code']").change(function(){
      $('body').css('cursor', 'wait');

      $.ajax({
        url: '<?php echo document::ilink('ajax/zones.json'); ?>?country_code=' + $(this).val(),
        type: 'get',
        cache: true,
        async: true,
        dataType: 'json',
        error: function(jqXHR, textStatus, errorThrown) {
          if (console) console.warn(errorThrown.message);
        },
        success: function(data) {
          $("select[name='zone_code']").html('');
          if (data) {
            $("select[name='zone_code']").removeAttr('disabled');
            $("select[name='zone_code']").closest('td').css('opacity', 1);
            $.each(data, function(i, zone) {
              $("select[name='zone_code']").append('<option value="'+ zone.code +'">'+ zone.name +'</option>');
            });
          } else {
            $("select[name='zone_code']").attr('disabled', 'disabled');
            $("select[name='zone_code']").closest('td').css('opacity', 0.15);
          }
        },
        complete: function() {
          $('body').css('cursor', 'auto');
        }
      });
    });
  </script>
</div>
