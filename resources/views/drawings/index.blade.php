@extends('layouts.app')

@section('title', $category->name . ' Ausmalbilder zum Ausdrucken - Kostenlose Malvorlagen für Kinder')
@section('meta_description', 'Entdecken Sie über ' . $drawings->count() . ' kostenlose ' . $category->name . ' Ausmalbilder zum Ausdrucken. Perfekt für Kinder jeden Alters. Sofort als PDF herunterladen!')
@section('og_title', $category->name . ' Ausmalbilder - Kostenlose Malvorlagen')
@section('og_description', 'Über ' . $drawings->count() . ' druckbare ' . $category->name . ' Ausmalbilder kostenlos herunterladen. Ideal für Kindergarten, Schule und zu Hause!')

@push('structured_data')
<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "{{ $category->name }} Ausmalbilder",
  "description": "Kostenlose {{ $category->name }} Malvorlagen zum Ausdrucken für Kinder",
  "url": "{{ url()->current() }}",
  "mainEntity": {
    "@type": "ItemList",
    "numberOfItems": {{ $drawings->count() }},
    "itemListElement": [
      @foreach($drawings as $index => $drawing)
      {
        "@type": "CreativeWork",
        "position": {{ $index + 1 }},
        "name": "{{ $drawing->title }}",
        "description": "{{ $drawing->description ?? 'Kostenlose ' . $category->name . ' Malvorlage zum Ausdrucken' }}",
        "url": "{{ route('drawing.show', [$category->slug, $drawing->slug]) }}",
        "creator": {
          "@type": "Organization",
          "name": "{{ config('app.name') }}"
        },
        "license": "https://creativecommons.org/licenses/by-nc/4.0/",
        "isAccessibleForFree": true
      }@if(!$loop->last),@endif
      @endforeach
    ]
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Startseite",
        "item": "{{ url('/') }}"
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $category->name }} Ausmalbilder",
        "item": "{{ url()->current() }}"
      }
    ]
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}",
    "url": "{{ url('/') }}"
  }
}</script>

<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Sind die {{ $category->name }} Ausmalbilder wirklich kostenlos?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ja, alle {{ $category->name }} Ausmalbilder auf unserer Website sind komplett kostenlos. Sie können sie herunterladen, ausdrucken und so oft verwenden, wie Sie möchten."
      }
    },
    {
      "@type": "Question",
       "name": "In welchen Formaten kann ich die Malvorlagen herunterladen?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Unsere {{ $category->name }} Ausmalbilder stehen als hochqualitative PDF- und SVG-Dateien zur Verfügung. PDFs sind ideal zum Ausdrucken, während SVGs beliebig skalierbar sind."
      }
    },
    {
      "@type": "Question",
      "name": "Für welches Alter sind die {{ $category->name }} Malvorlagen geeignet?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Unsere {{ $category->name }} Ausmalbilder sind für verschiedene Altersgruppen konzipiert - von einfachen Motiven für Kleinkinder ab 3 Jahren bis hin zu detaillierten Vorlagen für ältere Kinder und Erwachsene."
      }
    },
    {
      "@type": "Question",
      "name": "Kann ich die Ausmalbilder auch kommerziell nutzen?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Die {{ $category->name }} Ausmalbilder sind für den privaten Gebrauch kostenlos. Für kommerzielle Nutzung kontaktieren Sie uns bitte für eine entsprechende Lizenz."
      }
    },
    {
      "@type": "Question",
      "name": "Welche Papiergröße sollte ich zum Ausdrucken verwenden?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Alle {{ $category->name }} Malvorlagen sind für das Standard-A4-Format optimiert. Sie können aber auch auf anderen Papiergrößen wie A3 oder Letter-Format gedruckt werden."
      }
    }
  ]
}</script>
@endpush

