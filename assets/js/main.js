/**
 * Elokarsa Theme - Main JavaScript
 *
 * @package Elokarsa_Theme
 * @version 1.0.0
 */

(function () {
    'use strict';

    // ─────────────────────────────────────────────
    // DOM Ready
    // ─────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        loadComponents();
        updateHeaderHeight(); // hitung tinggi header aktual
        initHeroSlider();
        initAnimateOnScroll();
    });

    /**
     * Update --header-height CSS variable berdasarkan tinggi header aktual.
     * Memastikan margin-top hero slider selalu tepat di semua device.
     */
    function updateHeaderHeight() {
        const header = document.getElementById('site-header');
        if (!header) return;

        function setHeight() {
            const h = header.offsetHeight;
            document.documentElement.style.setProperty('--header-height', h + 'px');
        }

        setHeight();

        // Update saat window di-resize (orientasi berubah, dll)
        window.addEventListener('resize', function () {
            clearTimeout(window._headerHeightTimer);
            window._headerHeightTimer = setTimeout(setHeight, 100);
        }, { passive: true });
    }

    /**
     * Load shared components (Header/Footer) for Static Previews
     * Uses ThemeComponents globally defined in assets/js/theme-components.js
     */
    function loadComponents() {
        const headerPlaceholder = document.getElementById('header-placeholder');
        const footerPlaceholder = document.getElementById('footer-placeholder');

        // Check if we are in a preview file (placeholder exists)
        if (!headerPlaceholder && !footerPlaceholder) {
            initMobileMenu();
            initStickyHeader();
            initScrollToTop();
            return;
        }

        // Use global ThemeComponents if available
        if (window.ThemeComponents) {
            if (headerPlaceholder && window.ThemeComponents.header) {
                headerPlaceholder.innerHTML = window.ThemeComponents.header;
                initMobileMenu();
                initStickyHeader();
            }

            if (footerPlaceholder && window.ThemeComponents.footer) {
                footerPlaceholder.innerHTML = window.ThemeComponents.footer;
                initScrollToTop();
            }
        } else {
            console.warn('ThemeComponents not found. Make sure assets/js/theme-components.js is loaded.');
        }
    }

    // ─────────────────────────────────────────────
    // Hero Slider
    // ─────────────────────────────────────────────
    function initHeroSlider() {
        const slider = document.getElementById('hero-slider');
        if (!slider) return;

        const slides = slider.querySelectorAll('.hero-slide');
        const dots = slider.querySelectorAll('.slider-dot');
        const prevBtn = slider.querySelector('.slider-arrow.prev');
        const nextBtn = slider.querySelector('.slider-arrow.next');

        if (slides.length <= 1) return;

        let currentSlide = 0;
        let slideInterval;

        function goToSlide(index) {
            slides[currentSlide].classList.remove('active');
            if (dots[currentSlide]) dots[currentSlide].classList.remove('active');

            currentSlide = (index + slides.length) % slides.length;

            slides[currentSlide].classList.add('active');
            if (dots[currentSlide]) dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            goToSlide(currentSlide + 1);
        }

        function prevSlide() {
            goToSlide(currentSlide - 1);
        }

        function startAutoplay() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoplay() {
            clearInterval(slideInterval);
        }

        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                stopAutoplay();
                nextSlide();
                startAutoplay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                stopAutoplay();
                prevSlide();
                startAutoplay();
            });
        }

        dots.forEach(function (dot, index) {
            dot.addEventListener('click', function () {
                stopAutoplay();
                goToSlide(index);
                startAutoplay();
            });
        });

        // Touch/Swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slider.addEventListener('touchend', function (e) {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                stopAutoplay();
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                startAutoplay();
            }
        }, { passive: true });

        // Start autoplay
        startAutoplay();

        // Pause on hover
        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
    }

    // ─────────────────────────────────────────────
    // Mobile Menu
    // ─────────────────────────────────────────────
    function initMobileMenu() {
        const toggle = document.getElementById('menu-toggle');
        const nav = document.getElementById('main-navigation');

        if (!toggle || !nav) return;

        toggle.addEventListener('click', function () {
            this.classList.toggle('active');
            nav.classList.toggle('active');
        });

        // Close menu when clicking a link
        const links = nav.querySelectorAll('a');
        links.forEach(function (link) {
            link.addEventListener('click', function () {
                toggle.classList.remove('active');
                nav.classList.remove('active');
            });
        });

        // Close menu on outside click
        document.addEventListener('click', function (e) {
            if (!nav.contains(e.target) && !toggle.contains(e.target)) {
                toggle.classList.remove('active');
                nav.classList.remove('active');
            }
        });

        // Handle sub-menu toggles on mobile
        const menuItems = nav.querySelectorAll('.menu-item-has-children > a');
        menuItems.forEach(function (item) {
            item.addEventListener('click', function (e) {
                if (window.innerWidth <= 768) {
                    const subMenu = this.nextElementSibling;
                    if (subMenu && subMenu.classList.contains('sub-menu')) {
                        e.preventDefault();
                        subMenu.style.display = subMenu.style.display === 'flex' ? 'none' : 'flex';
                    }
                }
            });
        });
    }

    // ─────────────────────────────────────────────
    // Sticky Header
    // ─────────────────────────────────────────────
    function initStickyHeader() {
        const header = document.getElementById('site-header');
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function () {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
            } else {
                header.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.08)';
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    // ─────────────────────────────────────────────
    // Scroll to Top Button
    // ─────────────────────────────────────────────
    function initScrollToTop() {
        const btn = document.getElementById('scrollToTop');
        if (!btn) return;

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 400) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        }, { passive: true });

        btn.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        });
    }

    // ─────────────────────────────────────────────
    // Animate on Scroll (Intersection Observer)
    // ─────────────────────────────────────────────
    function initAnimateOnScroll() {
        const elements = document.querySelectorAll(
            '.post-card, .service-card, .partner-item, .stat-item, .about-image, .about-content'
        );

        if (!elements.length || !('IntersectionObserver' in window)) return;

        // Add initial hidden state
        elements.forEach(function (el) {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });

        const observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 100;
                        setTimeout(function () {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, delay);
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px',
            }
        );

        elements.forEach(function (el) {
            observer.observe(el);
        });
    }
})();
