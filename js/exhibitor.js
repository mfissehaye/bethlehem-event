(function ($) {
    $(document).ready(function () {
        var $exhibitorForm = $('#exhibitor-form');
        var $submit = $('#submit-exhibitor-form');
        $exhibitorForm.on('submit', function (e) {
            e.preventDefault();
            $submit.text('Loading').addClass('disabled');
            $.ajax({
                url: 'http://localhost:8000/create-exhibitor.php',
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (msg) {
                    $submit.text('Registered successfully ... redirecting').removeClass('btn-primary').addClass('btn-success btn-block');
                    window.location = 'http://localhost:8000/map.php';
                },
                error: function (err) {
                    $submit.text('Submit').removeClass('disabled');
                    throw(err);
                }
            });
            return false;
        })
    })
})(jQuery);