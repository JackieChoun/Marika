<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  >
    <head>
        @verbatim
        <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@type": "Person",
            "name": "Marika Perros",
            "image": "https://marikaperros.com/images/marika.jpg",
            "url": "https://marikaperros.com",
            "description": "Artiste peintre contemporaine basée à Toulouse.",
            "jobTitle": "Artiste peintre",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Toulouse",
                "addressCountry": "FR"
            },
            "sameAs": [
                "https://www.instagram.com/marika_perros/",
                "https://www.facebook.com/marikaperrosartiste/?locale=fr_FR"
            ]
            }
        </script>
        @endverbatim
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $page['props']['seo']['description'] ?? 'Marika Perros, artiste peintre à Toulouse.' }}">
        <meta property="og:title" content="{{ $page['props']['seo']['title'] ?? config('app.name') }}">
        <meta property="og:description" content="{{ $page['props']['seo']['description'] ?? '' }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <title inertia>{{ $page['props']['seo']['title'] ?? config('app.name') }}</title>
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        @inertiaHead
        
    </head>
    <body class="font-montserrat antialiased">
        @inertia
    </body>
</html>
