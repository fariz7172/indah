import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

// ===================================
// INITIALIZE AOS (Animate On Scroll)
// ===================================
document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS with custom settings
    AOS.init({
        duration: 1000,
        easing: 'ease-out-cubic',
        once: true,
        mirror: false,
        offset: 100,
        delay: 100,
    });

    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Navbar Scroll Effect dengan Glassmorphism
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.classList.add('glass-strong', 'shadow-2xl');
                navbar.classList.remove('bg-white');
            } else {
                navbar.classList.remove('glass-strong', 'shadow-2xl');
                navbar.classList.add('bg-white');
            }
        });
    }

    // Hero Carousel with Enhanced Animations
    const carousel = document.getElementById('hero-carousel');
    if (carousel) {
        const slides = carousel.querySelectorAll('.carousel-slide');
        const dots = carousel.querySelectorAll('.carousel-dot');
        let currentSlide = 0;
        const slideInterval = 5000; // 5 seconds

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
                slide.style.display = i === index ? 'block' : 'none';

                // Add fade animation
                if (i === index) {
                    slide.style.opacity = '0';
                    setTimeout(() => {
                        slide.style.transition = 'opacity 0.8s ease-in-out';
                        slide.style.opacity = '1';
                    }, 50);
                }
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
                if (i === index) {
                    dot.classList.add('scale-125', 'neon-purple');
                } else {
                    dot.classList.remove('scale-125', 'neon-purple');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Auto advance slides
        let autoSlide = setInterval(nextSlide, slideInterval);

        // Pause on hover
        carousel.addEventListener('mouseenter', () => {
            clearInterval(autoSlide);
        });

        carousel.addEventListener('mouseleave', () => {
            autoSlide = setInterval(nextSlide, slideInterval);
        });

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, slideInterval);
            });
        });

        // Previous/Next buttons
        const prevButton = carousel.querySelector('.carousel-prev');
        const nextButton = carousel.querySelector('.carousel-next');

        if (prevButton) {
            prevButton.addEventListener('click', () => {
                prevSlide();
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, slideInterval);
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                nextSlide();
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, slideInterval);
            });
        }

        // Touch support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchStartX - touchEndX > 50) {
                nextSlide();
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, slideInterval);
            }
            if (touchEndX - touchStartX > 50) {
                prevSlide();
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, slideInterval);
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') prevSlide();
            if (e.key === 'ArrowRight') nextSlide();
        });

        // Initialize
        showSlide(0);
    }

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Form Validation Enhancement with Animation
    const forms = document.querySelectorAll('form[data-validate]');
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-hot-pink', 'shake');
                    setTimeout(() => {
                        input.classList.remove('shake');
                    }, 500);
                } else {
                    input.classList.remove('border-hot-pink');
                    input.classList.add('border-electric-purple');
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Create toast notification
                showToast('Mohon lengkapi semua field yang wajib diisi', 'error');
            }
        });
    });

    // Counter Animation for Stats
    const animateCounter = (element, target, duration = 2000) => {
        let start = 0;
        const increment = target / (duration / 16); // 60fps

        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = Math.floor(target);
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    };

    // Observe counters and trigger animation
    const counters = document.querySelectorAll('[data-counter]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-counter'));
                animateCounter(entry.target, target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => counterObserver.observe(counter));

    // Parallax Effect for Hero Elements
    window.addEventListener('scroll', () => {
        const parallaxElements = document.querySelectorAll('[data-parallax]');
        parallaxElements.forEach(element => {
            const speed = element.getAttribute('data-parallax') || 0.5;
            const yPos = -(window.pageYOffset * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });

    // Glow Effect on Hover for Cards
    const glowCards = document.querySelectorAll('.card-futuristic, .card-glass');
    glowCards.forEach(card => {
        card.addEventListener('mouseenter', function () {
            this.classList.add('animate-glow');
        });
        card.addEventListener('mouseleave', function () {
            this.classList.remove('animate-glow');
        });
    });

    // Toast Notification System
    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed top-24 right-4 px-6 py-4 rounded-xl shadow-2xl z-50 transform translate-x-full transition-transform duration-500`;

        if (type === 'error') {
            toast.classList.add('bg-hot-pink', 'text-white', 'neon-pink');
        } else {
            toast.classList.add('glass-strong', 'text-electric-purple');
        }

        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 100);

        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 500);
        }, 3000);
    }

    // Add shake animation to CSS dynamically
    if (!document.querySelector('#shake-animation')) {
        const style = document.createElement('style');
        style.id = 'shake-animation';
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
            .shake {
                animation: shake 0.5s ease-in-out;
            }
        `;
        document.head.appendChild(style);
    }

    // Floating particles effect (subtle)
    createFloatingParticles();
});

// Floating Particles Background Effect
function createFloatingParticles() {
    const particleContainer = document.querySelector('#particle-container');
    if (!particleContainer) return;

    const particleCount = 15;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';

        const size = Math.random() * 4 + 2;
        const startX = Math.random() * 100;
        const startY = Math.random() * 100;
        const duration = Math.random() * 10 + 10;
        const delay = Math.random() * 5;

        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${startX}%`;
        particle.style.top = `${startY}%`;
        particle.style.animationDuration = `${duration}s`;
        particle.style.animationDelay = `${delay}s`;

        particleContainer.appendChild(particle);
    }
}

// Refresh AOS on dynamic content load
window.addEventListener('load', () => {
    AOS.refresh();
});
