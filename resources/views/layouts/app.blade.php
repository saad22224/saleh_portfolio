<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth" style="scroll-padding-top: 100px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settings['meta_description'] ?? 'Saleh Portfolio - Professional Digital Artist & Designer specializing in AR filters, motion graphics, and creative digital experiences.' }}">
    <meta name="theme-color" content="#D4AF37">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Saleh">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $settings['site_title'] ?? 'Saleh Portfolio' }}">
    <meta property="og:description" content="{{ $settings['meta_description'] ?? 'Professional Digital Artist & Designer specializing in AR filters and motion graphics.' }}">
    <meta property="og:locale" content="{{ app()->getLocale() == 'ar' ? 'ar_SA' : 'en_US' }}">

    <title>{{ $settings['site_title'] ?? 'Saleh Portfolio' }}</title>

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">

    <!-- Fonts with display swap for better performance -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Noto+Kufi+Arabic:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Critical CSS Frameworks -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Deferred non-critical CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </noscript>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    </noscript>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        premium: {
                            gold: '#D4AF37',
                            'gold-light': '#F4E0A1',
                            'gold-dark': '#B8860B',
                        },
                        dark: '#0A0A0A',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'TheSans', 'sans-serif'],
                    },
                    animation: {
                        'carousel': 'carousel 40s linear infinite',
                        'partners-scroll': 'partners-scroll 30s linear infinite',
                    },
                    keyframes: {
                        carousel: {
                            '0%': {
                                transform: 'translateX(0%)'
                            },
                            '100%': {
                                transform: 'translateX(-50%)'
                            },
                        },
                        'partners-scroll': {
                            '0%': {
                                transform: 'translateX(0)'
                            },
                            '100%': {
                                transform: 'translateX(-33.333%)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        @font-face {
            font-family: 'TheSans';
            src: url('/TheSans-Bold.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'TheSans';
            src: url('/TheSans-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'TheSans';
            src: url('/TheSans-Bold.otf') format('opentype');
            font-weight: 900;
            font-style: normal;
        }

        :root {
            --gold-gradient: linear-gradient(135deg, #BF953F, #FCF6BA, #B38728, #FBF5B7, #AA771C);
        }

        .text-gold-gradient {
            background: var(--gold-gradient);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gold-gradient {
            background: var(--gold-gradient);
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        .btn-premium {
            background: var(--gold-gradient);
            background-size: 200% auto;
            transition: 0.5s;
            color: #000;
            font-weight: 800;
        }

        .btn-premium:hover {
            background-position: right center;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(191, 149, 63, 0.4);
        }

        .partner-card {
            background: white;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .partner-card:hover {
            border-color: #D4AF37;
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.1);
        }

        .whatsapp-float {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 1000;
            background: #25D366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 10px 30px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
        }

        [dir="rtl"] .whatsapp-float {
            right: auto;
            left: 40px;
        }

        .whatsapp-float:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 15px 40px rgba(37, 211, 102, 0.5);
        }

        [dir="rtl"] .font-sans {
            font-family: 'TheSans', sans-serif;
        }

        /* Infinite Slider */
        .logos-slider {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }

        .logos-slider::before,
        .logos-slider::after {
            content: "";
            position: absolute;
            top: 0;
            width: 100px;
            height: 100%;
            z-index: 2;
        }

        .logos-slider::before {
            left: 0;
            background: linear-gradient(to right, #0A0A0A 0%, transparent 100%);
        }

        .logos-slider::after {
            right: 0;
            background: linear-gradient(to left, #0A0A0A 0%, transparent 100%);
        }

        /* Partners Auto-Scroll Slider */
        .partners-slider {
            overflow: hidden;
            width: 100%;
        }

        .partners-slider:hover .animate-partners-scroll {
            animation-play-state: paused;
        }

        /* RTL Support */
        [dir="rtl"] .animate-partners-scroll {
            animation-direction: reverse;
        }
    </style>
</head>

<body class="antialiased bg-white text-dark overflow-x-hidden">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-premium-gold text-white px-4 py-2 rounded-lg z-[200]">Skip to main content</a>

    <header class="fixed w-full z-[100] transition-all duration-500 glass-nav" role="banner">
        <nav class="container mx-auto px-6 lg:px-12 py-5 flex justify-between items-center" aria-label="Main navigation">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-3xl font-black tracking-tighter text-gold-gradient" aria-label="Saleh Portfolio - Home">
                SALEH<span class="text-dark">.</span>
            </a>

            <div class="hidden md:flex space-x-10 items-center rtl:space-x-reverse font-bold text-xs uppercase tracking-[0.2em]">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#about" class="hover:text-premium-gold transition">{{ __('About') }}</a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#works" class="hover:text-premium-gold transition">{{ __('Portfolio') }}</a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#clients" class="hover:text-premium-gold transition">{{ __('Partners') }}</a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#contact" class="hover:text-premium-gold transition">{{ __('Contact') }}</a>

                <div class="w-[1px] h-4 bg-gray-200" aria-hidden="true"></div>

                @php $targetLocale = app()->getLocale() == 'ar' ? 'en' : 'ar'; @endphp
                <a href="{{ url($targetLocale . (request()->segment(2) ? '/' . request()->segment(2) . '/' . request()->segment(3) : '')) }}"
                    class="flex items-center text-premium-gold hover:scale-110 transition duration-300"
                    aria-label="Switch language to {{ $targetLocale == 'ar' ? 'Arabic' : 'English' }}">
                    <i class="fa-solid fa-globe mr-2 rtl:ml-2" aria-hidden="true"></i>
                    <span>{{ $targetLocale == 'ar' ? 'العربية' : 'English' }}</span>
                </a>
            </div>

            <button id="menu-toggle" class="md:hidden text-dark text-2xl focus:outline-none transition-transform active:scale-90" aria-label="Open menu" aria-expanded="false">
                <i class="fa-solid fa-bars-staggered" aria-hidden="true"></i>
            </button>
        </nav>
    </header>

    <!-- Mobile Menu Overlay - Outside header for proper layering -->
    <div id="mobile-menu" class="fixed inset-0 z-[9999] translate-x-full transition-transform duration-500 md:hidden" style="background-color: #ffffff !important; opacity: 1 !important;" aria-hidden="true">
        <!-- Decorative Background Element -->
        <div class="absolute top-0 right-0 w-full h-full bg-premium-gold/[0.02] -skew-x-12 transform origin-top-right"></div>
        
        <div class="relative flex flex-col h-full p-8 z-10">
            <div class="flex justify-between items-center mb-16">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-3xl font-black tracking-tighter text-gold-gradient">
                    SALEH<span class="text-dark">.</span>
                </a>
                <button id="menu-close" class="w-12 h-12 flex items-center justify-center bg-dark text-white rounded-full focus:outline-none hover:bg-premium-gold transition shadow-lg" aria-label="Close menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            
            <nav class="flex flex-col space-y-10" aria-label="Mobile menu navigation">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#about" class="mobile-link group flex items-center justify-between border-b border-gray-50 pb-6">
                    <span class="text-4xl font-black uppercase tracking-tighter transition-colors group-hover:text-premium-gold">{{ __('About') }}</span>
                    <i class="fa-solid fa-chevron-right text-premium-gold opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#works" class="mobile-link group flex items-center justify-between border-b border-gray-50 pb-6">
                    <span class="text-4xl font-black uppercase tracking-tighter transition-colors group-hover:text-premium-gold">{{ __('Portfolio') }}</span>
                    <i class="fa-solid fa-chevron-right text-premium-gold opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#clients" class="mobile-link group flex items-center justify-between border-b border-gray-50 pb-6">
                    <span class="text-4xl font-black uppercase tracking-tighter transition-colors group-hover:text-premium-gold">{{ __('Partners') }}</span>
                    <i class="fa-solid fa-chevron-right text-premium-gold opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#contact" class="mobile-link group flex items-center justify-between border-b border-gray-50 pb-6">
                    <span class="text-4xl font-black uppercase tracking-tighter transition-colors group-hover:text-premium-gold">{{ __('Contact') }}</span>
                    <i class="fa-solid fa-chevron-right text-premium-gold opacity-0 group-hover:opacity-100 transition-all -translate-x-4 group-hover:translate-x-0"></i>
                </a>
            </nav>

            <div class="mt-auto">
                <div class="pt-8 border-t border-gray-100 flex justify-between items-center">
                    @php $targetLocale = app()->getLocale() == 'ar' ? 'en' : 'ar'; @endphp
                    <a href="{{ url($targetLocale . (request()->segment(2) ? '/' . request()->segment(2) : '') . (request()->segment(3) ? '/' . request()->segment(3) : '')) }}"
                        class="flex items-center text-dark font-black text-xl hover:text-premium-gold transition"
                        aria-label="Switch language to {{ $targetLocale == 'ar' ? 'Arabic' : 'English' }}">
                        <i class="fa-solid fa-globe mr-3 rtl:ml-3 text-premium-gold" aria-hidden="true"></i>
                        <span>{{ $targetLocale == 'ar' ? 'العربية' : 'English' }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main id="main-content" role="main">
        @yield('content')
    </main>

    <!-- WhatsApp Floating Button -->
    @if(isset($settings['whatsapp']))
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="whatsapp-float"
       aria-label="Contact us on WhatsApp">
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
    </a>
    @endif

    <footer class="bg-dark text-white pt-32 pb-12 relative overflow-hidden" role="contentinfo">
        <div class="absolute top-0 left-0 w-full h-1 bg-gold-gradient" aria-hidden="true"></div>
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-24">
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-4xl font-black text-gold-gradient mb-8">SALEH.</h2>
                    <p class="text-gray-400 max-w-sm mb-12 leading-relaxed text-lg">
                        {{ __('Elevating digital experiences through cutting-edge AR filters and cinematic motion graphics. Based in the heart of creativity.') }}
                    </p>
                    <div class="flex space-x-6 rtl:space-x-reverse text-2xl" role="list" aria-label="Social media links">
                        <a href="#" class="hover:text-premium-gold transition" aria-label="Snapchat" rel="noopener noreferrer"><i class="fa-brands fa-snapchat" aria-hidden="true"></i></a>
                        <a href="#" class="hover:text-premium-gold transition" aria-label="Instagram" rel="noopener noreferrer"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="hover:text-premium-gold transition" aria-label="Behance" rel="noopener noreferrer"><i class="fa-brands fa-behance" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white font-black mb-8 uppercase tracking-widest text-sm">{{ __('Navigation') }}</h3>
                    <ul class="space-y-4 text-gray-400 font-medium" role="list">
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}#about" class="hover:text-premium-gold transition">{{ __('About') }}</a></li>
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}#works" class="hover:text-premium-gold transition">{{ __('Portfolio') }}</a></li>
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}#clients" class="hover:text-premium-gold transition">{{ __('Partners') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-black mb-8 uppercase tracking-widest text-sm text-gold-gradient">{{ __('Contact') }}</h3>
                    <address class="not-italic">
                        <p class="text-gray-400 mb-4">{{ $settings['email'] ?? 'hello@saleh.design' }}</p>
                        <p class="text-gray-400">{{ $settings['location'] ?? 'Riyadh, Saudi Arabia' }}</p>
                        @if(isset($settings['whatsapp']))
                        <p class="text-gray-400 mt-4"><i class="fa-brands fa-whatsapp text-green-500 mr-2 rtl:ml-2" aria-hidden="true"></i> {{ $settings['whatsapp'] }}</p>
                        @endif
                    </address>
                </div>
            </div>
            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm font-bold tracking-widest">
                <p>&copy; {{ date('Y') }} SALEH PORTFOLIO. {{ __('All Rights Reserved.') }}</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // AOS Init
            AOS.init({
                duration: 800,
                once: true,
                disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
            });

            // Mobile Menu Toggle
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            function toggleMenu() {
                const isOpen = !mobileMenu.classList.contains('translate-x-full');
                if (isOpen) {
                    mobileMenu.classList.add('translate-x-full');
                    document.body.classList.remove('overflow-hidden');
                    menuToggle.setAttribute('aria-expanded', 'false');
                } else {
                    mobileMenu.classList.remove('translate-x-full');
                    document.body.classList.add('overflow-hidden');
                    menuToggle.setAttribute('aria-expanded', 'true');
                }
            }

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', toggleMenu);
            }

            if (menuClose) {
                menuClose.addEventListener('click', toggleMenu);
            }

            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('translate-x-full');
                    document.body.classList.remove('overflow-hidden');
                    menuToggle.setAttribute('aria-expanded', 'false');
                });
            });
        });
    </script>
</body>

</html>