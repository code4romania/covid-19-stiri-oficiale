<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Normalize
{
    /**
     * Strip tags and normalize the string to lowercase ascii.
     *
     * @param string $string
     * @return string
     */
    public static function string(string $string): string
    {
        return Str::of(html_entity_decode(strip_tags($string)))
            ->lower()
            ->ascii();
    }
}
