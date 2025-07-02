@extends('layouts.app')

@section('title', 'Malvorlagen zum Ausdrucken – Kostenlos für Kinder in der Schweiz')
@section('meta_description', 'Entdecken Sie kostenlose Ausmalbilder für Kinder zum Ausdrucken. Über 200 Motive in Kategorien wie Tiere, Fahrzeuge, Anime und mehr – perfekt für kreative Stunden daheim oder unterwegs!')

@section('content')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Malspass Schweiz",
      "url": "https://www.malspass.ch/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.malspass.ch/suche?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="absolute inset-0 bg-white/20"></div>
        <div class="relative container mx-auto px-4 py-16 md:py-24">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight mb-6">
                    Kostenlose 
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Malvorlagen
                    </span>
                    zum Ausdrucken
                </h1>
                <p class="text-xl md:text-2xl text-gray-700 mb-8 leading-relaxed">
                    Tauchen Sie ein in eine Welt voller Farben und Kreativität! Wählen Sie aus über 200 einzigartigen Malvorlagen in verschiedenen Kategorien.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-lg">
                    <span class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-700 shadow-sm">
                        🐶 Tiere
                    </span>
                    <span class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-700 shadow-sm">
                        🚗 Fahrzeuge
                    </span>
                    <span class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-700 shadow-sm">
                        🎌 Anime
                    </span>
                    <span class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-700 shadow-sm">
                        🎄 Weihnachten
                    </span>
                    <span class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-700 shadow-sm">
                        🐰 Ostern
                    </span>
                </div>
                <div class="mt-8 text-gray-600">
                    <p class="font-medium">Einfach als PDF oder SVG herunterladen • Ausdrucken • Sofort loslegen!</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
                    Unsere Themenwelten
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Entdecken Sie eine vielfältige Sammlung von Malvorlagen für jeden Geschmack
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($categories as $category)
                    @php
                        $drawing = $category->drawings->first();
                        $imagePath = ($drawing && file_exists(public_path('thumbs/' . $drawing->slug . '.jpg')))
                                     ? asset('thumbs/' . $drawing->slug . '.jpg')
                                     : null;
                    @endphp

                    <a href="{{ route('category.drawings', $category->slug) }}"
                       class="group relative bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">

                        <div class="relative w-full h-64 overflow-hidden">
                            @if ($imagePath)
                                <img src="{{ $imagePath }}"
                                     alt="Ausmalbild {{ $drawing->title }} für {{ $category->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 to-indigo-100">
                                    <div class="w-20 h-20 rounded-full bg-white/50 flex items-center justify-center mb-3">
                                        <svg class="w-10 h-10 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-blue-600">Kommt bald</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $category->name }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                {{ $category->description ?? 'Entdecken Sie eine vielfältige Auswahl an Malvorlagen in dieser Kategorie. Perfekt für stundenlangen Malspass!' }}
                            </p>
                            <div class="flex items-center text-blue-600 font-medium text-sm">
                                <span>Kategorie entdecken</span>
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Benefits Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
                        Warum Ausmalbilder so wertvoll sind
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Malen ist weit mehr als nur ein Zeitvertreib. Es fördert bei Kindern wichtige Fähigkeiten und unterstützt ihre Entwicklung auf vielfältige Weise.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="relative p-8 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-100">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Feinmotorik & Hand-Auge-Koordination</h3>
                        <p class="text-gray-600 leading-relaxed">Das präzise Ausmalen kleiner Flächen verbessert die Geschicklichkeit der Hände und die Koordination zwischen Auge und Hand.</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100">
                        <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Kreativität & Vorstellungskraft</h3>
                        <p class="text-gray-600 leading-relaxed">Kinder können Farben frei wählen und ihre eigene Welt gestalten, was die Fantasie anregt und kreatives Denken fördert.</p>
                    </div>

                    <div class="relative p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                        <div class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Konzentration & Geduld</h3>
                        <p class="text-gray-600 leading-relaxed">Das Festhalten an einer Aufgabe über längere Zeit stärkt die Konzentrationsfähigkeit und lehrt Kindern Geduld.</p>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                        Geben Sie Ihren Kindern die Möglichkeit, diese wertvollen Kompetenzen spielerisch zu entwickeln – mit unseren kostenlosen Malvorlagen!
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
                        Häufig gestellte Fragen
                    </h2>
                    <p class="text-xl text-gray-600">
                        Hier finden Sie Antworten auf die wichtigsten Fragen zu unseren Malvorlagen
                    </p>
                </div>

                {{-- Schema.org for FAQPage --}}
                <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "FAQPage",
                  "mainEntity": [
                    {
                      "@type": "Question",
                      "name": "Sind die Malvorlagen wirklich komplett kostenlos?",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Ja, alle Malvorlagen auf unserer Webseite sind zu 100% kostenlos und können beliebig oft heruntergeladen und ausgedruckt werden. Es gibt keine versteckten Kosten oder Abonnements."
                      }
                    },
                    {
                      "@type": "Question",
                      "name": "In welchen Formaten kann ich die Malvorlagen herunterladen?",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Sie können jede Malvorlage entweder als PDF (zum einfachen Ausdrucken) oder als SVG (für digitale Bearbeitung oder höhere Skalierbarkeit) herunterladen."
                      }
                    },
                    {
                      "@type": "Question",
                      "name": "Gibt es Malvorlagen für verschiedene Altersgruppen?",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Ja, unsere Sammlung umfasst Motive für Kleinkinder, Vorschulkinder und auch ältere Kinder. Die Komplexität variiert je nach Kategorie und Motiv, sodass für jedes Alter etwas Passendes dabei ist."
                      }
                    },
                    {
                      "@type": "Question",
                      "name": "Wie kann ich eine bestimmte Malvorlage finden?",
                      "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Sie können entweder durch unsere Kategorien stöbern oder die Suchfunktion auf unserer Webseite nutzen, um gezielt nach Motiven oder Themen zu suchen."
                      }
                    }
                  ]
                }
                </script>

                <div class="space-y-4">
                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Sind die Malvorlagen wirklich komplett kostenlos?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Ja, alle Malvorlagen auf unserer Webseite sind zu 100% kostenlos und können beliebig oft heruntergeladen und ausgedruckt werden. Es gibt keine versteckten Kosten oder Abonnements.</p>
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
                            <p class="leading-relaxed">Sie können jede Malvorlage entweder als <strong>PDF</strong> (zum einfachen Ausdrucken) oder als <strong>SVG</strong> (für digitale Bearbeitung oder höhere Skalierbarkeit) herunterladen.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Gibt es Malvorlagen für verschiedene Altersgruppen?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Ja, unsere Sammlung umfasst Motive für Kleinkinder, Vorschulkinder und auch ältere Kinder. Die Komplexität variiert je nach Kategorie und Motiv, sodass für jedes Alter etwas Passendes dabei ist.</p>
                        </div>
                    </details>

                    <details class="faq-item bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                        <summary class="w-full px-6 py-5 cursor-pointer flex justify-between items-center hover:bg-gray-50 transition-colors duration-200 list-none">
                            <span class="font-semibold text-lg text-gray-900">Wie kann ich eine bestimmte Malvorlage finden?</span>
                            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 border-t border-gray-100 text-gray-700 bg-gray-50/50">
                            <p class="leading-relaxed">Sie können entweder durch unsere Kategorien stöbern oder die Suchfunktion auf unserer Webseite nutzen, um gezielt nach Motiven oder Themen zu suchen.</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </section>

@endsection