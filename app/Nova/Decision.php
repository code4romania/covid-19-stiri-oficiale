<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use OptimistDigital\NovaDrafts;
use OptimistDigital\NovaDrafts\DraftButton;
use OptimistDigital\NovaDrafts\PublishedField;
use OptimistDigital\NovaDrafts\UnpublishButton;


class Decision extends Resource
{

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Decision';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';


    public static function group(): string
    {
        return __('nova.group.articles');
    }

    public static function label(): string
    {
        return __('nova.decision.plural');
    }

    public static function singularLabel(): string
    {
        return __('nova.decision.singular');
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            TextWithSlug::make('Title')
                ->slug('slug')->sortable(),
            Slug::make('Slug', 'slug')->hideFromIndex(),
            NovaTinyMCE::make('Descriere scurta', 'short_content')->options([
                'plugins' => [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table directionality',
                    'emoticons template paste textcolor textpattern'
                ],
                'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                'use_lfm' => true,
                'lfm_url' => 'filemanager',
                'height' => '300',
                'max'=>'120'
            ])->rules('required'),
            Date::make('Created','created_at')->format('DD MMM YYYY')->readonly()->sortable(),
            NovaTinyMCE::make('Content', 'content')->options([
                'plugins' => [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table directionality',
                    'emoticons template paste textcolor textpattern'
                ],
                'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                'use_lfm' => true,
                'lfm_url' => 'filemanager',
                'height' => '300'
            ])->rules('required')->hideFromIndex(),
            BelongsTo::make(\Institution::class)->withoutTrashed(),
            Files::make('Files', 'multiple_files'),

            UnpublishButton::make('Dezpublica'),
            DraftButton::make('Draft'),
            PublishedField::make('Stare', 'published'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
