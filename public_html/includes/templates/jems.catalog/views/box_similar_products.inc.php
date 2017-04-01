<main class="main-product-block">
    <div class="k-workspace">
        <div class="k-wrap k-wrap--fluid">
        <h3><?php echo language::translate('title_similar_products', 'Similar Products'); ?></h3>
            <ul class="k-prod-thumbs">
            	<?php foreach ($products as $product) echo functions::draw_listing_product($product, 'krrrunch'); ?>
            </ul>
        </div>
    </div>
</main>
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