<?php get_header(); ?>

    <main class="container mt-5 main-content">
        <div class="row">
            <div class="col-sm-8 ml-sm-auto mr-sm-auto">

                <!-- loop -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <!-- l'articolo -->
                    <article <?php post_class(); ?>>   
                        <h1 class="display-4 mb-5 text-center"><?php the_title(); ?></h1>

                        <!-- immagine del post con caratteristiche passate dentro l'array, una classe e l'attributo alt compilato -->
                        <?php the_post_thumbnail('sonic_single', array( 
                            'class' => 'img-fluid mb-4', 
                            'alt' => get_the_title()
                        )); ?>

                        <?php the_content(); ?>
  
                    </article>

                <?php endwhile; else: ?>
                <!-- fine loop -->
                    <p><?php esc_html_e('Sorry, no post matched your criteria', 'sonic'); ?></p>
                <?php endif; ?>
            </div>
            
        </div>
    </main>
    <!-- footer -->
<?php get_footer(); ?>