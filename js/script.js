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
            url: 'http://localhost:8000/reserve.php',
            data: {
                exhibitorId: exhibitorId,
                spots: reservedSpots
            },
            dataType: 'json',
            success: function (result) {
                console.log(result);
                $finishButton.html('<strong>Finish Order</strong>');
                $finishButton.removeClass('disabled');
                window.location = 'http://localhost:8000/map.php';
            }
        });
    });

    (function doPoll() {
        $.get('http://localhost:8000/get_reserved_spots.php', function(data) {
            $('.custom-area').each(function() {
                if(data.indexOf($(this).text()) !== -1) {
                    reservedSpots.spliceByValue($(this).text());
                    renderSelectedSpots();
                    $(this).addClass('reserved');
                }
            });
            setTimeout(doPoll, 1000);
        })
    })();

    $('.custom-area').on('click', function (e) {
        var spot = $(this).text();
        if (reservedSpots.indexOf(spot) !== -1) {
            alert('You have already selected this spot');
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
