<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSeo(array $params = []): void
    {
        $defaults = [
            'title'       => '',
            'description' => '',
        ];

        $params = array_merge($defaults, $params);

        if (!empty($params['title'])) {
            SEOTools::setTitle($params['title']);
        }

        $description = Str::limit(strip_tags($params['description']), 170);
        if (!empty($description)) {
            SEOTools::setDescription($description);
        }
    }
}
