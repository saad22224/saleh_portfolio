@extends('layouts.app')

@section('content')
<!-- Hero -->
<section id="about" class="pt-40 pb-20 lg:pt-60 lg:pb-40 px-6 relative overflow-hidden bg-white">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-premium-gold/5 -skew-x-12 transform origin-top"></div>
    <div class="container mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div data-aos="fade-up">
                <div class="flex items-center space-x-3 rtl:space-x-reverse mb-8">
                    <span class="w-12 h-[2px] bg-premium-gold"></span>
                    <span class="text-premium-gold font-black uppercase tracking-[0.3em] text-xs">{{ __('Digital Artist & Designer') }}</span>
                </div>
                <h1 class="text-6xl md:text-8xl font-black mb-10 leading-[0.9] tracking-tighter">
                    {{ app()->getLocale() == 'ar' ? 'نحول' : 'WE TURN' }} <br>
                    <span class="text-gold-gradient italic">{{ app()->getLocale() == 'ar' ? 'الخيال' : 'IMAGINATION' }}</span> <br>
                    {{ app()->getLocale() == 'ar' ? 'إلى واقع' : 'INTO REALITY' }}
                </h1>
                <p class="text-xl text-gray-500 mb-12 max-w-lg leading-relaxed font-medium">
                    {{ $settings['bio'] ?? __('Elevating digital experiences through cutting-edge AR filters and cinematic motion graphics.') }}
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="#works" class="btn-premium px-12 py-6 rounded-full text-lg shadow-2xl flex items-center">
                        {{ __('Explore My Portfolio') }}
                        <i class="fa-solid fa-arrow-right ml-4 rtl:mr-4 rtl:rotate-180"></i>
                    </a>
                </div>
            </div>
            <div class="relative" data-aos="zoom-in" data-aos-delay="200">
                <div class="relative z-10 rounded-[3rem] overflow-hidden border-[12px] border-white shadow-[0_50px_100px_rgba(0,0,0,0.1)] aspect-[4/5] max-w-md mx-auto">
                    <img src="https://picsum.photos/seed/saleh-main/800/1000" 
                         class="w-full h-full object-cover" 
                         alt="{{ __('Saleh - Digital Artist and Designer') }}"
                         width="800"
                         height="1000"
                         loading="eager">
                </div>
                <div class="absolute -bottom-10 -left-10 bg-dark text-white p-8 rounded-[2rem] shadow-2xl z-20 hidden md:block border-b-4 border-premium-gold">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="text-4xl text-premium-gold"><i class="fa-brands fa-snapchat"></i></div>
                        <div>
                            <p class="text-xs uppercase font-black tracking-widest text-premium-gold/60 mb-1">Official</p>
                            <p class="text-xl font-black leading-none">Lens Creator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Works -->
