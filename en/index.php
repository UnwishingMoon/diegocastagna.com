<?php
require_once __DIR__ . "/../functions/start_params.php";

$page = array();

$query = "SELECT * FROM pages WHERE page_name='index_en'";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)){
    $page = $row;
}

$globalSettings['header_en'] = fill_template($globalSettings['header_en'], $page["page_alias"], "class='active'");
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
        {$globalSettings['header_en']}

        <div class="wrapper">
            {$globalSettings['sidebar_en']}

            <div class="content" data-simplebar>
                <div class="section mt-0">
                    <h2 class="title title-h1 title_separate">About Me</h2>
                    <div class="pt-2 pt-sm-3">
                        <p>I'm a <b>software developer</b>, currently I live in a small town near Mantua. I develop mainly for the web but I am always open to new challenges and experiences.</p>
                        <p class="mb-0">After completing my studies, I immediately threw myself into the world of work and from that moment on I always try to learn and get involved also for personal growth. Mainly I deal with the <b>backend</b> part of applications, which must be <b>functional</b>, <b>scalable</b> and <b>secure</b> in order to compete in the <b>business</b> world. I'm always open to new challenges and experiences, do not hesitate to contact me!</p>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2">What I do</h2>
                    <div class="row">
                        <div class="col-12 col-lg-6 case-item-wrap">
                            <div class="case-item">
                                <img class="case-item_icon" src="/assets/img/svg/icon-software.svg" alt="Image Software Development"/>
                                <h3 class="title title-h3">Software Development</h3>
                                <p class="case-item_caption">Professional software development that can be used by any organization.</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 case-item-wrap">
                            <div class="case-item">
                                <img class="case-item_icon" src="/assets/img/svg/icon-dev.svg" alt="Image Web development" />
                                <h3 class="title title-h3">Web Development</h3>
                                <p class="case-item_caption">Responsive, scalable and high quality website development.</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 offset-lg-3 case-item-wrap">
                            <div class="case-item">
                                <img class="case-item_icon" src="/assets/img/svg/icon-api.svg" alt="Image API Development" />
                                <h3 class="title title-h3">API Development</h3>
                                <p class="case-item_caption">Professional development of API services using the latest technologies.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2">Testimonials</h2>
                    <div class="swiper-container js-carousel-review">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide review-item">
                                <a href="https://www.facebook.com/ResyLetter/" target="_blank" rel="noopener noreferrer" title="Lote59">
                                    <svg class="avatar avatar-80" viewBox="0 0 84 84">
                                        <g class="avatar_hexagon">
                                            <image href="/assets/img/testimonial-2.fn2y183.jpg" alt="Image first testimonial" height="100%" width="100%" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/ResyLetter/" target="_blank" rel="noopener noreferrer" title="Lote59"><h3 class="title title-h3">Vitor Oliveira</h3></a>
                                <p class="review-item_caption">We thanks Diego for the wonderful job in helping us develop our program. Professional, excellent and hard working. We were very pleased with the work done.</p>
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
    {$globalSettings['footerJs_en']}
</body>
</html>
HTML;

echo $html;