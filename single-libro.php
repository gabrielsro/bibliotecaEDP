<?php get_header();?>


<div class="single-book-container">
    
    <div class="book-cover">
        <?php if(has_post_thumbnail()):?>
            <img src="<?php the_post_thumbnail_url('book-thumbnail-single'); ?>" alt="<?php the_title(); ?>">
        <?php endif;?>
    </div>
    
    <div class="book-info">
        
            <h1><?php the_title();?></h1>
            <?php $terms = get_the_terms(0,'autores');?>
            <?php $term = $terms[0] ?>
            <h2> <?php echo $term->name; ?></h2>
            <?php $terms2 = get_the_terms(0,'genero');?>
            <?php if($terms2): ?>
            <h3><?php echo $terms2[0]->name; ?></h3>
            <?php endif; ?>
            <h4><?php echo types_render_field('year',array('index'=>'0')) ?></h4>

            <?php if(types_render_field('link-de-descarga',array('index'=>'0', 'output'=>'raw'))): ?>
            <a id='btn-descargar' href="<?php echo types_render_field('link-de-descarga',array('index'=>'0', 'output'=>'raw')); ?>"><div id='descargar'>Descargar</div></a>
            <?php endif; ?>


            <p><?php the_content();?></p>
    </div>
        
</div>


<?php get_footer();?>