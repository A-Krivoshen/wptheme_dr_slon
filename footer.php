    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="container p-4">
            <p><?php echo esc_html(get_theme_mod('footer_text', '© ' . date('Y') . ' Все права защищены.')); ?></p>
            <div class="social-media">
                <?php if (get_theme_mod('facebook_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank"><span class="fab fa-facebook"></span></a>
                <?php endif; ?>
                <!-- Добавьте аналогичные ссылки для других социальных сетей -->
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
