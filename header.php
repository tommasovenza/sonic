<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php//blog_info('description');?>">

    <!-- tag che inserisce in maniera corretta gli stili dei plugin e del nostro tema -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url_raw(home_url()); ?>"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <?php
            wp_nav_menu([
                'menu'            => 'header',
                'theme_location'  => 'header',
                'container'       => 'div',
                'container_id'    => 'bs4navbar',
                'container_class' => 'collapse navbar-collapse',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav mr-auto',
                'depth'           => 2,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker()
            ]);
            ?>
    </div>    
</nav>
