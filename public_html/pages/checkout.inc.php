<?php
  document::$layout = 'default';
  
  header('X-Robots-Tag: noindex');
  document::$snippets['head_tags']['noindex'] = '<meta name="robots" content="noindex" />';
  document::$snippets['title'][] = language::translate('checkout:head_title', 'Checkout');
  
  if (settings::get('catalog_only_mode')) return;

  breadcrumbs::add(language::translate('title_checkout', 'Checkout'));
?>

    <div id="checkout-cart-wrapper">
      <?php include_once vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_PAGES . 'ajax/checkout_cart.html.inc.php'); ?>
    </div>

    <div id="checkout-customer-wrapper" style="display:none">
      <?php include_once vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_PAGES . 'ajax/checkout_customer.html.inc.php'); ?>
    </div>

     <div id="checkout-payment-shipping" style="display:none">
      <?php include_once vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_PAGES . 'ajax/checkout_shipping.html.inc.php'); ?>
    </div>
   
    <div id="checkout-payment-wrapper" style="display:none">
      <?php include_once vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_PAGES . 'ajax/checkout_payment.html.inc.php'); ?>
    </div>

     <div id="checkout-summary-wrapper" style="display:none">
      <?php include_once vmod::check(FS_DIR_HTTP_ROOT . WS_DIR_PAGES . 'ajax/checkout_summary.html.inc.php'); ?>
    </div>

