<?php

$view     = 'feed::rss';
$type     = 'application/rss+xml';
$language = 'ro-RO';

$titleSuffix = ' - ' . env('APP_NAME', '');
$description = 'O sursă de informare corectă, nealimentată de panică poate ajuta populația României să fie vigilentă în felul în care accesează, asimilează și distribuie rafalele de știri prezentate în media. Informați-vă doar din canalele media oficiale și verificați informațiile de fiecare dată.';

return [
    'feeds' => [
        'informatii' => [
            'items'       => 'App\News@getFeedItems',
            'url'         => '/feeds/informatii.xml',
            'view'        => $view,
            'type'        => $type,
            'language'    => $language,

            'title'       => 'Ultimele informații oficiale' . $titleSuffix,
            'description' => $description,
        ],
        'hotarari' => [
            'items'       => 'App\Decision@getFeedItems',
            'url'         => '/feeds/hotarari.xml',
            'view'        => $view,
            'type'        => $type,
            'language'    => $language,

            'title'       => 'Hotărâri și legislație' . $titleSuffix,
            'description' => $description,
        ],
        'video' => [
            'items'       => 'App\Video@getFeedItems',
            'url'         => '/feeds/video.xml',
            'view'        => $view,
            'type'        => $type,
            'language'    => $language,

            'title'       => 'Înregistrări video' . $titleSuffix,
            'description' => $description,
        ],
    ],
];
