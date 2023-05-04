$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    const baseUrl = $('meta[name="base-url"]').attr("content");

    // add item
    $(document).on("click", ".btn-cart-add", function() {
        const id = $(this).attr("data-id");
        const endpointUrl = baseUrl + "/cart/add";

        $.ajax({
            type: "POST",
            url: endpointUrl,
            data: { id },
            success: function(response) {
                $('#cart-count').text((Object.keys(response.cart).length));
                $('#cart-add-toast').toast('show');
            },
            error: function (err) {
                // console.log(err.statusText);
                $('#error-toast').toast('show');
            }
        });
    });

    // update item
    $(document).on("click", ".btn-cart-update", function() {
        const id = $(this).attr("data-id");
        const quantity = $("#item-" + id + "-quantity").val();
        const endpointUrl = baseUrl + "/cart/update";

        $.ajax({
            type: "PUT",
            url: endpointUrl,
            data: { id, quantity },
            success: function(response) {
                // update total
                $('#cart-update-toast').toast('show');
                $('#cart-count').text((Object.keys(response.cart).length));

                $('#item-' + id + '-total').text("Php " + response.itemTotal);
                $('#cart-subtotal').text("Php " + response.subtotal);
                $('#cart-shipping').text("Php " + response.totalSF);
                $('#cart-discount').text("Php " + response.discount);
                $('#cart-total').text("Php " + response.total);
            },
            error: function (err) {
                // console.log(err.statusText);
                $('#error-toast').toast('show');
            }
        });
    });

    // remove item
    $(document).on("click", ".btn-cart-remove", function() {
        const id = $(this).attr("data-id");
        const endpointUrl = baseUrl + "/cart/remove";

        $.ajax({
            type: "DELETE",
            url: endpointUrl,
            data: { id },
            success: function(response) {
                if (Object.keys(response.cart).length <= 0) {
                    return window.location.reload();
                }

                // update total
                $('#cart-remove-toast').toast('show');
                $("#item-" + id).remove();
                $('#cart-count').text((Object.keys(response.cart).length));
                $('#cart-subtotal').text("Php " + response.subtotal);
                $('#cart-shipping').text("Php " + response.totalSF);
                $('#cart-discount').text("Php " + response.discount);
                $('#cart-total').text("Php " + response.total);
            },
            error: function (err) {
                // console.log(err.statusText);
                $('#error-toast').toast('show');
            }
        });
    });

    // destory cart
    $(document).on("click", ".btn-cart-destroy", function() {
        const endpointUrl = baseUrl + "/cart/destroy";

        $.ajax({
            type: "DELETE",
            url: endpointUrl,
            data: {},
            success: function(response) {
                console.log(response);
                $('#cart-toast').toast('show');
            },
            error: function (err) {
                // console.log(err.statusText);
                $('#error-toast').toast('show');
            }
        });
    });

    // wishlist add item
    $(document).on("click", ".btn-wishlist-add", function() {
        const id = $(this).attr("data-id");
        console.log(id);
        $('#wishlist-toast').toast('show');
    });

    // featured product
    $(document).on("click", ".btn-featured", function() {
        const id = $(this).attr("data-id");

        const endpointUrl = baseUrl + "/cart/featured";

        $.ajax({
            type: "POST",
            url: endpointUrl,
            data: { product_id:id },
            success: function(response) {
                $('#featured-toast').toast('show');
            },
            error: function (err) {
                $('#error-toast').toast('show');
            }
        });

    });
});
