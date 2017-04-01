<input type="hidden" value="<?php echo $image['original']; ?>" id="1"> 
<?php if ($extra_images) { ?>  
  <?php foreach ($extra_images as $value=>$image) {  ?>
    <input type="hidden" value="<?php echo $image['thumbnail']; ?>" id="<?php echo $value+2; ?>"/>
  <?php } ?>
<?php } ?>
<main class="main-product">
  <div class="k-workspace">
    <div class="k-wrap">
      <div class="grid">
        <div class="unit half">
          <div class="k-prod-img">
            <div class="k-prod-img_main"><img src="<?php echo $image['original']; ?>" alt="<?php echo $name ?>" /></div>
            <?php if ($extra_images) { ?>  
            <ul class="k-prod-img_prevs grid no-stacking-on-mobiles">
            <?php foreach ($extra_images as $image) {  ?>
              <li class="unit one-third">
                <span class="img-wrap"><img src="<?php echo $image['thumbnail']; ?>" alt="<?php echo $name ?>" /></span>
              </li>
                <?php } ?>
            </ul>
          <?php } ?>
          </div>
        </div>
        <div class="unit half">
          <div class="k-prod-info">
            <div class="k-info-block k-main-info">
              <h2 class="k-info-block_name"><?php echo $name ?></h2>
              <p class="k-info-block_key"><?php if ($code) echo $code ?></p>
            </div>
            <div class="k-info-block k-price-info">
              <p class="k-info-block_price"><span><?php echo $regular_price; ?></span> <span>+ Envio</span></p>
              <ul class="k-info-block_social">
                <li id="sharedFacebook"><a href="javascript:void(0);" target="_blank" rel="noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.196 112.196" role="img" aria-labelledby="facebookIcon facebookDesc">
                  <title id="facebookIcon">Página de Facebook</title><desc id="facebookDesc">Visita nuestro sitio en Facebook</desc>
                  <circle cx="56.098" cy="56.098" r="56.098" fill="#3B5998"/>
                  <path d="M70.201 58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34c0-5.964 2.833-15.303 15.301-15.303l11.234.047v12.51h-8.151c-1.337 0-3.217.668-3.217 3.513v7.585h11.334l-1.325 12.876z" fill="#FFF"/>
                </svg></a></li>
                <li><a class="popup" href="https://plus.google.com/share?url=<?php echo $link; ?>" target="_blank" rel="noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.196 112.196" role="img" aria-labelledby="googleIcon googleDesc">
                 <title id="googleIcon">Página de Google plus</title><desc id="googleDesc">Visita nuestro sitio en Google Plus</desc>
                 <circle cx="56.098" cy="56.097" r="56.098" fill="#DC4E41"/>
                 <path d="M19.531 58.608c-.199 9.652 6.449 18.863 15.594 21.867 8.614 2.894 19.205.729 24.937-6.648 4.185-5.169 5.136-12.06 4.683-18.498-7.377-.066-14.754-.044-22.12-.033-.012 2.628 0 5.246.011 7.874 4.417.122 8.835.066 13.252.155-1.115 3.821-3.655 7.377-7.51 8.757-7.443 3.28-16.94-1.005-19.282-8.813-2.827-7.477 1.801-16.5 9.442-18.675 4.738-1.667 9.619.21 13.673 2.673 2.054-1.922 3.976-3.976 5.864-6.052-4.606-3.854-10.525-6.217-16.61-5.698-11.939.142-22.387 11.164-21.934 23.091zm59.571-9.94c-.022 2.198-.045 4.407-.056 6.604-2.209.022-4.406.033-6.604.044v6.582c2.198.011 4.407.022 6.604.045.022 2.198.022 4.395.044 6.604 2.187 0 4.385-.011 6.582 0 .012-2.209.022-4.406.045-6.615 2.197-.011 4.406-.022 6.604-.033v-6.582c-2.197-.011-4.406-.022-6.604-.044-.012-2.198-.033-4.407-.045-6.604-2.197-.001-4.384-.001-6.57-.001z" fill="#DC4E41"/>
                 <path d="M19.531 58.608c-.453-11.927 9.994-22.949 21.933-23.092 6.085-.519 12.005 1.844 16.61 5.698-1.889 2.077-3.811 4.13-5.864 6.052-4.054-2.463-8.935-4.34-13.673-2.673-7.642 2.176-12.27 11.199-9.442 18.675 2.342 7.808 11.839 12.093 19.282 8.813 3.854-1.38 6.395-4.936 7.51-8.757-4.417-.088-8.835-.033-13.252-.155-.011-2.628-.022-5.246-.011-7.874 7.366-.011 14.743-.033 22.12.033.453 6.439-.497 13.33-4.683 18.498-5.732 7.377-16.322 9.542-24.937 6.648-9.143-3.003-15.792-12.214-15.593-21.866zm59.571-9.94h6.57c.012 2.198.033 4.407.045 6.604 2.197.022 4.406.033 6.604.044v6.582c-2.197.011-4.406.022-6.604.033-.022 2.209-.033 4.406-.045 6.615-2.197-.011-4.396 0-6.582 0-.021-2.209-.021-4.406-.044-6.604-2.197-.023-4.406-.033-6.604-.045v-6.582c2.198-.011 4.396-.022 6.604-.044.011-2.196.033-4.405.056-6.603z" fill="#FFF"/>
               </svg></a></li>
               <li><a  class="popup" href="http://twitter.com/intent/tweet?text=<?php echo $name ?>&url=<?php echo $link; ?>" target="_blank" rel="noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 112.197 112.197" role="img" aria-labelledby="twitterIcon twitterDesc">
                <title id="twitterIcon">Página de Twitter</title><desc id="twitterDesc">Visita nuestro sitio en Twitter</desc>
                <circle cx="56.099" cy="56.098" r="56.098" fill="#55ACEE"/>
                <path d="M90.461 40.316c-2.404 1.066-4.99 1.787-7.702 2.109 2.769-1.659 4.894-4.284 5.897-7.417-2.591 1.537-5.462 2.652-8.515 3.253-2.446-2.605-5.931-4.233-9.79-4.233-7.404 0-13.409 6.005-13.409 13.409 0 1.051.119 2.074.349 3.056-11.144-.559-21.025-5.897-27.639-14.012-1.154 1.98-1.816 4.285-1.816 6.742 0 4.651 2.369 8.757 5.965 11.161-2.197-.069-4.266-.672-6.073-1.679-.001.057-.001.114-.001.17 0 6.497 4.624 11.916 10.757 13.147-1.124.308-2.311.471-3.532.471-.866 0-1.705-.083-2.523-.239 1.706 5.326 6.657 9.203 12.526 9.312-4.59 3.597-10.371 5.74-16.655 5.74-1.08 0-2.15-.063-3.197-.188 5.931 3.806 12.981 6.025 20.553 6.025 24.664 0 38.152-20.432 38.152-38.153 0-.581-.013-1.16-.039-1.734 2.622-1.89 4.895-4.251 6.692-6.94z" fill="#F1F2F2"/>
              </svg></a></li>
            </ul>
          </div>
          <?php echo functions::form_draw_form_begin('buy_now_form'); ?>
    <?php echo functions::form_draw_hidden_field('product_id', $product_id); ?>
          <div class="k-info-block k-ammount-info">
            <div class="k-info-block_quantity"><label for="prodCantidad">Cantidad</label> <input id="prodCantidad" type="number" name="quantity" value="1" required min="1"/></div>
            <?php if ($quantity > 0) { ?>
            <div class="k-info-block_available">Disponible en stock</div>
          <?php } else { ?>
            <?php if ($sold_out_status_value) { ?>
              <div class="k-info-block_available"><?php echo $sold_out_status_value; ?></div>
            <?php } else { ?>
              <div class="k-info-block_available"><?php echo language::translate('title_sold_out', 'Sold Out'); ?></div>
            <?php } ?>
          <?php } ?>
            <a  onclick="addCart(); return false;" href="#" class="k-btn k-info-block_action-btn">Agregar al carrito</a>
            <?php echo functions::form_draw_form_end(); ?>
            <div class="k-info-block_legend"><span>Refuerzo invitación compra</span></div>
          </div>
          <div class="k-info-block k-description-info">
            <div class="k-info-block_desc">
              <h4>Descripción</h4>
              <p><?php echo $description; ?></p>
            </div>
          </div>
          <?php if($attributes){ ?> 
            <div class="k-prod-specs">
              <h4 class="k-prod-specs_title">Ficha Técnica</h4>
              <table class="k-prod-specs_table">
                <tbody>
                <?php
                  for ($i=0; $i<count($attributes); $i++) {
                    if (strpos($attributes[$i], ':') !== false) {
                      @list($key, $value) = explode(':', $attributes[$i]);
                      echo '<tr>' . PHP_EOL
                         . '  <td>'. trim($key) .'</td>' . PHP_EOL
                         . '  <td>'. trim($value) .'</td>' . PHP_EOL
                         . '</tr>' . PHP_EOL;
                    } 
                  }
                ?>
                </tbody>
              </table>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
function addCart(){
  var form = $("form[name='buy_now_form']");
        $('*').css('cursor', 'wait');
        $.ajax({
          url: '<?php echo document::ilink('ajax/cart.json'); ?>',
          data: form.serialize() + '&add_cart_product=true',
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
            if (data['alert']){
                $('.k-prod-error').text(data['alert']);
                $('#error_select').css('border', 'solid #d9534f 2px');
            }else{
              $('.nav-cart__number').text(data['quantity']);
              $('.item-number').html("("+data['quantity']+")");
              swal({   
              title: "Se agregó un producto al carrito de compras",   
              text: "",   
              type: "success",   
              showCancelButton: true,   
              confirmButtonColor: "#19b359",
              cancelButtonColor: "#000c37",   
              confirmButtonText: "Pagar ahora",   
              cancelButtonText: "Seguir comprando",   
              closeOnConfirm: false }, 
              function(isConfirm){   
                  if(isConfirm)
                    window.location.href="<?php echo document::ilink('checkout'); ?>";
                  
              });
            }
            
          },
          complete: function() {
            $('*').css('cursor', '');
          }
        });
}

  $('.popup').click(function(event) {
    var width  = 575,
    height = 400,
    left   = ($(window).width()  - width)  / 2,
    top    = ($(window).height() - height) / 2,
    url    = this.href,
    opts   = 'status=1' +
             ',width='  + width  +
             ',height=' + height +
             ',top='    + top    +
             ',left='   + left;
    window.open(url, 'twitter', opts);
    return false;
});

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '389469551423485',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  
  document.getElementById('sharedFacebook').onclick = function() {
  FB.ui({
    method: 'share',
    mobile_iframe: true,
    title: '<?php echo $name?>',
    description:'<?php echo $short_description; ?>',
    caption: 'Ecoled',
    picture: '<?php echo document::ilink($image['thumbnail_2x']); ?>',
    href: '<?php echo $link ?>',
  }, function(response){});
}
</script>