<script>
    $(document).ready(function() {



        // Shopping Cart
        $('.shopping__cart_form').on('submit', function(e) {
            e.preventDefault()
            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if (data.status == 'success') {
                        addSideBarCartProduct();
                        getCartCount();
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message);
                    }
                },
                error: function(data) {},
            })


        });
        // Number of productes Added to the cart
        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('count-cart') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                },
                error: function(data) {},
            })
        }
        //  Add product to the side bar
        function addSideBarCartProduct() {
            $.ajax({
                method: 'GET',
                url: "{{ route('add-product-side-bar') }}",
                success: function(data) {

                    $('.mini_cart_wrapper').html('');
                    let html = ''
                    for (item in data) {

                        let product = data[item];
                        html += ` <li id="mini_cart_${product.rowId}">
                 <div class="wsus__cart_img">
                     <a href="{{ url('product-details') }}/${product.options.slug}"><img src="{{ asset('/') }}${product.options.image}" alt="" class="img-fluid w-100" style="height: 70px; object-fit:cover;"></a>
                     <a class="wsis__del_icon remove_side_bar_product" href="#" data-id="${product.rowId}"><i class="fas fa-minus-circle"></i></a>
                 </div>
                 <div class="wsus__cart_text">
              <a class="wsus__cart_title" href="{{ url('product-details') }}/${product.options.slug}">${product.name}</a>
                     <p>{{ $settings->currency_icon }}${product.price}</p>
                     <small> Variant Total : {{ $settings->currency_icon }} ${product.options.Variant_total}</small><br>
                     <small>Qty : ${product.qty}</small>
                 </div>
               </li>`;
                    }
                    $('.mini_cart_wrapper').html(html);
                    calcSubTotalProduct();
                    $('.mini_cart_actions').removeClass('d-none');

                },
                error: function(data) {},
            })
        }

        // remove the product from the side bar 

        $('body').on('click', '.remove_side_bar_product', function(e) {
            e.preventDefault()
            let rowId = $(this).data('id');

            $.ajax({
                method: 'POST',
                url: "{{ route('remove-product-side-bar') }}",
                data: {
                    rowId: rowId
                },
                success: function(data) {
                    let productId = '#mini_cart_' + rowId;
                    $(productId).remove();
                    getCartCount();
                    calcSubTotalProduct();
                    if ($('.mini_cart_wrapper').find('li').length === 0) {
                        $('.mini_cart_wrapper').html(
                            '<li class="text-center"><code>Cart is empty!</code></li>');
                        $('.mini_cart_actions').addClass('d-none');

                    }

                },
                error: function(data) {
                    console.log(data)
                },
            })
        });

        function calcSubTotalProduct() {
            $.ajax({
                method: 'GET',
                url: "{{ route('sub-total-product') }}",
                success: function(data) {
                    console.log(data)
                    $('#subtotal_sidebar_product').text('{{ $settings->currency_icon }}' + data)

                },
                error: function(data) {},
            })
        }

        if ($('.mini_cart_wrapper').find('li').length === 0) {
            $('.mini_cart_wrapper').html(
                '<li class="text-center"><code>Cart is empty!</code></li>');
        }
    })
</script>
