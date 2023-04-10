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

           cart=new Cart("ecom_order");
                
            $("#btn-place-order").on("click",function(){
                
                $.ajax({
                    url:'admin/api/CustomerApi/getSessionCustomer',
                    type:'get',
                    success:function(res){
                        let customer=JSON.parse(res);                       
                        customer=customer.customer;
                        if(customer!=null){
                           
                          //alert("Success");

                       
                        let customer_id = customer.id;
                       
                      
                        let order_date=null;
                        let delivery_date = null;

                        let discount = 0;
                        let vat = 0;
                        let remark=$("#txtOrderNote").val();

                        //Shipping address
                        let name="";                     
                        let country="";
                        let city="";                 
                        let street_address="";
                        
                        let apartment="";
                        let postcode="";
                        let email="";
                        let mobile="";

                        let shipping_address="";                       

                        
                        let chkShipping=$("#ship-box");

                        if(chkShipping.is(":checked")){

                             
                          

                        }else{
                            name=$("#txtDefaultFirstName").val()+" "+$("#txtDefaultLastName").val();                        
                            country=$("#countryDefault").find('option:selected').text();
                            city=$("#txtDefaultCity").val();                    
                            street_address=$("#txtDefaultStreetAddress").val();
                            
                            apartment=$("#txtDefaultApartment").val();
                            postcode=$("#txtDefaultPostcode").val();
                            email=$("#txtDefaultEmail").val();
                            mobile=$("#txtDefaultMobile").val();

                            shipping_address=`
                            ${name}\n
                            ${apartment}\n
                            ${street_address}\n
                            City:${city},Postcode:${postcode}\n
                            Country:${country}\n
                            Mobile:${mobile}
                            `;

                          //console.log("Not Checked");

                        }
                                            
                         
                        let products = cart.getCart();

                        let order_total=getCartTotal();

                        //console.log(order_total);
                        //console.log(products);

                        
                            $.ajax({
                                url: 'admin/api/orderapi/save',
                                type: 'POST',
                                data: {
                                "customer_id": customer_id,
                                "order_date": order_date,
                                "delivery_date": delivery_date,
                                "shipping_address": shipping_address,
                                "discount": discount,
                                "vat": vat,
                                "remark": remark,
                                "order_total": order_total,
                                "products": products
                                },
                                success: function(res) {
                                    toastr.success('Order have been placed successfully');
                                    cart.clearCart();                  
                               
                                }
                            });
                         


                        }else{

                            //alert("login");
                            window.location="login"
                        }

                    }

                });

                
            });


            //-----------------------Helpler---------------

            function getCartTotal() {
            let products = cart.getCart();
            let total = 0;
            if (products != null) {

                products.forEach(function(v) {
                    total += parseFloat(v.qty) * parseFloat(v.price);
                });

            }
            return total;
        }


          });


      </script>


    </body>

<!-- checkout31:27-->
</html>