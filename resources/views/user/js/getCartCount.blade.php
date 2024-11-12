<script>
    function getCartCount() {
        $.ajax({
            url: '{{ route('user.cart.count') }}',
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('.icon-shopping-basket').attr('data-icon-label', response.message.count);
            },
            error: function(error) {
                console.log(error);
            },
        });
    }
</script>