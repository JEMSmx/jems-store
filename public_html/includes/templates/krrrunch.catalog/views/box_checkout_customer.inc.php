<main class="main-shipping">
  <div  class="k-workspace">
    <div class="k-wrap k-wrap--fluid">
      <div class="grid">
         <div id="box-checkout-customer" class="k-form-unit">
            <?php echo functions::form_draw_form_begin('customer_form', 'post', false, false,'autocomplete="on" class="k-form k-form--rounded"'); ?>
            <h1 class="k-form__title">Envío</h1>
            <section class="k-form__section">
              <h3 class="k-form__subtitle">Datos de contacto</h3>
              <div class="k-form__grid">
               <div class="k-input k-grid-half">
                <label for="nombre" class="k-input__label">Nombre</label>
                <?php echo functions::form_draw_text_field('firstname', true, 'id="name" autocomplete="name" class="k-input__input k-input--error" placeholder="Nombre" required="true"'); ?> 
                <!--  Este es el mensaje de error que se tiene que programar-->
                <span id="firstname_error" class="k-form__error-msg"></span>
              </div>
              <div class="k-input k-grid-half">
                <label for="family-name" class="k-input__label">Apellidos</label>
                <?php echo functions::form_draw_text_field('lastname', true, 'id="family-name " autocomplete="family-name " class="k-input__input" placeholder="Apellidos" required="true"'); ?> 
                <span id="lastname_error" class="k-form__error-msg">Mensaje de error</span>
              </div>
            </div>
            <div class="k-form__grid">
             <div id="email" class="k-input k-grid-half">
              <label for="email" class="k-input__label">Correo electrónico</label>
              <?php echo functions::form_draw_email_field('email', true, 'id="email" autocomplete="email" class="k-input__input" placeholder="Correo electrónico" required="required"'); ?>
              <span id="email_error" class="k-form__error-msg"></span>
            </div>
            <div class="k-input k-grid-half">
              <label for="frmPhoneNumA" class="k-input__label">Télefono</label>
              <?php echo functions::form_draw_phone_field('phone', true, 'id="frmPhoneNumA" autocomplete="tel" class="k-input__input" placeholder="Télefono" required="required"'); ?>
              <span id="phone_error" class="k-form__error-msg"></span>
            </div>
          </div>
        </section>
        <section class="k-form__section">
          <h3 class="k-form__subtitle">Datos de envío</h3>
          <div class="k-input">
            <label for="domicilio" class="k-input__label">Domicilio</label>
            <?php echo functions::form_draw_text_field('address1', true, 'id="street-address" autocomplete="street-address" class="k-input__input" placeholder="Domicilio" required="required"'); ?>
            <span id="address1_error" class="k-form__error-msg"></span>
          </div>
          <div class="k-input">
            <label for="frmCityS" class="k-input__label">Ciudad</label>
            <?php echo functions::form_draw_text_field('city', true, 'id="frmCityS" autocomplete="city" class="k-input__input" placeholder="Ciudad" required="required"'); ?>
            <span id="city_error" class="k-form__error-msg"></span>
          </div>
          <div class="k-form__grid">
            <div class="k-grid-thirds">
              <div class="k-select">
                <?php echo functions::form_draw_countries_list('shipping_address[country_code]', isset($_POST['shipping_address']['country_code']) ? $_POST['shipping_address']['country_code'] : (isset($_POST['country_code']) ? $_POST['country_code'] : ''), false, 'class="k-select__select"'); ?>                  
              </div>
            </div>
            <div class="k-grid-thirds">
              <div class="k-select">
                <?php echo functions::form_draw_zones_list(isset($_POST['country_code']) ? $_POST['country_code'] : '', 'zone_code', true, false, 'class="k-select__select"'); ?>   
              </div>
            </div>
            <div class="k-grid-thirds">
             <div class="k-input">
              <label for="postal-code" class="k-input__label">Código postal</label>
              <?php echo functions::form_draw_phone_field('postcode', true, 'id="postal-code" autocomplete="shipping postal-code" class="k-input__input" placeholder="Código postal" required="true"'); ?>
              <span id="postcode_error" class="k-form__error-msg"></span>
            </div>
          </div>
        </div>
      </section>
    </form>
  </div>
