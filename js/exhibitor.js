(function ($) {
    $(document).ready(function () {
        var $exhibitorForm = $('#exhibitor-form');
        var $submit = $('#submit-exhibitor-form');
        var $internationalVisitorForm = $('#international-visitor-form');

        var $formSelectors = $('#exhibitor-form, #international-visitor-form');

        $formSelectors.on('submit', function (e) {
            e.preventDefault();
            $submit.text('Loading').addClass('disabled');
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (msg) {
                    $submit.text('Registered successfully ... redirecting').removeClass('btn-primary').addClass('btn-success btn-block');
                    window.location = '/map.php';
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