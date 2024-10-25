jQuery(document).ready(function($) {
    // Плавный скролл
    $('a[href*="#"]').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $(this.hash).offset().top
            }, 500);
        }
    });

    // Кнопка "Наверх"
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
        }
    });

    $('#scrollToTop').click(function() {
        $('html, body').animate({scrollTop : 0}, 800);
        return false;
    });

    // Инициализация AOS
    AOS.init();

    // Инициализация слайдера
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    // Переключение светлой/тёмной темы
    const themeSwitch = $('#theme-switch');
    if (themeSwitch.length) {
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme === 'dark') {
            $('body').addClass('dark-mode');
            themeSwitch.find('span').removeClass('fa-moon').addClass('fa-sun');
        }

        themeSwitch.click(function() {
            $('body').toggleClass('dark-mode');
            if ($('body').hasClass('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                themeSwitch.find('span').removeClass('fa-moon').addClass('fa-sun');
            } else {
                localStorage.setItem('theme', 'light');
                themeSwitch.find('span').removeClass('fa-sun').addClass('fa-moon');
            }
        });
    }
});
