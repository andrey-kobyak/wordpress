<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('title')?></title>
    <meta name="robots" content="max-image-preview:large">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@300;400;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
    <?php wp_head()?>
</head>
<body <?php if (is_front_page()): ?> class="main"<?php endif; ?>>
<?php get_template_part('block/header')?>