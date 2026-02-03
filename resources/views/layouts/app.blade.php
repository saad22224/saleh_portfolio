<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth" style="scroll-padding-top: 100px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings['site_title'] ?? 'Saleh Portfolio' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons & Frameworks -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
                        sans: ['Outfit', 'Noto Kufi Arabic', 'sans-serif'],
                    },
                    animation: {
                        'carousel': 'carousel 40s linear infinite',
                    },
                    keyframes: {
                        carousel: {
                            '0%': {
                                transform: 'translateX(0%)'
                            },
                            '100%': {
                                transform: 'translateX(-50%)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <style>
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
            font-family: 'Noto Kufi Arabic', sans-serif;
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
    </style>
</head>

<body class="antialiased bg-white text-dark overflow-x-hidden">
    <header class="fixed w-full z-[100] transition-all duration-500 glass-nav">
        <nav class="container mx-auto px-6 lg:px-12 py-5 flex justify-between items-center">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-3xl font-black tracking-tighter text-gold-gradient">
                SALEH<span class="text-dark">.</span>
            </a>

            <div class="hidden md:flex space-x-10 items-center rtl:space-x-reverse font-bold text-xs uppercase tracking-[0.2em]">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#about" class="hover:text-premium-gold transition">{{ __('About') }}</a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#works" class="hover:text-premium-gold transition">{{ __('Portfolio') }}</a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#clients" class="hover:text-premium-gold transition">{{ __('Partners') }}</a>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}#contact" class="hover:text-premium-gold transition">{{ __('Contact') }}</a>

                <div class="w-[1px] h-4 bg-gray-200"></div>

                @php $targetLocale = app()->getLocale() == 'ar' ? 'en' : 'ar'; @endphp
                <a href="{{ url($targetLocale . (request()->segment(2) ? '/' . request()->segment(2) . '/' . request()->segment(3) : '')) }}"
                    class="flex items-center text-premium-gold hover:scale-110 transition duration-300">
                    <i class="fa-solid fa-globe mr-2 rtl:ml-2"></i>
                    <span>{{ $targetLocale == 'ar' ? 'العربية' : 'English' }}</span>
                </a>
            </div>

            <button class="md:hidden text-dark text-2xl">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- WhatsApp Floating Button -->
    @if(isset($settings['whatsapp']))
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp']) }}" target="_blank" class="whatsapp-float">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    @endif

    <footer class="bg-dark text-white pt-32 pb-12 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gold-gradient"></div>
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-24">
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-4xl font-black text-gold-gradient mb-8">SALEH.</h2>
                    <p class="text-gray-400 max-w-sm mb-12 leading-relaxed text-lg">
                        {{ __('Elevating digital experiences through cutting-edge AR filters and cinematic motion graphics. Based in the heart of creativity.') }}
                    </p>
                    <div class="flex space-x-6 rtl:space-x-reverse text-2xl">
                        <a href="#" class="hover:text-premium-gold transition"><i class="fa-brands fa-snapchat"></i></a>
                        <a href="#" class="hover:text-premium-gold transition"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="hover:text-premium-gold transition"><i class="fa-brands fa-behance"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-black mb-8 uppercase tracking-widest text-sm">{{ __('Navigation') }}</h4>
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}#about" class="hover:text-premium-gold transition">{{ __('About') }}</a></li>
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}#works" class="hover:text-premium-gold transition">{{ __('Portfolio') }}</a></li>
                        <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}#clients" class="hover:text-premium-gold transition">{{ __('Partners') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black mb-8 uppercase tracking-widest text-sm text-gold-gradient">{{ __('Contact') }}</h4>
                    <p class="text-gray-400 mb-4">{{ $settings['email'] ?? 'hello@saleh.design' }}</p>
                    <p class="text-gray-400">{{ $settings['location'] ?? 'Riyadh, Saudi Arabia' }}</p>
                    @if(isset($settings['whatsapp']))
                    <p class="text-gray-400 mt-4"><i class="fa-brands fa-whatsapp text-green-500 mr-2 rtl:ml-2"></i> {{ $settings['whatsapp'] }}</p>
                    @endif
                </div>
            </div>
            <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm font-bold tracking-widest">
                <p>&copy; {{ date('Y') }} SALEH PORTFOLIO. {{ __('All Rights Reserved.') }}</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>