<script>
  function updateQuantity(keyProduct){
    var valQuantity=$("#productQuantity-"+keyProduct).val();
    $("#hdProduct-"+keyProduct).attr('name', 'update_cart_item');
    $("#hdProduct-"+keyProduct).val('Update');
    $("#formCart-"+keyProduct).append('<input type="hidden" name="quantity" value="'+ valQuantity +'" />')
    $("#formCart-"+keyProduct).submit();
  }


  function step1(){
    $.ajax({
      url: '<?php echo document::ilink('ajax/cart_stock.json'); ?>',
      type: 'get',
      cache: false,
      dataType: 'json',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        
      },
      success: function(data) {
        if(data['stock']){
          $('#checkout-cart-wrapper').fadeOut(700);
          $('#checkout-customer-wrapper').delay(600).fadeIn(1100);
        }else{
          swal({
              title: "<?php echo language::translate('checkout_stock_error_alert_title', 'Oops...'); ?>",
              text: "<?php echo language::translate('checkout_stock_error_alert_message', 'One or more products have been depleted, delete product to continue'); ?>",
              type: "warning",
              confirmButtonText: "<?php echo language::translate('checkout_stock_error_confirmation_button', 'Confirmation button'); ?>"
            });
        }
      },
      complete: function() {
        $('*').css('cursor', '');
      }
    });
  } 

  function finishPayment(step){
    if(step=='back'){
      $('#checkout-customer-wrapper').fadeOut(700);
      $('#checkout-cart-wrapper').delay(600).fadeIn(1100);
    }else{
          $.ajax({
          url: '<?php echo document::ilink('ajax/cart_stock.json'); ?>',
          type: 'get',
          cache: false,
          dataType: 'json',
          beforeSend: function(jqXHR) {
            jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
          },
          error: function(jqXHR, textStatus, errorThrown) {
           
          },
          success: function(data) {
            if(data['stock']){
              var email = $("input[name='email']").val();
              var errors = false;
              var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
              var expr_cod = /^\d{4,5}$/;

            
              if($("input[name='postcode']").val().length < 3){
                        $("input[name='postcode']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                        $("#postcode_error").css("fontSize", "14px");
                   $("#postcode_error").text("<?php echo language::translate('checkout_shipping_postal_code_error', 'Enter a postal code.'); ?>");
                        errors=true;
              }

              if(!expr_cod.test($("input[name='postcode']").val())){
                      $("input[name='postcode']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                        $("#postcode_error").css("fontSize", "14px");
                   $("#postcode_error").text("<?php echo language::translate('checkout_shipping_postal_code_invalid', 'Enter a postal code valid.'); ?>");
                        errors=true;
              }

              if($("input[name='city']").val().length < 3){
                        $("input[name='city']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                         $("#city_error").css("fontSize", "14px");
                   $("#city_error").text("<?php echo language::translate('checkout_shipping_city_error', 'You must enter a city.'); ?>");
                        errors=true;
              }
              if($("input[name='address1']").val().length < 3){
                    $("input[name='address1']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                    $("#address1_error").css("fontSize", "14px");
                   $("#address1_error").text("<?php echo language::translate('checkout_shipping_address_error', 'You must enter a address.'); ?>");
                    errors=true;
              }
               if($("input[name='phone']").val().length < 3){
                    $("input[name='phone']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                     $("#phone_error").css("fontSize", "14px");
                   $("#phone_error").text("<?php echo language::translate('checkout_shipping_tel_error', 'You must enter a telephone.'); ?>");
                    errors=true;
              }
              if(!expr.test(email)){
                      $("input[name='email']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                     $("#email_error").css("fontSize", "14px")
                   $("#email_error").text("<?php echo language::translate('checkout_shipping_email_invalid', 'You must enter a email valid.'); ?>");
                      errors=true;
              }
              if($("input[name='email']").val().length < 3){
                    $("input[name='email']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                     $("#email_error").css("fontSize", "14px");
                   $("#email_error").text("<?php echo language::translate('checkout_shipping_email_error', 'You must enter a email.'); ?>");
                    errors=true;
              }
              if($("input[name='lastname']").val().length < 3){
                  $("#lastname_error").css("fontSize", "14px");
                   $("#lastname_error").text("<?php echo language::translate('checkout_shipping_lastname_error', 'You must enter a lastname.'); ?>");
                    $("input[name='lastname']").focus().css("box-shadow", "0 0 0 2px #bb0e1b");
                    errors=true;
              }
              if($("input[name='firstname']").val().length < 3){
                    $("#firstname_error").css("fontSize", "14px");
                    $("#firstname_error").text("<?php echo language::translate('checkout_shipping_name_error', 'You must enter a name.'); ?>");
                    $("input[name='firstname']").focus();
                    $("#name").addClass("k-input--focused");
                    errors=true;
              }
              if(!errors){           

                          $("form[name='customer_form']").submit();
                          $('<input>').attr('type','hidden').attr('name','confirm_order').attr('value','Pay Now').appendTo("form[name='order_form']");
                          $("form[name='order_form']").submit();
                                 
              }
            }else{
              swal({
                  title: "<?php echo language::translate('checkout_stock_error_alert_title', 'Oops...'); ?>",
                  text: "<?php echo language::translate('checkout_stock_error_alert_message', 'One or more products have been depleted, delete product to continue'); ?>",
                  type: "warning",
                  confirmButtonText: "<?php echo language::translate('checkout_stock_error_confirmation_button', 'Confirmation button'); ?>",
                  },
                  function(){
                    window.location.href='<?php echo document::ilink('checkout'); ?>';
                  });
            }
          },
          complete: function() {
            $('*').css('cursor', '');
          }
        }); 
    } 
  }

  function refreshCart() {
    if (console) console.log("Refreshing cart");
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_cart.html'); ?>',
      data: false,
      type: 'get',
      cache: false,
      context: $('#checkout-cart-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-cart-wrapper').html(textStatus + ': ' + errorThrown).fadeTo('slow', 1);
      },
      success: function(data) {
        $('#checkout-cart-wrapper').html(data);
      },
    });
  }
  
  function refreshCustomer() {
    if (console) console.log("Refreshing customer");
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_customer.html'); ?>',
      data: false,
      type: 'get',
      cache: false,
      context: $('#checkout-customer-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-customer-wrapper').html(textStatus + ': ' + errorThrown);
      },
      success: function(data) {
        $('#checkout-customer-wrapper').html(data);
      },
    });
  }

  function refreshShipping() {
    if (console) console.log("Refreshing shipping");
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_shipping.html'); ?>',
      data: false,
      type: 'get',
      cache: false,
      context: $('#checkout-shipping-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-shipping-wrapper').html(textStatus + ': ' + errorThrown);
      },
      success: function(data) {
        $('#checkout-shipping-wrapper').html(data);
      },
    });
  }

  function refreshPayment() {
    if (console) console.log("Refreshing payment");
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_payment.html'); ?>',
      data: false,
      type: 'get',
      cache: false,
      context: $('#checkout-payment-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-payment-wrapper').html(textStatus + ': ' + errorThrown);
      },
      success: function(data) {
        $('#checkout-payment-wrapper').html(data);
      },
    });
  }
  
  function refreshSummary() {
    if (console) console.log("Refreshing summary");
    var comments = $("textarea[name='comments']").val();
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_summary.html'); ?>',
      data: false,
      type: 'get',
      cache: false,
      context: $('#checkout-summary-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-summary-wrapper').html(textStatus + ': ' + errorThrown);
      },
      success: function(data) {
        $('#checkout-summary-wrapper').html(data);
        $("textarea[name='comments']").val(comments);
      },
    });
  }
    
  $("body").on("click", "form button[type='submit']", function(e) {
    $(this).closest("form").append('<input type="hidden" name="'+ $(this).attr("name") +'" value="'+ $(this).text() +'" />');
  });
  
  $("body").on('submit', "form[name='cart_form']", function(e) {
    if (console) console.log("Saving cart");
    e.preventDefault();
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_cart.html'); ?>',
      data: $(this).serialize(),
      type: 'post',
      cache: false,
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-cart-wrapper').html(textStatus + ': ' + errorThrown).fadeTo('slow', 1);
      },
      success: function(data) {
        $('#checkout-cart-wrapper').html(data).fadeTo('slow', 1);
        if (jQuery.isFunction(window.updateCart)) updateCart();
        refreshPayment();
        refreshCustomer();
        refreshSummary();
      },
      complete: function() {
        $('body').css('cursor', '');
      }
    });
  });
  
  var customer_form_changed = false;
  var customer_form_checksum = $("form[name='customer_form']").serialize();
  $("body").on('change keyup', "form[name='customer_form']", function(e) {
    if ($("form[name='customer_form']").serialize() != customer_form_checksum) {
      customer_form_changed = true;
      $("#box-checkout-customer button[name='set_addresses']").removeAttr('disabled');
    } else {
      customer_form_changed = false;
      $("#box-checkout-customer button[name='set_addresses']").attr('disabled', 'disabled');
    }
  });
  
  var timerSubmitCustomer;
  $("body").on('focusout', "form[name='customer_form']", function() {
    timerSubmitCustomer = setTimeout(
      function() {
        if (!$("form[name='customer_form']").is(':focus')) {
          if (customer_form_changed) {
            if (console) console.log("Autosaving customer details");
            $("form[name='customer_form']").trigger('submit');
          }
        }
      }, 50
    );
  });
  $("body").on('focusin', "form[name='customer_form']", function() {
    clearTimeout(timerSubmitCustomer);
  });
  
  $("body").on('submit', "form[name='customer_form']", function(e) {
    if (console) console.log("Saving customer details");
    e.preventDefault();
    clearTimeout(timerSubmitCustomer);
    //$('*').css('cursor', 'wait');
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_customer.html'); ?>',
      data: $(this).serialize()+'&set_addresses=true',
      type: 'post',
      cache: false,
      context: $('#checkout-customer-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-customer-wrapper').html(textStatus + ': ' + errorThrown);
      },
      success: function(data) {
        //$('#checkout-customer-wrapper').html(data);
        customer_form_changed = false;
        customer_form_checksum = $("form[name='customer_form']").serialize();
        refreshShipping();
        refreshPayment();
        refreshSummary();
      },
      complete: function() {
        $('*').css('cursor', '');
      }
    });
  });
  
  $("body").on('submit', "form[name='shipping_form']", function(e) {
    if (console) console.log("Saving shipping details");
    e.preventDefault();
    //$('*').css('cursor', 'wait');
    $('#checkout-shipping-wrapper').fadeTo('slow', 0.25);
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_shipping.html'); ?>',
      data: $(this).serialize(),
      type: 'post',
      cache: false,
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-shipping-wrapper').html(textStatus + ': ' + errorThrown).fadeTo('slow', 1);
      },
      success: function(data) {
        $('#checkout-shipping-wrapper').html(data).fadeTo('slow', 1);
        refreshPayment();
        refreshSummary();
      },
      complete: function() {
        $('*').css('cursor', '');
      }
    });
  });
  
  $("body").on('submit', "form[name='payment_form']", function(e) {
    if (console) console.log("Saving payment details");
    e.preventDefault();
    //$('*').css('cursor', 'wait');
    //$('#checkout-payment-wrapper').fadeTo('slow', 0.25);
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_payment.html'); ?>',
      data: $(this).serialize(),
      type: 'post',
      cache: false,
      context: $('#checkout-payment-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-payment-wrapper').html(textStatus + ': ' + errorThrown).fadeTo('slow', 1);
      },
      success: function(data) {
        alert(data);
        $('#checkout-payment-wrapper').html(data).fadeTo('slow', 1);
        refreshSummary();
      },
      complete: function() {
        $('*').css('cursor', '');
      }
    });
  });
  
  $("body").on('blur', "form[name='comments_form']", function(e) {
    if (console) console.log("Saving comments");
    e.preventDefault();
    //$('*').css('cursor', 'wait');
    $('#checkout-comments-wrapper').fadeTo('slow', 0.25);
    $.ajax({
      url: '<?php echo document::ilink('ajax/checkout_comments.html'); ?>',
      data: $(this).serialize(),
      type: 'post',
      cache: false,
      context: $('#checkout-comments-wrapper'),
      dataType: 'html',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        if (console) console.warn("Error");
        $('#checkout-comments-wrapper').html(textStatus + ': ' + errorThrown).fadeTo('slow', 1);
      },
      success: function(data) {
        $('#checkout-comments-wrapper').html(data).fadeTo('slow', 1);
      },
      complete: function() {
        $('*').css('cursor', '');
      }
    });
  });
</script>