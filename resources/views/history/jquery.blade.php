<script>
    $(document).ready(function () {

    $('#formHistory').validate({ // initialize the plugin

        rules: {
            product_id: {
                required: true,
                maxlength: 200,
                minlength: 1,

            },
            amount: {
                required: true,
                maxlength: 11,
                minlength: 1,
                min: 1,
                digits: true,
            },

            store_id: {
                required: true,
            },

            type: {
                required: true,
            }
        }
    });

});
</script>


