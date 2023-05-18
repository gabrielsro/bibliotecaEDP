<?php
/*
Template Name: Test 5
*/
?>

<?php get_header(); ?>

<div class="books-search">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" id='books-search-input'>
            <input type="hidden" name='post_type' value='libro'>
            <input type="text" placeholder="Busca tu libro (ejemplo: 'Crepusculo')" name="s" value="<?php the_search_query(); ?>" title="<?php esc_html_e( 'Escribe algo para buscar y presiona Enter...', 'grandnews' ); ?>" required>
            <button type='submit' id='books-search-button'>Buscar</button>
    </form>
</div>

<div class="books-container">
    <?php 
    global $post;
    global $event;

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
    );
    
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();
    ?>

        <div class="book-card">
            <a href="<?php echo get_post_permalink();?>" id="link" target='_blank'>    
                <div class="card-info">
                    <div class="card-title-holder">
                        <p><?php the_title();?></p>
                    </div>
                    <div class="card-author-holder">
                        <?php $terms = get_the_terms(0, 'autores');?>
                        <?php $term = $terms[0]; ?>
                        <p><?php echo $term->name; ?></p>
                    </div>
                </div>
            </a>
            <?php if (get_the_post_thumbnail()): ?>
                <a href="<?php echo get_post_permalink();?>" id="link" target='_blank'>    
                    <img src="<?php the_post_thumbnail_url('book-thumbnail-collection'); ?>" alt="<?php the_title(); ?>">
                </a>
            <?php endif; ?>
        </div>

    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
