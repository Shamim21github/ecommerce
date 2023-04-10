<script src="admin/js/cart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    $(function() {

        let cart = new Cart("ecom_order");
        
        cart_load();

        $(".add-cart").on("click", function() {
            console.log("ok")
            let id = $(this).data("id");

            $.ajax({
                type: 'POST',
                url: "admin/api/ProductApi/find",
                data: {
                    "id": id
                },
                success: function(res) {
                    let data = JSON.parse(res);
                    let item = {
                        item_id: id,
                        qty: 1,
                        price: data.product.offer_price,
                        name: data.product.name,
                        discount: 0,
                        photo: data.product.photo
                    };
                    cart.save(item);


                    cart_load();


                    toastr.success('Added to cart');
                }
            });

        });

        $("body").on("click", ".delete", function() {

            let id = $(this).parent().data("id");


            cart.delItem(id);
            //$(this).parent().remove();
            cart_load();
        });

        $("body").on("click", ".btn-add", function() {

            let id = $(this).parent().parent().parent().data("id");


            cart.QtyUp(id, 1);
            //$(this).parent().remove();
            cart_load();
        });

        $("body").on("click", ".btn-sub", function() {

            let id = $(this).parent().parent().parent().data("id");


            cart.QtyUp(id, -1);
            //$(this).parent().remove();
            cart_load();
        });

        $("body").on("click",".clear-cart",function(){
            cart.clearCart();
            cart_load();
              
        });


        //-------Helper Functions-----------

        function cart_load(){
            $("#minicart-product-list").html(get_html_cart());
            $(".cart-total").html(getCartTotal() + " BDT");
            $("#cart-count").html(get_cart_count());
        }

        function get_cart_count(){
            if(cart.getCart() != null){
                return cart.getCart().length;
            }
           
        }

        function get_html_cart() {
            let products = cart.getCart();
            let html = "";
            if (products != null) {

                let total = 0;

                products.forEach(function(v) {
                    html += `<li data-id=${v.item_id}>`;
                    html += "<a href='#' class='minicart-product-image'>";
                    html += `<img src='admin/img/${v.photo}' alt='cart products'>`;
                    html += "</a>";

                    html += "<div class='minicart-product-details'>";
                    html += `<h6><a href='#'>${v.name}</a></h6>`;
                    html += `<span>${v.price} x ${v.qty} = ${v.qty*v.price} BDT </span>`;
                    html += `<div><button class='btn-add'>+</button><button class='btn-sub'>-</button></div>`;
                    html += "</div>";

                    html += "<button class='close delete'>";
                    html += " <i class='fa fa-close'></i>";
                    html += "</button>";

                    html += "</li>";

                    // totol+=parseFloat(v.qty)*parseFloat(v.price);

                });

            } //end loop

            //$("#cart-total").html(total);

            return html;

        }

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