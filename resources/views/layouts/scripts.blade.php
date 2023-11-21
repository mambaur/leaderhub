<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ url('/') }}/admin-assets/js/jquery-ui.min.js"></script>

<script>
    let productUrl = "{{ route('produk_data') }}"
    $('#product_name').autocomplete({
        change: function(event, ui) {
            console.log($('#product_name').val())
        },
        source: function(request, response) {
            $.ajax({
                url: productUrl,
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.length == 0) {
                        $('#product_id').val("");
                    }
                    response(data);
                }
            });
        },
        select: function(event, ui) {

            if (ui.item.id != null) {
                $(this).val(ui.item.value);
                window.location.href =
                    "/produk/" + ui.item.slug;
            }
            return false;
        },
    });
</script>
