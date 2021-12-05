<?php
require_once __DIR__ . "/../functions/start_params.php";

$page = array();

$query = "SELECT * FROM pages WHERE page_name='contact_it'";
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
                    <h2 class="title title-h1 title_separate">Contattami</h2>
                </div>

                <div class="map section">
                    <iframe class="full-iframe" width="600" height="450" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAyYGwgC1H9RDbLwlB77ypinLtIp9A-C1Q&q=Mantua,Italy&zoom=11" allowfullscreen></iframe>
                </div>
                <h2 class="title title-h2">Form di contatto</h2>

                <form id="contact-form" class="contact-form" method="post" action="/functions/contact_form">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <i class="font-icon fas fa-user"></i>
                            <input type="text" class="input input_icon form-control" id="name" name="name" placeholder="Nome" required="required" autocomplete="on">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <i class="font-icon fas fa-envelope"></i>
                            <input type="email" class="input input_icon form-control" id="email" name="email" placeholder="Email" required="required" autocomplete="on">
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <i class="font-icon fas fa-comments"></i>
                            <textarea class="textarea form-control input_icon" id="message" name="message" placeholder="Messaggio" rows="4" required="required"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="contact-form-output badge col-12 text-center d-none">Loading..</div>
                    </div>

                    <div class="row">
				        <div class="col-12 col-md-5 offset-md-1 mb-3 mb-md-0 text-center">
                            <div class="g-recaptcha" data-sitekey="6LdmFLUZAAAAAOzhIBdx-VHxnmsn4ujNjvg7cHbM"></div>
				        </div>
				        <div class="col-12 col-md-6 text-right">
                            <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Invia Messaggio</button>
				        </div>
                    </div>

                </form>
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