<div id="works">
    @foreach($categories as $category)
    <section class="py-40 bg-white overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-10" data-aos="fade-right">
                <div class="max-w-xl">
                    <span class="text-premium-gold font-black uppercase tracking-[0.3em] text-xs mb-6 block">
                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                    </span>
                    <h2 class="text-5xl md:text-7xl font-black tracking-tighter leading-none">
                        {{ app()->getLocale() == 'ar' ? 'إبداعات' : 'FEATURED' }} <br>
                        <span class="text-gold-gradient">{{ app()->getLocale() == 'ar' ? 'مختارة' : 'WORKS' }}</span>
                    </h2>
                </div>
                <a href="{{ route('category', ['locale' => app()->getLocale(), 'slug' => $category->slug]) }}"
                    class="group flex items-center space-x-4 rtl:space-x-reverse text-dark font-black uppercase tracking-widest text-sm hover:text-premium-gold transition">
                    <span>{{ __('Full Gallery') }}</span>
                    <div class="w-16 h-[2px] bg-dark group-hover:bg-premium-gold group-hover:w-24 transition-all"></div>
                    <i class="fa-solid fa-plus rotate-45 group-hover:rotate-90 transition duration-500"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10" role="list">
                @foreach($category->projects as $project)
                <article class="group relative aspect-[3/4] rounded-[3rem] overflow-hidden shadow-2xl" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" role="listitem">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" 
                         class="w-full h-full object-cover transition duration-1000 group-hover:scale-110"
                         alt="{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}"
                         loading="lazy"
                         width="400"
                         height="533">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark via-dark/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-10">
                        <h3 class="text-2xl font-black text-white mb-6 transform translate-y-10 group-hover:translate-y-0 transition">
                            {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                        </h3>
                        @if($project->lens_link || $project->video_url)
                        <a href="{{ $project->lens_link ?? $project->video_url }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full py-5 bg-white text-dark text-center font-black rounded-2xl hover:bg-premium-gold hover:text-white transition">
                            {{ $project->lens_link ? __('Unlock Lens') : __('Play Video') }}
                        </a>
                        @endif
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
</div>

<!-- Partners: Auto-Scrolling Logo Carousel -->
<section id="clients" class="py-16 bg-white border-t border-b border-gray-100 overflow-hidden">
    <div class="container mx-auto px-6 mb-10">
        <div class="text-center" data-aos="fade-up">
            <h2 class="text-2xl md:text-3xl font-bold text-dark">{{ __('Our Partners') }}</h2>
        </div>
    </div>

    <div class="partners-slider relative">
        <!-- Fade edges -->
        <div class="absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-white to-transparent z-10"></div>
        <div class="absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white to-transparent z-10"></div>

        <div class="flex animate-partners-scroll">
            @php $clientList = $clients->count() > 0 ? $clients->concat($clients)->concat($clients) : collect(); @endphp
            @forelse($clientList as $client)
            <div class="flex-shrink-0 mx-8 md:mx-12 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition duration-300">
                <img src="{{ $client->logo }}" alt="{{ $client->name }}" class="h-10 md:h-14 w-auto object-contain">
            </div>
            @empty
            @foreach(['Apple', 'Nike', 'Snapchat', 'Disney', 'Adidas', 'Pepsi', 'RedBull', 'Coca-Cola', 'Apple', 'Nike', 'Snapchat', 'Disney', 'Adidas', 'Pepsi', 'RedBull', 'Coca-Cola'] as $brand)
            <div class="flex-shrink-0 mx-8 md:mx-12 opacity-20 hover:opacity-50 transition duration-300">
                <span class="text-2xl md:text-3xl font-bold text-gray-400 uppercase tracking-tight whitespace-nowrap">{{ $brand }}</span>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Contact: Simple & Localized -->
<section id="contact" class="py-32 bg-gray-50" aria-label="{{ __('Contact Us') }}">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-dark mb-4 tracking-tighter">{{ __('Contact Us') }}</h2>
                <p class="text-gray-500 text-lg">{{ __('Have a project? Feel free to reach out!') }}</p>
            </div>

            <div class="bg-white rounded-[3rem] p-10 md:p-16 shadow-2xl border border-gray-100" data-aos="zoom-in">
                @if(session('success'))
                <div class="mb-10 p-6 bg-green-500 text-white rounded-2xl font-bold flex items-center" role="alert">
                    <i class="fa-solid fa-check-circle mr-4 rtl:ml-4 text-2xl" aria-hidden="true"></i>
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.send', ['locale' => app()->getLocale()]) }}" method="POST" class="space-y-10" novalidate>
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <label for="contact-name" class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3 ml-1 rtl:mr-1 rtl:ml-0">{{ __('Full Name') }}</label>
                            <input type="text" id="contact-name" name="name" value="{{ old('name') }}" required autocomplete="name" class="w-full bg-gray-50 border-2 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-50' }} px-6 py-4 rounded-xl focus:border-premium-gold focus:bg-white outline-none transition-all font-bold text-dark" placeholder="{{ __('Your Name') }}">
                            @error('name')<p class="text-red-500 text-sm mt-2">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="contact-phone" class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3 ml-1 rtl:mr-1 rtl:ml-0">{{ __('Phone Number') }}</label>
                            <input type="tel" id="contact-phone" name="phone" value="{{ old('phone') }}" required autocomplete="tel" class="w-full bg-gray-50 border-2 {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-50' }} px-6 py-4 rounded-xl focus:border-premium-gold focus:bg-white outline-none transition-all font-bold text-dark" placeholder="05xxxxxxxx">
                            @error('phone')<p class="text-red-500 text-sm mt-2">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="contact-email" class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3 ml-1 rtl:mr-1 rtl:ml-0">{{ __('Email Address') }}</label>
                            <input type="email" id="contact-email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full bg-gray-50 border-2 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-50' }} px-6 py-4 rounded-xl focus:border-premium-gold focus:bg-white outline-none transition-all font-bold text-dark" placeholder="example@mail.com">
                            @error('email')<p class="text-red-500 text-sm mt-2">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3 ml-1 rtl:mr-1 rtl:ml-0">{{ __('Your Vision') }}</label>
                        <textarea id="contact-message" name="message" rows="6" required class="w-full bg-gray-50 border-2 {{ $errors->has('message') ? 'border-red-500' : 'border-gray-50' }} px-8 py-5 rounded-2xl focus:border-premium-gold focus:bg-white outline-none transition-all font-bold text-dark resize-none" placeholder="{{ __('Tell me about your project...') }}">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-sm mt-2">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="group relative w-full py-7 bg-dark text-white font-black rounded-2xl uppercase tracking-[0.2em] text-sm overflow-hidden transition-all duration-500 shadow-xl hover:shadow-premium-gold/20">
                        <span class="relative z-10">{{ __('Send Inquiry') }}</span>
                        <div class="absolute inset-0 bg-gold-gradient translate-y-full group-hover:translate-y-0 transition-transform duration-500" aria-hidden="true"></div>
                    </button>
                </form>

                <div class="mt-16 pt-10 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-8 text-center md:text-left rtl:md:text-right">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 rtl:space-x-reverse">
                        <div class="w-14 h-14 bg-premium-gold/10 rounded-2xl flex items-center justify-center text-premium-gold text-2xl shadow-inner"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">{{ __('Email') }}</p>
                            <p class="font-bold text-dark text-lg">{{ $settings['email'] ?? 'hello@saleh.design' }}</p>
                        </div>
                    </div>
                    @if(isset($settings['whatsapp']))
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 rtl:space-x-reverse">
                        <div class="w-14 h-14 bg-green-500/10 rounded-2xl flex items-center justify-center text-green-500 text-2xl shadow-inner"><i class="fa-brands fa-whatsapp"></i></div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-1">{{ __('WhatsApp') }}</p>
                            <p class="font-bold text-dark text-lg" dir="ltr">{{ $settings['whatsapp'] }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection