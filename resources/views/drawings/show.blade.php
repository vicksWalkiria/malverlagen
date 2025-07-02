@extends('layouts.app')

@section('title', $drawing->title . ' - Ausmalbilder zum Ausdrucken & Herunterladen')
@section('meta_description', 'Drucke die kostenlose Malvorlage "' . $drawing->title . '" aus der Kategorie ' . $category->name . ' kostenlos als PDF oder SVG herunter. Ideal für Kinder.')
@section('og_title', $drawing->title . ' Ausmalbild - Kostenlos herunterladen')
@section('og_description', 'Kostenlose Ausmalvorlage "' . $drawing->title . '" jetzt als PDF oder SVG herunterladen und sofort ausdrucken!')
@section('og_image', asset('og-images/' . $drawing->slug . '.jpg')) {{-- Ensure this path is correct for your generated OG images --}}

@push('structured_data')
<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "ImageObject",
  "name": "{{ $drawing->title }} Ausmalbild",
  "description": "{{ $drawing->description ?? 'Kostenlose Malvorlage zum Ausdrucken.' }}",
  "contentUrl": "{{ asset('thumbs/' . $drawing->slug . '.jpg') }}", {{-- Assuming this is the main image for schema --}}
  "encodingFormat": "image/jpeg",
  "creator": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}"
  },
  "license": "https://creativecommons.org/licenses/by-nc/4.0/",
  "isAccessibleForFree": true,
  "associatedMedia": [
    {
      "@type": "MediaObject",
      "name": "{{ $drawing->title }} PDF",
      "contentUrl": "{{ route('drawing.download.pdf', $drawing->slug) }}",
      "encodingFormat": "application/pdf"
    },
    {
      "@type": "MediaObject",
      "name": "{{ $drawing->title }} SVG",
      "contentUrl": "{{ route('drawing.download.svg', $drawing->slug) }}",
      "encodingFormat": "image/svg+xml"
    }
  ],
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
        "item": "{{ route('category.drawings', $category->slug) }}"
      },
      {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ $drawing->title }}",
        "item": "{{ url()->current() }}"
      }
    ]
  }
}</script>

