<?php get_header(); ?>

<div class="container mt-4">
    <?php if (have_posts()) : ?>
        <div class="row posts-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <div class="card-text"><?php the_excerpt(); ?></div>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Пагинация -->
        <nav aria-label="Page navigation">
            <?php
            the_posts_pagination(array(
                'prev_text' => __('Previous', 'dr_slon'),
                'next_text' => __('Next', 'dr_slon'),
                'mid_size'  => 2,
            ));
            ?>
        </nav>
    <?php else : ?>
        <p><?php _e('No posts found.', 'dr_slon'); ?></p>
    <?php endif; ?>
</div>

<!-- Кнопка "Наверх" -->
<button id="scrollToTop" class="btn btn-primary"><span class="fas fa-arrow-up"></span></button>

<?php get_footer(); ?>
