<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function download(string $uuid)
    {
        $mediaItem = Media::where('uuid', $uuid)->firstOrFail();

        return response()->download($mediaItem->getPath(), $mediaItem->file_name);
    }
}