<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Wie kann ich das {{ $drawing->title }} Ausmalbild herunterladen?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Sie können das {{ $drawing->title }} Ausmalbild ganz einfach als PDF oder SVG herunterladen. Klicken Sie einfach auf die entsprechenden Download-Buttons unterhalb der Vorschau."
      }
    },
    {
      "@type": "Question",
      "name": "Ist das Ausmalbild {{ $drawing->title }} kostenlos?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ja, alle Ausmalbilder auf unserer Website, einschließlich des {{ $drawing->title }} Motivs, sind komplett kostenlos zum Herunterladen und Ausdrucken für den privaten Gebrauch."
      }
    },
    {
      "@type": "Question",
      "name": "Für welches Alter ist dieses Ausmalbild geeignet?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Das {{ $drawing->title }} Ausmalbild ist für Kinder im Alter von X bis Y Jahren geeignet. (Hier können Sie spezifische Altersgruppen oder Schwierigkeitsgrade hinzufügen, falls Sie diese Daten im $drawing-Objekt haben)."
      }
    },
    {
      "@type": "Question",
      "name": "Kann ich das {{ $drawing->title }} Ausmalbild auch ausdrucken?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolut! Das Ausmalbild ist optimiert für den Ausdruck auf Standard-A4-Papier. Laden Sie einfach die PDF-Version herunter und drucken Sie sie aus."
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
                <li><a href="{{ route('category.drawings', $category->slug) }}" class="hover:text-blue-600 transition-colors">{{ $category->name }} Ausmalbilder</a></li>
                <li class="flex items-center"><svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="text-gray-900 font-medium">{{ $drawing->title }}</li>
            </ol>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 p-8 md:p-12">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">
                    {{ $drawing->title }} Kostenlose Malvorlage
                </h1>
                <p class="text-lg text-gray-600">
                    Kostenlose Malvorlage aus der Kategorie <a href="{{ route('category.drawings', $category->slug) }}" class="text-blue-600 hover:underline font-semibold">{{ $category->name }}</a>.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-6"></div>
            </div>

            @if(file_exists(public_path('thumbs/' . $drawing->slug . '.jpg')))
                <div class="mb-10 text-center">
                    <img src="{{ asset('thumbs/' . $drawing->slug . '.jpg') }}"
                         alt="Ausmalbild {{ $drawing->title }}"
                         class="w-full max-w-lg mx-auto rounded-xl shadow-xl border border-gray-100 object-cover"
                         loading="eager"> {{-- Use eager for primary image --}}
                </div>
            @else
                 <div class="mb-10 text-center">
                    <div class="w-full max-w-lg mx-auto h-80 flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 rounded-xl shadow-xl border border-gray-100">
                        <div class="w-24 h-24 rounded-full bg-white/60 backdrop-blur-sm flex items-center justify-center mb-4 shadow-lg">
                            <svg class="w-12 h-12 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <span class="text-base font-medium text-blue-600 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full">
                            Vorschau wird geladen...
                        </span>
                    </div>
                 </div>
            @endif

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Über dieses Ausmalbild</h2>
                <p>
                    {{ $drawing->description ?? 'Tauchen Sie ein in die Welt der Farben mit dieser kostenlosen Malvorlage von ' . $drawing->title . '. Perfekt, um Kreativität und Feinmotorik zu fördern.' }}
                </p>
                {{-- You can add more descriptive text or features here based on your $drawing object --}}
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-6 mb-12">
                <a href="{{ route('drawing.download.pdf', $drawing->slug) }}"
                   class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    PDF herunterladen
                </a>
                <a href="{{ route('drawing.download.svg', $drawing->slug) }}"
                   class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold rounded-full hover:from-green-600 hover:to-teal-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0011.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    SVG herunterladen
                </a>
            </div>

            {{-- You can optionally include the SVG content directly if performance/SEO benefits are desired and it's well-optimized --}}
            {{-- <div class="border p-4 bg-gray-50 rounded-lg mb-8">
                {!! $drawing->svg_content !!}
            </div> --}}
        </div>

        @if (isset($otherDrawings) && $otherDrawings->count() > 0)
            <section class="py-12 bg-gray-50 rounded-2xl shadow-lg border border-gray-100 mt-12">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            Weitere Ausmalbilder in der Kategorie {{ $category->name }}
                        </h2>
                        <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto"></div>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-4">
                            Entdecken Sie noch mehr tolle Motive in dieser Kategorie!
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
                        @foreach ($otherDrawings as $relatedDrawing)
                            @php
                                $relatedImagePath = (file_exists(public_path('thumbs/' . $relatedDrawing->slug . '.jpg')))
                                             ? asset('thumbs/' . $relatedDrawing->slug . '.jpg')
                                             : null;
                            @endphp
                            <article class="group relative bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                                <a href="{{ route('drawing.show', [$category->slug, $relatedDrawing->slug]) }}" class="block">
                                    <div class="relative w-full h-64 overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                                        @if ($relatedImagePath)
                                            <img src="{{ $relatedImagePath }}"
                                                 alt="Ausmalbild {{ $relatedDrawing->title }} - Kostenlose Malvorlage"
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
                                            {{ $relatedDrawing->title }}
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                            {{ Str::limit($relatedDrawing->description ?? 'Eine wunderschöne ' . $category->name . ' Malvorlage zum kostenlosen Ausdrucken. Perfekt für Kinder jeden Alters zum Ausmalen und Gestalten.', 120) }}
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
                </div>
            </section>
        @endif


        <section class="py-12">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Häufig gestellte Fragen (FAQs) zum {{ $drawing->title }} Ausmalbild
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto"></div>
                </div>

                <div class="space-y-4">
                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Wie kann ich das {{ $drawing->title }} Ausmalbild herunterladen?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Sie können das <strong>{{ $drawing->title }} Ausmalbild</strong> ganz einfach als PDF oder SVG herunterladen. Klicken Sie einfach auf die entsprechenden Download-Buttons unterhalb der Vorschau der Malvorlage.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Ist das Ausmalbild {{ $drawing->title }} kostenlos?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Ja, alle Ausmalbilder auf unserer Website, einschließlich des <strong>{{ $drawing->title }} Motivs</strong>, sind komplett kostenlos zum Herunterladen und Ausdrucken für den privaten Gebrauch. Es gibt keine versteckten Kosten.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Für welches Alter ist dieses Ausmalbild geeignet?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Das {{ $drawing->title }} Ausmalbild ist in der Regel für Kinder ab etwa <strong>3 Jahren</strong> geeignet. Die Details sind so gestaltet, dass sowohl jüngere Kinder mit größeren Flächen als auch ältere Kinder Freude am Ausmalen haben.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Kann ich das {{ $drawing->title }} Ausmalbild auch ausdrucken?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Absolut! Das Ausmalbild ist optimiert für den Ausdruck auf <strong>Standard-A4-Papier</strong>. Laden Sie einfach die PDF-Version herunter und drucken Sie sie mit Ihrem Heimdrucker aus.</p>
                        </div>
                    </details>
                </div>
            </div>
        </section>

    </div>
@endsection