<div class="k-order-info-unit">
    <div class="k-order-info">
      <div class="k-order-info__top">
        <h5 class="k-order-info__title">Información del pedido</h5>
        <a href="<?php echo document::link('checkout') ?>" class="modify-order">Modificar</a>
      </div>
      <div class="k-order-info__table">
        <div class="k-order-info__wrap">
         <?php $total=0; 
         foreach ($items as $key => $item) { ?>
         <span class="k-order-info__row">
         <a href="<?php echo $item['link']; ?>">
          <span class="k-order-info__col k-order-info__name">
            <span class="k-order-item-img"><img src="<?php echo $item['thumbnail']; ?>" alt="<?php echo $item['name']; ?>" /></span>
            <span class="k-order-item-text">
              <h4><?php echo $item['name']; ?></h4>
              <p><?php if (!empty($item['options'])) echo '<p>'. implode('<br />', $item['options']) .'</p>' . PHP_EOL; ?></p>
            </span>
          </span>
          </a>
          <span class="k-order-info__col k-order-info__total"><?php echo currency::format($item['price'], false); ?></span>
        </span>
        <?php $total+=$item['price']*$item['quantity'];
      } ?>
    </div>
  </div>
  <div class="k-cart-totals">
    <div class="k-cart-totals__titles"><h4 id="subtotal">Subtotal</h4> <!-- <h4 id="envio">Envío</h4>  --><h4 id="total">Total</h4></div>
    <div class="k-cart-totals__numbers"><p aria-labelledby="subtotal"><?php echo currency::format($total, false); ?></p> <!-- <p aria-labelledby="envio">$500.00</p> --> <p aria-labelledby="total"><?php echo currency::format($total, false); ?></p></div>
  </div> 
</div>
</div>
</div>
<div class="k-cart-action grid">
  <a onclick="finishPayment(''); return false;" href="" class="k-btn">Continuar</a>
  <a onclick="finishPayment('back'); return false;" href="" class="regresar-link">Regresar</a>
