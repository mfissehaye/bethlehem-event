<?php
session_start();
$image_width = 585;
$image_height = 448;
require_once('coordinates.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the Expo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        #map-container {
            position: relative;
            background: #eeeeee;
            height: <?php echo $image_height ?>px;
            width: 100%;
        }
        #custom-map, img {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            margin: 0 auto;
            width: <?php echo $image_width ?>px;
            height: <?php echo $image_height ?>px;
        }

        #custom-map {
            z-index: 10;
        }

        .custom-area, .reserved-spots .spot {
            display: inline-block;
            width: 18px;
            height: 18px;
            background: #70d869;  /*For diagnosis*/
            z-index: 10;
            font-size: 11px;
            color: #66ac76;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            cursor: pointer;
        }

        .reserved-spots .spot {
            color: #000;
            margin: 0 3px;
        }

        .custom-area {
            position: absolute;
        }

        .custom-area.rotate {
            transform: rotate(45deg);
        }

        .custom-area.reserved {
            background: #e15b5c;
            color: #b63846;
        }

        .reserved-spots {
            position: absolute;
            right: 0;
            top: 0;
            width: 350px;
            padding: 20px;
        }

        .reserved-spots h1 {
            font-size: 14px;
            font-weight: bolder;
        }

        hr {
            border-color: #dddddd;
        }
        .red-tooltip .tooltip > .tooltip-inner {background-color: #f00;}
    </style>
</head>
<body>

<div>
    <div class="text-center" id="map-container">
        <div id="custom-map">
	        <?php foreach ( $coordinates as $index => $coordinate ): ?>
                <?php $reserved = isset($coordinate['reserved']) && $coordinate['reserved'] ?>
                <?php $additional_classes = isset($coordinate['rotate']) && $coordinate['rotate'] ? ' rotate' : ''; ?>
                <?php $additional_classes .= $reserved ? ' reserved' : ''; ?>
                <span class="custom-area red-tooltip <?php echo $additional_classes ?>" style="left: <?php echo $coordinate['x'] ?>px; top: <?php echo $coordinate['y'] ?>px" <?php if($reserved) echo 'data-toggle="tooltip" title="This spot is reserved"' ?>><?php echo $index ?></span>
	        <?php endforeach ?>
        </div>
        <img src="img/map.jpg" alt="">
        <div class="reserved-spots text-left">
            <h1 class="text-uppercase">Locations Reserved</h1>
            <small class="nothing-selected text-muted ">You haven't reserved anything yet. Click on one of the boxes inside the picture on the left to reserve spots on the event.</small>
            <div class="reserved-spots-container">
                <span class="spot" data-toggle="tooltip" title="Click to delete selection">1</span>
                <span class="spot" data-toggle="tooltip" title="Click to delete selection">45</span>
                <span class="spot" data-toggle="tooltip" title="Click to delete selection">56</span>
            </div>
            <hr>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        // reserving logic
        var $reservedSpots = [];
        var reservedSpotTemplate = '<span class="spot" data-toggle="tooltip" title="Click to delete selection"></span>';
        $('.custom-area').on('click', function(e) {
            ($('.reserved-spots-container')).append($(reservedSpotTemplate).text($(this).text()));
        })
    })
</script>
</body>
</html>