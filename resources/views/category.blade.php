@extends('layouts.app')

@section('content')
<section class="pt-48 pb-32 bg-white px-6 min-h-screen">
    <div class="container mx-auto">
        <div class="max-w-4xl mx-auto text-center mb-24" data-aos="fade-up">
            <span class="text-premium-gold font-black uppercase tracking-widest text-xs mb-4 block">
                {{ __('Category Showcase') }}
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-dark tracking-tighter mb-8 italic">
                {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">
                {{ __('A curated selection of my professional work in') }} {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($projects as $project)
            <div class="group relative bg-white rounded-[2.5rem] overflow-hidden shadow-2xl transition-all duration-700 hover:-translate-y-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="aspect-[3/4] overflow-hidden relative">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title_ar }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-gradient-to-t from-dark via-transparent to-transparent opacity-60"></div>

                    <!-- Content Overlay -->
                    <div class="absolute inset-0 p-10 flex flex-col justify-end">
                        <div class="transform translate-y-10 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-3xl font-black text-white mb-4 leading-tight">
                                {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                            </h3>
                            <p class="text-gray-300 mb-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 line-clamp-2">
                                {{ app()->getLocale() == 'ar' ? $project->description_ar : $project->description_en }}
                            </p>

                            <div class="flex space-x-4 rtl:space-x-reverse opacity-0 group-hover:opacity-100 transition-opacity delay-200 duration-500">
                                @if($project->lens_link)
                                <a href="{{ $project->lens_link }}" target="_blank" class="flex-1 py-4 bg-premium-gold text-dark text-center font-bold rounded-xl hover:bg-white transition">
                                    {{ __('Unlock Lens') }}
                                </a>
                                @elseif($project->video_url)
                                <a href="{{ $project->video_url }}" target="_blank" class="flex-1 py-4 bg-premium-gold text-dark text-center font-bold rounded-xl hover:bg-white transition">
                                    {{ __('Play Video') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-24 flex justify-center">
            {{ $projects->links() }}
        </div>
    </div>
</section>
@endsection