</div>
</div>
</div>
</div>
</main>
<script>
  $("#box-checkout-customer input, #box-checkout-customer select").change(function() {
    if ($(this).val() == '') return;
    if (console) console.log('Retrieving address ["'+ $(this).attr('name') +']');
    $("#"+$(this).attr('name')+"_error").css("fontSize", "0px");
    $("[name='"+$(this).attr('name')+"']").css("box-shadow", '');
    $.ajax({
      url: '<?php echo document::ilink('ajax/get_address.json'); ?>?trigger='+$(this).attr('name'),
      type: 'post',
      data: $(this).closest('form').serialize(),
      cache: false,
      dataType: 'json',
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn(errorThrown.message);
      },
      success: function(data) {
        if (data['alert']) {
          alert(data['alert']);
        }
        $.each(data, function(key, value) {
          if (console) console.log('  ' + key +": "+ value);
          if ($("#box-checkout-customer *[name='"+key+"']").length && $("#box-checkout-customer *[name='"+key+"']").val() == '') {
            $("#box-checkout-customer  *[name='"+key+"']").val(value);
          }
        });
      },
    });
  });
  
  $("select[name='country_code']").change(function(){
    if ($(this).find('option:selected').data('tax-id-format') != '') {
      $(this).closest('table').find("input[name='tax_id']").attr('pattern', $(this).find('option:selected').data('tax-id-format'));
    } else {
      $(this).closest('table').find("input[name='tax_id']").removeAttr('pattern');
    }
    
    if ($(this).find('option:selected').data('postcode-format') != '') {
      $(this).closest('table').find("input[name='postcode']").attr('pattern', $(this).find('option:selected').data('postcode-format'));
      $(this).closest('table').find("input[name='postcode']").attr('required', 'required');
      $(this).closest('table').find("input[name='postcode']").closest('td').find('.required').show();
    } else {
      $(this).closest('table').find("input[name='postcode']").removeAttr('pattern');
      $(this).closest('table').find("input[name='postcode']").removeAttr('required');
      $(this).closest('table').find("input[name='postcode']").closest('td').find('.required').hide();
    }
    
    if ($(this).find('option:selected').data('phone-code') != '') {
      $(this).closest('table').find("input[name='phone']").attr('placeholder', '+' + $(this).find('option:selected').data('phone-code'));
    } else {
      $(this).closest('table').find("input[name='phone']").removeAttr('placeholder');
    }
    
    $('body').css('cursor', 'wait');
    $.ajax({
      url: '<?php echo document::ilink('ajax/zones.json'); ?>?country_code=' + $(this).val(),
      type: 'get',
      cache: true,
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
  
  $("select[name='shipping_address[country_code]']").change(function(){
    
    console.log('Retrieving zones');
    $('body').css('cursor', 'wait');
    $.ajax({
      url: '<?php echo document::ilink('ajax/zones.json'); ?>?country_code=' + $(this).val(),
      type: 'get',
      cache: true,
      dataType: 'json',
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn(errorThrown.message);
      },
      success: function(data) {
        $("select[name='shipping_address[zone_code]']").html('');
        if (data) {
          $("select[name='shipping_address[zone_code]']").removeAttr('disabled');
          $("select[name='shipping_address[zone_code]']").closest('td').css('opacity', 1);
          $.each(data, function(i, zone) {
            $("select[name='shipping_address[zone_code]']").append('<option value="'+ zone.code +'">'+ zone.name +'</option>');
          });
        } else {
          $("select[name='shipping_address[zone_code]']").attr('disabled', 'disabled');
          $("select[name='shipping_address[zone_code]']").closest('td').css('opacity', 0.15);
        }
      },
      complete: function() {
        $('body').css('cursor', 'auto');
      }
    });
  });
  
  if ($("select[name='country_code']").find('option:selected').data('tax-id-format') != '') {
    $("select[name='country_code']").closest('table').find("input[name='tax_id']").attr('pattern', $("select[name='country_code']").find('option:selected').data('tax-id-format'));
  } else {
    $("select[name='country_code']").closest('table').find("input[name='tax_id']").removeAttr('pattern');
  }
  
  if ($("select[name='country_code']").find('option:selected').data('postcode-format') != '') {
    $("select[name='country_code']").closest('table').find("input[name='postcode']").attr('pattern', $("select[name='country_code']").find('option:selected').data('postcode-format'));
    $("select[name='country_code']").closest('table').find("input[name='postcode']").attr('required', 'required');
    $("select[name='country_code']").closest('table').find("input[name='postcode']").closest('td').find('.required').show();
  } else {
    $("select[name='country_code']").closest('table').find("input[name='postcode']").removeAttr('pattern');
    $("select[name='country_code']").closest('table').find("input[name='postcode']").removeAttr('required');
    $("select[name='country_code']").closest('table').find("input[name='postcode']").closest('td').find('.required').hide();
  }
  
  if ($("select[name='country_code']").find('option:selected').data('phone-code') != '') {
    $("select[name='country_code']").closest('table').find("input[name='phone']").attr('placeholder', '+' + $("select[name='country_code']").find('option:selected').data('phone-code'));
  } else {
    $("select[name='country_code']").closest('table').find("input[name='phone']").removeAttr('placeholder');
  }
  
  if ($("select[name='zone_code'] option").length == 0) $("select[name='zone_code']").closest('td').css('opacity', 0.15);
  
  if ($("select[name='shipping_address[zone_code]'] option").length == 0) $("select[name='shipping_address[zone_code]']").closest('td').css('opacity', 0.15);
</script>