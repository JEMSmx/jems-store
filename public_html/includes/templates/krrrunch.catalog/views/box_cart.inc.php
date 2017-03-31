<li class="nav-item"><a class="nav-link carrito-link" href="<?php echo htmlspecialchars($link); ?>">Carrito <span class="item-number">(<?php echo $num_items ?>)</span> <img src="{snippet:template_path}assets/images/cart-icon.svg" alt="#TODO" /></a></li>
<script>
  function updateCart() {
    $.ajax({
      url: '<?php echo document::ilink('ajax/cart.json'); ?>',
      type: 'get',
      cache: false,
      async: true,
      dataType: 'json',
      beforeSend: function(jqXHR) {
        jqXHR.overrideMimeType("text/html;charset=<?php echo language::$selected['charset']; ?>");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        //alert('Error');
      },
      success: function(data) {
        $('.item-number').html("("+data['quantity']+")");
        $('.nav-cart__number').text(data['quantity']);
      },
      complete: function() {
        $('*').css('cursor', '');
      }
    });
  }
  var timerCart = setInterval("updateCart()", 60000); // Keeps session alive
</script>