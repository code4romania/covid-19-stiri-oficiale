<?php

namespace App\Nova;

use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class SidebarItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\SidebarItem';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
        'description',
    ];


    public static function label(): string
    {
        return __('nova.sidebarItem.plural');
    }

    public static function singularLabel(): string
    {
        return __('nova.sidebarItem.singular');
    }

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
            Text::make('Title', 'title')
                ->creationRules('required'),
            NovaTinyMCE::make('Description', 'description')->options([
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
            ])->nullable(),
            Text::make('Text button')->nullable(),
            Text::make('Link button')->nullable(),
            Select::make('Color')
                ->options(array(
                    'teal' => 'Teal',
                    'cyan' => 'Cyan',
                    'yellow' => 'Yellow',
                    'orange' => 'Orange',
                    'red' => 'Red',
                    'pink' => 'Pink',
                    'default' => 'Default',
                ))
                ->displayUsingLabels()
                ->creationRules('required'),


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
