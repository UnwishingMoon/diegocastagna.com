<?php
require_once __DIR__ . "/../functions/start_params.php";

$page = array();

$query = "SELECT * FROM pages WHERE page_name='resume_it'";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)) {
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
                    <h2 class="title title-h1 title_separate">Esperienza</h2>
                </div>

                <div class="section">
                    <h2 class="title title-h2"><img class="title-icon" src="/assets/img/svg/icon-education.svg" alt="Immagine educazione" /> Educazione</h2>
                    <div class="timeline">
                        <article class="timeline_item">
                            <h5 class="title title-h3 timeline_title">ITIS Enrico Fermi Mantova</h5>
                            <span class="timeline_period">2014 — 2019</span>
                            <p class="timeline_description">Dalle basi dell'informatica fino a sapere molti linguaggi e a come impararne dei nuovi per tenersi sempre aggiornati.</p>
                        </article>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2"><img class="title-icon" src="/assets/img/svg/icon-experience.svg" alt="Immagine esperienza" /> Esperienza</h2>
                    <div class="timeline">
                        <article class="timeline_item">
                            <h5 class="title title-h3 timeline_title">Web / Software Developer — Webinteam</h5>
                            <span class="timeline_period">2019 — Presente</span>
                            <p class="timeline_description">Sviluppo di software web based e gestione dell'infrastruttura dei clienti per poter migliorare, ottimizzare, monitorare il lavoro e il ciclo produttivo.</p>
                        </article>

                        <article class="timeline_item">
                            <h5 class="title title-h3 timeline_title">Web / Backend Developer — Erasmus</h5>
                            <span class="timeline_period">Lug 2018 — Ago 2018</span>
                            <p class="timeline_description">Dal design di siti web comprensivi di frontend, backend e database fino alla loro creazione e messa online. Set-up dell'ambiente server e software per permettere agli utenti di visualizzare, navigare e gestire i siti correttamente.</p>
                        </article>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2">Attestati</h2>
                    <div class="box-gray">
                        <div class="skill">
                            <a href="/files/certifications/aws-acloudguru.pdf" target="_blank" rel="noreferrer">AWS - ACloudGuru</a>
                        </div>
                        <div class="skill">
                            <a href="/files/certifications/devops-acloudguru.pdf" target="_blank" rel="noreferrer">DevOps - ACloudGuru</a>
                        </div>
                        <div class="skill">
                            <a href="/files/certifications/cert-docker-2021-11-24.pdf" target="_blank" rel="noreferrer">Docker</a>
                        </div>
                        <div class="skill">
                            <a href="/files/certifications/cert-git-2021-11-12.pdf" target="_blank" rel="noreferrer">Git</a>
                        </div>
                        <div class="skill">
                            <a href="/files/certifications/certs-php-2022-02-23.pdf" target="_blank" rel="noreferrer">PHP</a>
                        </div>
                        <div class="skill">
                            <a href="/files/certifications/certs-mysql-2022-07-12.pdf" target="_blank" rel="noreferrer">MySQL</a>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="title title-h2">Skills</h2>
                    <div class="box-gray">
                        <div class="skill">
                            <span>PHP</span>
                        </div>
                        <div class="skill">
                            <span>MySQL</span>
                        </div>
                        <div class="skill">
                            <span>Golang</span>
                        </div>
                        <div class="skill">
                            <span>AWS</span>
                        </div>
                        <div class="skill">
                            <span>Python</span>
                        </div>
                        <div class="skill">
                            <span>Docker</span>
                        </div>
                        <div class="skill">
                            <span>HTML5</span>
                        </div>
                        <div class="skill">
                            <span>Javascript</span>
                        </div>
                        <div class="skill">
                            <span>jQuery</span>
                        </div>
                        <div class="skill">
                            <span>CSS3</span>
                        </div>
                        <div class="skill">
                            <span>Bootstrap</span>
                        </div>
                        <div class="skill">
                            <span>C&plus;&plus;</span>
                        </div>
                        <div class="skill">
                            <span>C</span>
                        </div>
                        <div class="skill">
                            <span>Android</span>
                        </div>
                        <div class="skill">
                            <span>Linux</span>
                        </div>
                        <div class="skill">
                            <span>Java</span>
                        </div>
                        <div class="skill">
                            <span>MariaDB</span>
                        </div>
                        <div class="skill">
                            <span>TensorFlow</span>
                        </div>
                        <div class="skill">
                            <span>OracleDB</span>
                        </div>
                        <div class="skill">
                            <span>Bash / Sh</span>
                        </div>
                        <div class="skill">
                            <span>PostgreSQL</span>
                        </div>
                        <div class="skill">
                            <span>NodeJS</span>
                        </div>
                        <div class="skill">
                            <span>Ansible</span>
                        </div>
                        <div class="skill">
                            <span>Terraform</span>
                        </div>
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
