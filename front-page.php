<?php get_header(); ?>
<!-- container -->
<div class="main-content">
    <!-- slider -->
    <section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
                // il contatore, inizializzato a 0, per scorrere lo slider
                $sonic_counter = 0;
                // La Query
                $sonic_the_query = new WP_Query( 'category_name=in-evidenza&posts_per_page=3' );

                // Il Loop
                while ( $sonic_the_query->have_posts() ) : 
                    // la query che richiede e stampa il post
                    $sonic_the_query->the_post(); ?>
                        
                        <?php $sonic_counter++ ?>

                        <!-- l'immagine in background url che viene ciclata -->
                        <?php $sonic_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sonic_big'); ?>
                        <!-- slider che viene ciclato -->
                        <!-- if che stampa classe active -->
                        <div class="carousel-item <?php if ($sonic_counter == 1) { echo 'active'; } ?>" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7)), url(<?php echo $sonic_image_attributes[0]; ?>); background-size: cover; background-position: center center">
                            <div class="carousel-caption">
                                <!-- titolo -->
                                <h3 class="display-3"><?php the_title(); ?></h3>
                                <!-- data e categoria -->
                                <p><?php the_time('j F Y');?> - <?php the_category(', '); ?></p>
                                <!-- l'estratto -->
                                <div class="lead d-none d-lg-block"><?php the_excerpt(); ?></div>
                            </div>
                        </div>
                <?php endwhile;

                // Ripristina Query & Post Data originali
                wp_reset_query();
                wp_reset_postdata(); 
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

<!-- sezione a due colonne -->
<?php
            
    // La Query
    $sonic_the_query = new WP_Query( 'page_id=26' );

    // Il Loop
    while ( $sonic_the_query->have_posts() ) : 
        // la query che richiede e stampa il post
        $sonic_the_query->the_post(); ?>
        
        <section class="container">
            <div class="row mt-5">
                <div class="col-sm-6">
                    <blockquote class="blockquote">
                        <p class="mr-5 h2"><?php the_title(); ?></p>
                        <footer class="blockquote-footer"><?php esc_html_e('Author: ', 'sonic'); ?><cite title="Source Title"><?php the_author(); ?></cite></footer>
                    </blockquote>
                </div>
                <div class="col-sm-6">
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
        </section>                                     
    <?php endwhile;

    // Ripristina Query & Post Data originali
    wp_reset_query();
    wp_reset_postdata(); 
?>
 
<!-- Card Section -->
<section class="container">
  <div class="card-deck mt-4">
  <?php          
        // La Query
        $sonic_the_query = new WP_Query( 'category_name=focus&posts_per_page=3 ' );
        // Il Loop
        while ( $sonic_the_query->have_posts() ) : 
        // la query che richiede e stampa il post
        $sonic_the_query->the_post(); ?>

            <div class="card">
                <!-- immagine del post, con link, con caratteristiche 
                passate dentro l'array, una classe e l'attributo 
                alt compilato -->
                <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('sonic_single', 
                array(  
                    'class' => 'img-fluid mb-2', 
                    'alt' => get_the_title()) );?>
                </a>
                <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <div class="card-text"><?php the_excerpt(); ?></div>
                <p class="card-text"><small class="text-muted"><?php the_time('j F Y');?> - 
                <?php the_category(', '); ?></small></p>
                </div>
            </div>                           
        <?php endwhile;
        // Ripristina Query & Post Data originali
        wp_reset_query();
        wp_reset_postdata(); 
    ?>
  </div>
</section>

<?php
            
    // La Query
    $sonic_the_query = new WP_Query( 'page_id=35' );

    // Il Loop
    while ( $sonic_the_query->have_posts() ) : 
        // la query che richiede e stampa il post
        $sonic_the_query->the_post(); ?>
        <?php $sonic_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sonic_big'); ?>

        <div class="jumbotron jumbtron-fluid mt-5 text-white" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7)), url(<?php echo $sonic_image_attributes[0]; ?>); background-size: cover; background-position: center center">
         <div class="container">
            <h1 class="display-3"><?php the_title(); ?></h1>
            <div class="lead"><?php the_excerpt(); ?></div>
            
            <p><?php esc_html_e('Author: ', 'sonic'); ?> <?php the_author(); ?></p>
            <p class="lead">
            <a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>" role="button"><?php esc_html_e('Read more...', 'sonic'); ?></a>
            </p>
         </div>
        </div>                    
    <?php endwhile;

    // Ripristina Query & Post Data originali
    wp_reset_query();
    wp_reset_postdata(); 
?>


<?php get_footer(); ?>