@section('content')
    {{-- Breadcrumb Navigation --}}
    <nav class="bg-white border-b border-gray-200" aria-label="Breadcrumb">
        <div class="container mx-auto px-4 py-3">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Startseite</a></li>
                <li class="flex items-center"><svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="text-gray-900 font-medium">{{ $category->name }} Ausmalbilder</li>
            </ol>
        </div>
    </nav>

    {{-- Hero Section for Category --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute -bottom-8 left-80 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 4s;"></div>
        </div>
        <div class="relative container mx-auto px-4 py-16 md:py-24">
            <div class="text-center max-w-5xl mx-auto">
                <div class="mb-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mb-4">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        {{ $drawings->count() }} kostenlose Malvorlagen
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight mb-6">
                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        {{ $category->name }}
                    </span>
                    <span class="block mt-2">Ausmalbilder</span>
                </h1>

                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">
                        Alle {{ $category->name }} Malvorlagen
                        <span class="block text-2xl md:text-3xl text-blue-600 font-normal mt-2">
                            {{ $drawings->count() }} kostenlose Ausmalbilder
                        </span>
                    </h2>
                    <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Entdecken Sie unsere handverlesene Sammlung an {{ $category->name }} Ausmalbildern. Jede Malvorlage wurde sorgfältig gestaltet, um Kindern Freude zu bereiten und ihre Kreativität zu fördern.
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8 mb-16">
                    @foreach ($drawings as $drawing)
                        @php
                            $imagePath = (file_exists(public_path('thumbs/' . $drawing->slug . '.jpg')))
                                         ? asset('thumbs/' . $drawing->slug . '.jpg')
                                         : null;
                        @endphp
                        <article class="group relative bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <a href="{{ route('drawing.show', [$category->slug, $drawing->slug]) }}" class="block">
                                <div class="relative w-full h-64 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                                    @if ($imagePath)
                                        <img src="{{ $imagePath }}"
                                             alt="Ausmalbild {{ $drawing->title }} - Kostenlose Malvorlage"
                                             loading="lazy"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100">
                                            <div class="w-20 h-20 rounded-full bg-white/60 backdrop-blur-sm flex items-center justify-center mb-4 shadow-lg">
                                                <svg class="w-10 h-10 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-medium text-blue-600 bg-white/80 backdrop-blur-sm px-3 py-1 rounded-full">
                                                Vorschau wird geladen...
                                            </span>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200 line-clamp-2">
                                        {{ $drawing->title }}
                                    </h3>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                        {{ Str::limit($drawing->description ?? 'Eine wunderschöne ' . $category->name . ' Malvorlage zum kostenlosen Ausdrucken. Perfekt für Kinder jeden Alters zum Ausmalen und Gestalten.', 120) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center text-blue-600 font-medium text-sm group-hover:text-blue-700">
                                            <span>Jetzt ausmalen</span>
                                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </div>
                                        <div class="flex items-center text-xs text-gray-400">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            PDF
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <p class="text-xl md:text-2xl text-gray-700 mb-8 leading-relaxed max-w-4xl mx-auto">
                    {{ $category->description ?? 'Tauchen Sie ein in eine Welt voller Farben und Kreativität! Hier finden Sie alle kostenlosen Malvorlagen zum Thema ' . $category->name . ' – perfekt für Kinder jeden Alters.' }}
                </p>
                <div class="flex flex-wrap justify-center gap-4 mb-8">
                    <div class="flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-md">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium text-gray-700">100% Kostenlos</span>
                    </div>
                    <div class="flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-md">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium text-gray-700">PDF & SVG Download</span>
                    </div>
                    <div class="flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-md">
                        <svg class="w-5 h-5 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium text-gray-700">Sofort druckbereit</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Category Information Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Warum {{ $category->name }} Ausmalbilder so beliebt sind
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6"></div>
                </div>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <p class="text-xl text-center mb-8">
                        {{ $category->name }} Malvorlagen bieten Kindern eine wunderbare Möglichkeit, ihre Kreativität zu entfalten und gleichzeitig wichtige Fähigkeiten zu entwickeln. Das Ausmalen fördert die Feinmotorik, Konzentration und das Farbverständnis.
                    </p>
                    <div class="grid md:grid-cols-2 gap-8 mb-12">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8">
                            <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pädagogischer Nutzen</h3>
                            <p>{{ $category->name }} Ausmalbilder unterstützen die kognitive Entwicklung von Kindern. Sie lernen Formen zu erkennen, verbessern ihre Hand-Augen-Koordination und entwickeln Geduld beim konzentrierten Arbeiten.</p>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8">
                            <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Stressabbau & Entspannung</h3>
                            <p>Das Ausmalen von {{ $category->name }} Motiven wirkt beruhigend und entspannend. Es hilft Kindern, Stress abzubauen und fördert einen meditativen Zustand der Konzentration.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Drawings Grid Section --}}
    <section class="py-16 bg-gray-50" id="malvorlagen">
        <div class="container mx-auto px-4">
                
                <div class="space-y-4" style="margin-bottom:25px">
                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Sind die {{ $category->name }} Ausmalbilder wirklich kostenlos?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Ja, alle {{ $category->name }} Ausmalbilder auf unserer Website sind komplett kostenlos. Sie können sie herunterladen, ausdrucken und so oft verwenden, wie Sie möchten.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">In welchen Formaten kann ich die Malvorlagen herunterladen?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Unsere {{ $category->name }} Ausmalbilder stehen als hochqualitative <strong>PDF</strong>- und <strong>SVG</strong>-Dateien zur Verfügung. PDFs sind ideal zum Ausdrucken, während SVGs beliebig skalierbar sind.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Für welches Alter sind die {{ $category->name }} Malvorlagen geeignet?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Unsere {{ $category->name }} Ausmalbilder sind für verschiedene Altersgruppen konzipiert – von einfachen Motiven für Kleinkinder ab 3 Jahren bis hin zu detaillierten Vorlagen für ältere Kinder und Erwachsene.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Kann ich die Ausmalbilder auch kommerziell nutzen?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Die {{ $category->name }} Ausmalbilder sind für den privaten Gebrauch kostenlos. Für kommerzielle Nutzung kontaktieren Sie uns bitte für eine entsprechende Lizenz.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Welche Papiergröße sollte ich zum Ausdrucken verwenden?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Alle {{ $category->name }} Malvorlagen sind für das Standard-A4-Format optimiert. Sie können aber auch auf anderen Papiergrößen wie A3 oder Letter-Format gedruckt werden.</p>
                        </div>
                    </details>
                </div>

                {{-- Additional Benefits Section --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-gray-100">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            Das macht unsere {{ $category->name }} Ausmalbilder besonders
                        </h3>
                        <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto"></div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Hochwertige Qualität</h4>
                            <p class="text-gray-600">Jede Malvorlage wird in bester Druckqualität bereitgestellt - gestochen scharf und perfekt optimiert.</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9A1 1 0 0015 9V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v5a1 1 0 00.293.707L13.586 13l-4.293 4.293a1 1 0 001.414 1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Einfacher Download</h4>
                            <p class="text-gray-600">Laden Sie Ihre Wunschvorlage mit nur einem Klick als PDF oder SVG herunter – ganz unkompliziert.</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.527-.925 1 1 0 011.087.11L14 4.542V17a1 1 0 01-1 1H7a1 1 0 01-1-1V4.542l3.143-2.336a1 1 0 01.1-.038zM10 5a1 1 0 00-1 1v6a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Vielfalt an Themen</h4>
                            <p class="text-gray-600">Von Tieren über Fahrzeuge bis hin zu fantastischen Welten – für jeden Geschmack ist etwas dabei.</p>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
