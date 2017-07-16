Array.prototype.spliceByValue = function (value) {
    var self = this;
    self.forEach(function (v, i) {
        if (v === value) {
            self.splice(i, 1);
        }
    })
};

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // reserving logic
    var reservedSpots = [];
    var $finishButton = $('#finish-button');
    var $successMessage = $('#success-message').hide();
    var $warningMessage = $('#warning-message').hide();
    var $modalReservedSpots = $('#modal-reserved-spots').hide();
    var $submitExhibitorFormButton = $('#submit-exhibitor-form');
    var $exhibitorForm = $('#exhibitor-form');
    var $priceModal = $('#price-modal');
    var $totalPriceIndicator = $('#total-price-indicator');
    var $modalTotalPrice = $('#modal-total-price');
    var $modalPriceTable = $('#modal-price-table').hide();
    var submitted = false;

    $finishButton.on('click', function (e) {

        e.preventDefault();

        $priceModal.on('hidden.bs.modal', function () {
            if(!submitted) {
                $warningMessage.show();
                $priceModal.modal('show');
            }
        });

        $priceModal.on('show.bs.modal', function() {
            if(submitted) {
                $modalReservedSpots.hide();
                $modalPriceTable.hide();
            }
        });

        var getExhibitorFormData = function() {
            return {
                spots: reservedSpots,
                'company-name': $('#company-name').val(),
                'region': $('#region').val(),
                'town': $('#town').val(),
                'h-no': $('#h-no').val(),
                'tel': $('#tel').val(),
                'fax': $('#fax').val(),
                'mob': $('#mob').val(),
                'email': $('#email').val(),
                'passport-no': $('#passport-no').val(),
                'web': $('#web').val(),
                'business-type': $('#business-type').val(),
            }
        };

        $exhibitorForm.on('submit', function (e) {
            e.preventDefault();
            $submitExhibitorFormButton.addClass('disabled');
            $submitExhibitorFormButton.text('Loading');
            var postData = {};
            $.ajax({
                type: 'POST',
                url: '/src/reserve.php',
                data: getExhibitorFormData(),
                dataType: 'json',

                success: function (result) {
                    if (result.status === 'success') {
                        $submitExhibitorFormButton.removeClass('disabled');
                        $submitExhibitorFormButton.removeClass('Submit');
                        $priceModal.scrollTop(0);
                        $warningMessage.hide();
                        $successMessage.show();
                        $exhibitorForm.remove();

                        $modalPriceTable.show();
                        reservedSpots.forEach(function (v, i) {
                            $modalReservedSpots.show();
                            $modalReservedSpots.find('#modal-spots').append('<span style="width: 20px; height: 20px; background: greenyellow; color: black; font-weight: bolder; font-size: 10px; display: inline-block; text-align: center; line-height: 20px; margin: 10px;">' + v + '</span>');
                        });
                    } else {

                    }

                    submitted = true;
                },
                error: function (xhr, errType, errMsg) {
                    $finishButton.html('<strong>Finish Order</strong>');
                    $finishButton.removeClass('disabled');
                    $(xhr.responseText).appendTo($priceModal.find('.modal-body'));
                }
            });
        });

        $totalPriceIndicator.on('mouseenter', function () {
            $modalTotalPrice.css({
                'background-color': '#337ab7',
                'color': 'white',
                'font-size': '28px'
            });
            var blue = '#337ab7';
            var color = 'white';
            var background = blue;
            var count = 0;
            var toggleBackground = function() {
                setTimeout(function() {
                    color = color === blue ? 'white' : blue;
                    background = background === blue ? 'white' : blue;
                    $modalTotalPrice.css({
                        'background-color': background,
                        'color': color
                    });
                    if(count < 6) {
                        toggleBackground();
                    }
                }, 200);
                count++;
            };
            toggleBackground();
        });
    });

    (function doPoll() {
        $.get('/src/get_reserved_spots.php', function (data) {
            reserveCustomAreas(data);
            setTimeout(doPoll, 1000);
        })
    })();

    function reserveCustomAreas(areaLabels) {
        $('.custom-area').each(function (i, v) {
            if (areaLabels.indexOf($(v).text()) !== -1) {
                reservedSpots.spliceByValue($(v).text());
                $(v).addClass('reserved');
            }
        });
        renderSelectedSpots();
    }

    $('.custom-area').on('click', function (e) {
        var spot = $(this).text();
        if (reservedSpots.indexOf(spot) !== -1) {
            reservedSpots.spliceByValue(spot);
            renderSelectedSpots();
        }
        else if (!$(this).hasClass('reserved')) {
            reservedSpots.push(spot);
            renderSelectedSpots();
            calculatePrice();
        }
    });

    $('.reserved-spots-container').on('click', '.spot', function () {
        var spot = $(this).text();
        reservedSpots.forEach(function (value, index) {
            if (value === spot) {
                reservedSpots.splice(index, 1);
            }
        });
        renderSelectedSpots();
        calculatePrice();
    }).on('mouseenter', '.spot', function () {
        $('.custom-area').each(function (i, v) {
            console.log($(v).text());
            if ($(v).text() === $(this).text()) {
                $(this).addClass('hovered');
            }
        })
    }, function () {
        $('.custom-area').removeClass('hovered');
    });

    function renderSelectedSpots() {
        // rendering reserved spots
        var $reservedSpotsContainer = $('.reserved-spots-container').html('');
        var reservedSpotTemplate = '<span class="spot" data-toggle="tooltip" title="Click to delete selection"></span>';
        reservedSpots.forEach(function (value, index) {
            $reservedSpotsContainer.append($(reservedSpotTemplate).text(value));
        });

        // coloring spots on map
        var $customArea = $('.custom-area').removeClass('selected');
        $customArea.each(function (v, i) {
            if (reservedSpots.indexOf($(this).text()) !== -1) {
                $(this).addClass('selected');
            }
        })
    }

    function calculatePrice() {
        var $spacesCount = $('#spaces-count');
        var $price = $('#price');
        var $totalPrice = $('#total-price');

        $finishButton.addClass('disabled');

        var count = reservedSpots.length;
        var price = 115 * count;
        $spacesCount.text(count);
        $price.text(price);
        $totalPrice.text(price + 20);
        if (count > 0) {
            $finishButton.removeClass('disabled');
        }
    }
});
