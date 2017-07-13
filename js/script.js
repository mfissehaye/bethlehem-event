Array.prototype.spliceByValue = function(value) {
    var self = this;
    self.forEach(function(v, i) {
        if(v === value) {
            self.splice(i, 1);
        }
    })
};

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // reserving logic
    var reservedSpots = [];
    var $finishButton = $('#finish-button');

    $finishButton.on('click', function (e) {
        e.preventDefault();
        $finishButton.addClass('disabled');
        $finishButton.text('Loading');
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/reserve.php',
            data: {
                exhibitorId: exhibitorId,
                exhibitorEmail: exhibitorEmail,
                spots: reservedSpots
            },
            dataType: 'json',
            success: function (result) {
                console.log(result);
                if(result.status === 'success') {
                    $finishButton.html('<strong>Finish Order</strong>');
                    $finishButton.removeClass('disabled');

                    var $priceModal = $('#price-modal');
                    $priceModal.modal('show');
                    var $modalSpots = $('#modal-spots');
                } else {
                    throw new Error('Unable to complete request: ', result);
                }
            },
            error: function(xhr, errType, errMsg) {
                $finishButton.html('<strong>Finish Order</strong>');
                $finishButton.removeClass('disabled');
                console.log(errMsg);
            }
        });
    });

    (function doPoll() {
        $.get('http://localhost:8000/get_reserved_spots.php', function(data) {
            reserveCustomAreas(data);
            setTimeout(doPoll, 1000);
        })
    })();

    function reserveCustomAreas(areaLabels) {
        areaLabels = JSON.parse(areaLabels);
        $('.custom-area').each(function(i, v) {
            if(areaLabels.indexOf($(v).text()) !== -1) {
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
    }).on('mouseenter', '.spot', function() {
        $('.custom-area').each(function(i, v) {
            console.log($(v).text());
            if($(v).text() === $(this).text()) {
                $(this).addClass('hovered');
            }
        })
    }, function() {
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
