<?php get_header(); ?>
<div class="container mt-4 text-center">
    <h1><?php _e('404 - Page Not Found', 'dr_slon'); ?></h1>
    <p><?php _e('Sorry, but the page you are looking for does not exist.', 'dr_slon'); ?></p>
    <a href="<?php echo home_url(); ?>" class="btn btn-primary"><?php _e('Back to Home', 'dr_slon'); ?></a>
</div>
<?php get_footer(); ?>
