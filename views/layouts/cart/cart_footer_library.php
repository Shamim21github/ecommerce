 <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="js/main.js"></script>
       
        <?php
         include("views/layouts/common/site_cart_footer_library.php");
       ?>

      <script>
         
         $(function(){
            cart =new Cart("ecom_order");
            let products=cart.getCart();
            let html="";

            products.forEach(function(product){
               html+="<tr>";
               html+="<td class=\"li-product-remove\"><a href=\"#\"><i class=\"fa fa-times\"></i></a></td>";
               html+=`<td class="li-product-thumbnail"><a href="#"><img src="admin/img/${product.photo}" alt="${product.name}" width="100"></a></td>`;
               html+=`<td class="li-product-name"><a href="#">${product.name}</a></td>`;
               html+=`<td class="li-product-price"><span class="amount">${product.price}</span></td>`;
               html+=`<td class="quantity">`;
               html+=`<label>Quantity</label>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" value="${product.qty}" type="text">
                             <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                             <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                        </div>`;
               html+=`</td>
               <td class="product-subtotal"><span class="amount">${product.qty*product.price}</span></td>`;               
               html+="</tr>";
            });


            $("#cart").html(html);

         });

      </script>

    </body>

<!-- shopping-cart31:32-->
</html>
