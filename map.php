<?php

session_start();

$image_width  = 585;
$image_height = 448;
if(!isset($_SESSION['exhibitor_data'])) {
    header('Location: /');
}
$exhibitor_data = $_SESSION['exhibitor_data'];
require_once('inc/db.php');
$spots = get_spots();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the Expo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
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
            left: 0;
            margin: 0 auto;
            width: <?php echo $image_width ?>px;
            height: <?php echo $image_height ?>px;
        }
    </style>
</head>
<body style="min-width: 960px;">

<div>
    <h1 class="text-center">Select spots - <?php echo $exhibitor_data['company_name'] ?></h1>
    <div id="map-container">
        <div id="custom-map">
			<?php foreach ( $spots as $spot ): ?>
				<?php $additional_classes = $spot['rotated'] ? ' rotate' : ''; ?>
				<?php $additional_classes .= $spot['reserved'] ? ' reserved' : ''; ?>
                <span class="custom-area red-tooltip <?php echo $additional_classes ?>"
                      style="left: <?php echo $spot['coordinate_x'] ?>px; top: <?php echo $spot['coordinate_y'] ?>px" <?php if ( $spot['reserved'] )
					echo 'data-toggle="tooltip" title="This spot is reserved"' ?>><?php echo $spot['id'] ?></span>
			<?php endforeach ?>
        </div>
        <img src="img/map.jpg" alt="">
        <div class="reserved-spots text-left">
            <h1 class="text-uppercase">Locations Reserved</h1>
            <small class="nothing-selected text-muted ">You haven't reserved anything yet. Click on one of the boxes
                inside the picture on the left to reserve spots on the event.
            </small>
            <div class="reserved-spots-container"></div>
            <table class="table">
                <tr>
                    <td colspan="2"><strong>Qty.</strong></td>
                    <td><strong>Price</strong></td>
                </tr>
                <tr>
                    <td><span id="spaces-count">0</span> &times; 2 sq.m</td>
                    <td><strong class="label label-warning">&times; 3 days</strong></td>
                    <td><span id="price">0</span> USD + 15%</td>
                </tr>
                <tr>
                    <td colspan="2">Registration Fee</td>
                    <td><strong>20 USD</strong></td>
                </tr>
                <tr style="background: #bbbbbb">
                    <td colspan="2"></td>
                    <td><strong><span id="total-price">20</span> USD</strong></td>
                </tr>
            </table>
            <a href="#" class="btn btn-danger btn-block text-uppercase disabled" id="finish-button"><strong>Finish
                    Order</strong></a>
            <br><a href="/index.php">&laquo; Go back to edit organization info</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    var exhibitorId = "<?php echo $exhibitor_data['id'] ?>";
</script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>