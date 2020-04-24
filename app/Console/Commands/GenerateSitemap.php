<?php

namespace App\Console\Commands;

use App\Decision;
use App\News;
use App\Video;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Columns to fetch from the database
     *
     * @var array<string>
     */
    protected $columns = ['slug', 'updated_at'];

    /** @var Sitemap */
    protected $sitemap;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->sitemap = Sitemap::create();

        $this->addItemsForModel('news', News::withoutEagerLoading()->listing()->get($this->columns));
        $this->addItemsForModel('decisions', Decision::withoutEagerLoading()->listing()->get($this->columns));
        $this->addItemsForModel('videos', Video::withoutEagerLoading()->listing()->get($this->columns));

        $this->sitemap->writeToFile(public_path('sitemap.xml'));
    }

    protected function addItemsForModel(string $name, Collection $items): void
    {
        // Index: first page
        $latestItem = $items->first();
        $this->tag(route("{$name}.index"), $latestItem->updated_at);

        // Index: numbered pages
        $pageCount = intval(ceil($items->count() / $latestItem->getPerPage()));
        for ($page = 2; $page <= $pageCount; $page++) {
            $this->tag(route("{$name}.index", ['page' => $page]), $latestItem->updated_at);
        }

        // Items
        $items->each(fn ($item) => $this->tag(route("{$name}.show", $item->slug), $item->updated_at));
    }

    protected function tag(string $url, Carbon $updated_at, string $changefreq = '', int $priority = 0): void
    {
        $this->sitemap->add(
            Url::create($url)
                ->setLastModificationDate($updated_at)
                ->setChangeFrequency($changefreq)
                ->setPriority($priority)
        );
    }
}
