<?php
require_once __DIR__ . "/../functions/start_params.php";

$page = array();
$filters = "";
$projects = "";
$first = true;

$query = "SELECT * FROM pages WHERE page_name='projects_en'";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)){
    $page = $row;
}

$globalSettings['header_en'] = fill_template($globalSettings['header_en'], $page["page_alias"], "class='active'");
$page["page_alias"] = ($page["page_alias"] == "index") ? "" : $page["page_alias"];
$page['page_seo_description'] = html_entity_decode($page['page_seo_description']);

$query = "SELECT * FROM projects_filters WHERE prof_visible='1'";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)){
    $classe_active = "";
    if($first){
        $classe_active = "active";
        $first = false;
    }
    $filters .= <<<HTML
<li class="filter_item $classe_active" data-filter="{$row['prof_filter']}"><a class="filter_link" href="#" title="{$row['prof_name_en']}">{$row['prof_name_en']}</a></li>

HTML;
}

$query = "SELECT * FROM projects WHERE pro_visible='1'";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)){
    $projects .= <<<HTML
<figure class="gallery-grid_item {$row['pro_cat']}">
    <div class="gallery-grid_image-wrap">
        <a href="{$row['pro_link']}" title="{$row['pro_alt_en']}" rel="noreferrer" target="_blank"><img class="gallery-grid_image cover" src="{$row['pro_attachment']}" data-zoom alt="{$row['pro_alt_en']}"/></a>
    </div>
    <figcaption class="gallery-grid_caption">
        <h4 class="title title-h4 gallery-grid_title">{$row['pro_name_en']}</h4>
        <span class="gallery-grid_category">{$row['pro_desc_en']}</span>
    </figcaption>
</figure>

HTML;
}

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
                    <h2 class="title title-h1 title_separate">Projects</h2>
                </div>

                <div class="select section">
                    <span class="placeholder">Select category</span>
                    <ul class="filter">
                        <li class="filter_item">Categories</li>
                        $filters
                    </ul>
                </div>

                <div class="gallery-grid js-grid js-filter-container">
                    <div class="gutter-sizer"></div>

                    $projects
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