<div id="box-also-purchased-products" class="box">
  <h3 class="title"><?php echo language::translate('title_also_purchased_products', 'Also Purchased Products'); ?></h3>
  <div class="content">
    <?php if ($products) { ?>
    <ul class="listing-wrapper products">
      <?php foreach ($products as $product) echo functions::draw_listing_product($product, 'column'); ?>
    </ul>
    <?php } ?>
  </div>
</div>
<script type="text/javascript">
function addProduct(number_product){
        $('*').css('cursor', 'wait');
        swal({   
              title: "¿Que deseas realizar?",   
              text: "",   
              type: "success",   
              showCancelButton: true,   
              confirmButtonColor: "#19b359",
              cancelButtonColor: "#000c37",   
              confirmButtonText: "Agregar a carrito",   
              cancelButtonText: "Ver más" }, 
              function(isConfirm){   
                  if(isConfirm){
                      $.ajax({
                        url: '<?php echo document::ilink('ajax/cart.json'); ?>',
                        data: 'product_id='+number_product+'&add_cart_product=true',
                        type: 'post',
                        cache: false,
                        async: true,
                        dataType: 'json',
                        beforeSend: function(jqXHR) {
                          jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                          //alert("Error\n"+ jqXHR.responseText);
                          alert("Error");
                        },
                        success: function(data) {
                          $("#numberCart").text("Carrito ("+data['quantity']+")");
                              swal({
                                title: "Se agrego el producto al carrito",
                                text: "",
                                type: "success",
                                timer: 2200,
                                showConfirmButton: false
                              });
                        },
                        complete: function() {
                          $('*').css('cursor', '');
                        }
                      });
                  }
                  else{
                    window.location='';
                  }
                    
              });
    }
</script>