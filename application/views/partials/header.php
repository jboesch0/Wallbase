<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Wallbase</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
    <link href="<?php echo base_url(); ?>/assets/css/zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/css/zoombox/zoombox.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $('a.zoombox').zoombox();             // Default height

            /**
            * Or You can also use specific options
            $('a.zoombox').zoombox({
                theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                opacity     : 0.8,              // Black overlay opacity
                duration    : 800,              // Animation duration
                animation   : true,             // Do we have to animate the box ?
                width       : 600,              // Default width
                height      : 400,              // Default height
                gallery     : true,             // Allow gallery thumb view
                autoplay : false                // Autoplay for video
            });
            */
        });
        </script>

</head>
<body>
