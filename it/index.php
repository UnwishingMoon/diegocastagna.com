<?php
require_once __DIR__ . "/../functions/start_params.php";

$page = array();

$query = "SELECT * FROM pages WHERE page_name='index_it'";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)){
    $page = $row;
}

$globalSettings['header_it'] = fill_template($globalSettings['header_it'], $page["page_alias"], "class='active'");
$page["page_alias"] = ($page["page_alias"] == "index") ? "" : $page["page_alias"];
$page['page_seo_description'] = html_entity_decode($page['page_seo_description']);

$html = <<<HTML
<!DOCTYPE html>
<html lang="{$page['page_language']}" translate="no">
<head>
    <meta charset="utf-8">
    <title>{$page['page_title']}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://consentcdn.cookiebot.com">

    <!-- SEO Meta -->
    <meta name="description" content="{$page['page_seo_description']}">
    <meta name="keywords" content="{$page['page_seo_keywords']}">
    <meta name="author" content="Diego Castagna">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    {$globalSettings['headJs']}

    {$globalSettings['headFonts']}

    <!-- Other Languages version -->
    <link rel="alternate" hreflang="it" href="{$globalSettings['website_domain']}/it/{$page['page_alias']}"/>
    <link rel="alternate" hreflang="en" href="{$globalSettings['website_domain']}/en/{$page['page_alias']}"/>
    <link rel="alternate" hreflang="x-default" href="{$globalSettings['website_domain']}/en/{$page['page_alias']}"/>

    {$globalSettings['headCss']}

    {$globalSettings['favicons']}

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{$page['page_title']}">
    <meta name="twitter:description" content="{$page['page_seo_description']}">
    <meta name="twitter:site" content="@_diegocastagna">
    <meta name="twitter:creator" content="@_diegocastagna">
    <meta name="twitter:image" content="https://www.diegocastagna.com/assets/favicons/favicon.png">

    <!-- Open Graph -->
    <meta name="og:title" content="{$page['page_title']}"/>
    <meta name="og:type" content="website"/>
    <meta name="og:url" content="{$globalSettings['website_domain']}/{$page['page_language']}/{$page['page_alias']}"/>
    <meta name="og:description" content="{$page['page_seo_description']}"/>
    <meta name="og:site_name" content="diegocastagna">
    <meta name="og:image" content="https://www.diegocastagna.com/assets/favicons/favicon.png">

    <script type="application/ld+json">
    {
        "@context":"http://schema.org",
        "@type":"WebPage",
        "breadcrumb":{
        "@type":"BreadcrumbList",
        "itemListElement":[
            {
                "@type":"ListItem",
                "position":1,
                "item":{
                    "@id":"https://www.diegocastagna.com/",
                    "name":"Home"
                }
            }
        ]
        },
        "mainEntity":"",
        "creator":{
            "@type":"Person",
            "name":"Diego Castagna",
            "description":"{$page['page_seo_description']}",
            "sameAs":[
                "",
                "https://it.linkedin.com/in/diegocastagna",
                "https://twitter.com/_diegocastagna",
                "https://github.com/UnwishingMoon"
            ],
            "knowsAbout":[
                "sviluppo software",
                "software web based",
                "sviluppo api",
                "computer technology",
                "web development",
                "web security"
            ],
            "email":"diego@diegocastagna.com",
            "logo":"https://www.diegocastagna.com/assets/favicons/favicon-192x192.png",
            "image":"https://www.diegocastagna.com/assets/favicons/favicon-192x192.png",
            "url":"https://www.diegocastagna.com/"
        },
        "name":"{$page['page_title']}",
        "description":"{$page['page_seo_description']}"
    }
    </script>
</head>
<body class="bg-triangles">
    {$globalSettings['preloader']}

    <main class="main">
        {$globalSettings['header_it']}

        <div class="wrapper">
            {$globalSettings['sidebar_it']}

            <div class="content" data-simplebar>
                <div class="section mt-0">
                    <h2 class="title title-h1 title_separate">About Me</h2>
                    <div class="pt-2 pt-sm-3">
                        <p>Sono uno <b>sviluppatore software</b>, attualmente risiedo in una piccola cittadina vicina a Mantova. Sviluppo principalmente per il web ma sono sempre aperto a nuove sfide ed esperienze.</p>
                        <p class="mb-0">Finito gli studi mi sono subito buttato nel mondo del lavoro e da quel momento cerco sempre di imparare e mettermi in gioco anche per una crescità personale. Principalmente mi occupo della parte <b>backend</b> delle applicazioni, le quali devono essere <b>funzionali</b>, <b>scalabili</b> e <b>sicure</b> per poter competere nel mondo del <b>business</b>. Sono sempre aperto a nuove sfide ed esperienze, non esitare a contattarmi!</p>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2">Cosa faccio</h2>
                    <div class="row">
                        <div class="col-12 col-lg-6 case-item-wrap">
                            <div class="case-item">
                                <img class="case-item_icon" src="/assets/img/svg/icon-software.svg" alt="Immagine sviluppo software"/>
                                <h3 class="title title-h3">Software Development</h3>
                                <p class="case-item_caption">Sviluppo di software professionale utilizzabile da qualsiasi organizzazione.</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 case-item-wrap">
                            <div class="case-item">
                                <img class="case-item_icon" src="/assets/img/svg/icon-dev.svg" alt="Immagine sviluppo web" />
                                <h3 class="title title-h3">Web Development</h3>
                                <p class="case-item_caption">Sviluppo di siti web responsivi, scalabili e di alta qualit&agrave;.</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 offset-lg-3 case-item-wrap">
                            <div class="case-item">
                                <img class="case-item_icon" src="/assets/img/svg/icon-api.svg" alt="Immagine sviluppo API" />
                                <h3 class="title title-h3">API Development</h3>
                                <p class="case-item_caption">Sviluppo professionale di servizi API utilizzando le pi&ugrave; recenti tecnologie.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2">Testimonianze</h2>
                    <div class="swiper-container js-carousel-review">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide review-item">
                                <a href="https://www.facebook.com/ResyLetter/" target="_blank" rel="noopener noreferrer" title="Lote59">
                                    <svg class="avatar avatar-80" viewBox="0 0 84 84">
                                        <g class="avatar_hexagon">
                                            <image href="/assets/img/testimonial-2.fn2y183.jpg" alt="Immagine primo testimonial" height="100%" width="100%" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/ResyLetter/" target="_blank" rel="noopener noreferrer" title="Lote59"><h3 class="title title-h3">Vitor Oliveira</h3></a>
                                <p class="review-item_caption">Ringraziamo Diego per il magnifico lavoro eseguito nell'aiutarci a sviluppare il nostro programma. Professionale, vivace e sicuro di s&egrave;. Siamo rimasti molto soddisfatti del lavoro svolto.</p>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {$globalSettings['svgMarks']}

    {$globalSettings['footerJs']}
    {$globalSettings['footerJs_it']}
</body>
</html>
HTML;

echo $html;