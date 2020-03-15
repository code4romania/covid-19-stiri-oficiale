<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use OptimistDigital\NovaDrafts\DraftButton;
use OptimistDigital\NovaDrafts\PublishedField;
use OptimistDigital\NovaDrafts\UnpublishButton;
use Spatie\TagsField\Tags;

class News extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\News';

    public static function group(): string
    {
        return __('nova.group.articles');
    }

    public static function label(): string
    {
        return __('nova.news.plural');
    }

    public static function singularLabel(): string
    {
        return __('nova.news.singular');
    }


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            TextWithSlug::make('Title', 'title')
                ->slug('slug')->sortable(),
            Slug::make('Slug', 'slug')
                ->hideFromIndex()
                ->creationRules('unique:pages,slug')
                ->updateRules('unique:pages,slug,{{resourceId}}'),
            NovaTinyMCE::make('Descriere scurta', 'short_content')->options([
                'plugins' => [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table directionality',
                    'emoticons template paste textcolor textpattern'
                ],
                'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                'use_lfm' => false,
                'lfm_url' => 'filemanager',
                'height' => '300',
                'max' => '120'
            ])->rules('required'),
            Tags::make('Tag-uri', 'tags'),
            Heading::make('<small class="info">Pentru a adauga tag-ul, apasați tasta ENTER</small>')->asHtml(),
            DateTime::make('Creat la', 'created_at')->format('DD MMM YYYY hh:mm:ss')->readonly()->sortable(),
            DateTime::make('Actualizat la', 'updated_at')->format('DD MMM YYYY hh:mm:ss')->readonly()->sortable(),
            NovaTinyMCE::make('Content', 'content')->options([
                'plugins' => [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table directionality',
                    'emoticons template paste textcolor textpattern'
                ],
                'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                'use_lfm' => false,
                'lfm_url' => 'filemanager',
                'height' => '300'
            ])->rules('required')->hideFromIndex(),
            BelongsTo::make(\Institution::class)->withoutTrashed(),
            Files::make('Files', 'document'),

            UnpublishButton::make('Dezpublica'),
            DraftButton::make('Draft'),
            PublishedField::make('Stare', 'published'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
