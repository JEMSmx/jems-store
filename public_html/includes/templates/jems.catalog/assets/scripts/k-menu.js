(function() {
  var
  navbar = document.getElementsByClassName("k-navbar")[0],
  ctrl_hamburger = document.getElementsByClassName("k-navbar-hamburger")[0],
  ctrl_close     = document.getElementsByClassName("k-navbar-close")[0];

  ctrl_hamburger.addEventListener("click", function() {
    document.body.style.position = "fixed";
    navbar.className += " k-as-overlay";
  });

  ctrl_close.addEventListener("click", function() {
    document.body.style.position = "";
    navbar.className = navbar.className.replace(" k-as-overlay", "");
  });
})();

// remover elemento 

$(function() {
    var product = $('.k-cart-products__row');
    var button = $('.remove-product');
    
    $(button).click(function() {
        if ($(this).attr('data-close') == product.attr('data-product')) {
           
        }
    });
    
});