<?php get_header(); ?>
    <main class="container mt-5">
        <div class="row">
            <div class="col-sm-8">

                <!-- loop -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <!-- l'articolo -->
                    <article <?php post_class(); ?>>   
                        <a href="<?php the_permalink(); ?>"><h1 class="display-4"><?php the_title(); ?></h1></a>
                        <p><?php the_time('j F Y');?> - <?php the_category(', '); ?></p>

                        <!-- immagine del post con caratteristiche passate dentro l'array, una classe e l'attributo alt compilato -->
                        <?php the_post_thumbnail('sonic_single', array( 
                            'class' => 'img-fluid mb-4', 
                            'alt' => get_the_title()
                        )); ?>
                        <!-- prendo il contenuto -->
                        <?php the_content(); ?>

                        <?php wp_link_pages( 'pagelink=Page %' ); ?>
                        <!-- visualizzo i tags -->
                        <?php the_tags(); ?>
                        <hr>
                        <!-- inserisco i commenti a fine pagina -->
                        <div class="comments">
                            <?php comments_template(); ?>
                        </div>
                    </article>

                <?php endwhile; else: ?>
                <!-- fine loop -->
                    <p><?php esc_html_e('Sorry, no post matched your criteria', 'sonic'); ?></p>
                <?php endif; ?>
            </div>
            <!-- sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </main>
    <!-- footer -->
<?php get_footer(); ?>