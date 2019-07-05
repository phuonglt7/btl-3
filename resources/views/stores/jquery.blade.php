<script>
    $(document).ready(function () {
    $('#formStore').validate({

        rules: {

            store_name: {

                required: true,
                maxlength: 200,
                minlength: 1

            },

            user_id: {

                required: true,
            },
        }
    });
});
</script>