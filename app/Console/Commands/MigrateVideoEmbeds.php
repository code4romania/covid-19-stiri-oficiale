<?php

namespace App\Console\Commands;

use App\Video;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use PHPHtmlParser\Dom;

class MigrateVideoEmbeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert video embeds in short_content to url';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Video::all()->each(function ($video) {
            $this->info("Processing video #{$video->id}");
            $extracted = $this->extractVideoEmbed($video->short_content);

            if (is_null($extracted)) {
                return;
            }

            $video->timestamps = false;
            $video->fill($extracted);
            $video->save();
        });
    }

    public function extractVideoEmbed(string $excerpt): ?array
    {
        $dom = new Dom;

        $dom->load($excerpt, [
            'preserveLineBreaks' => true,
            'htmlSpecialCharsDecode' => true,
        ]);

        $iframe = $dom->find('iframe');

        // No iframe, nothing to do
        if (!$iframe->count()) {
            $this->line('Nothing to process');
            return null;
        }


        // Skip if not a facebook embed
        if (!Str::startsWith($iframe->src, 'https://www.facebook.com/plugins/video.php')) {
            $this->warn('Not a facebook embed, skipping...');
            return null;
        }

        $this->info('Found a valid facebook embed, importing...');

        // Extract the actual video url
        parse_str(parse_url($iframe->src)['query'], $actualVideo);

        // Delete the original iframe node
        $iframe->getParent()->delete();

        return [
            'short_content' => $dom->innerHtml,
            'url'           => $actualVideo['href'],
        ];
    }
}
