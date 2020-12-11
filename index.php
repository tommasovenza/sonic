<?php get_header(); ?>

<div class="container my-5">
    <!-- conditional tags -->
    <!-- se è una ricerca... -->
    <?php if(is_search()) { ?>
    <!-- ...mostra i risultati per la ricerca -->
        <h1><?php esc_html_e('Results for:', 'sonic'); ?> <?php echo $s; ?></h1>
    <!-- altrimenti se, siamo in una categoria o in un tag... -->
    <?php } else if(is_category() || is_tag()) { ?>
    <!-- mostra il titolo della pagina tag o della pagina categoria... -->
        <h1><?php echo single_cat_title(); ?></h1>
    <!-- altrimenti... -->
    <?php } else { ?>
    <!-- ...mostra la descrizione del blog -->
        <h1><?php bloginfo('description'); ?></h1>
    <?php } ?>

    <hr>
</div>

<main class="container">

    <div class="row">
        <div class="col-sm-8">
            <!-- loop -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="<?php post_class(); ?>">   
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <p><?php the_time('j F Y');?> - <?php the_category(', '); ?></p>

                    <!-- immagine del post con caratteristiche passate dentro l'array, una classe e l'attributo alt compilato -->
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sonic_single', array( 
                        'class' => 'img-fluid mb-4', 
                        'alt' => get_the_title()
                    )); ?></a>
                    <!-- mostra un estratto del  test -->
                    <?php the_excerpt(); ?>
                </article>

                <hr class="my-5">

            <?php endwhile;?> 
                    
            <!-- pagination -->
            <div class="pagination">
                <?php
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages
                    ) );
                ?>
            </div>
                 
            <?php else: ?>

            <!-- fine loop -->
                <p><?php esc_html_e('Sorry, no post matched your criteria', 'sonic'); ?></p>
            <?php endif; ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
