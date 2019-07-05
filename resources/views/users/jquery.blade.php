<script>
        $(document).ready(function () {

    $('#formUser').validate({ // initialize the plugin

        rules: {

            username: {
                required: true,
                maxlength: 200,
                minlength: 1

            },

            email: {

                required: true,
                email: true,
                maxlength: 200,
                minlength: 1
            },
        }
    });
});
</script>