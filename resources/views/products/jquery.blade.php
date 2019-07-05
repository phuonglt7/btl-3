<script>
        $(document).ready(function () {

    $('#formProduct').validate({ // initialize the plugin

        rules: {

            product_name: {
                required: true,
                maxlength: 200,
                minlength: 1

            }
        }
    });
});
</script>