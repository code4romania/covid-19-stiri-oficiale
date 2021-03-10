<?php

namespace App\Nova\MenuBuilderTypes;

use App\Page;
use OptimistDigital\MenuBuilder\MenuItemTypes\MenuItemSelectType;

class PageMenuItem extends MenuItemSelectType
{
    /**
     * Get menu link name shown in CMS when selecting link type.
     * ie ('Product Link' or 'Image Link').
     *
     * @return string
     **/
    public static function getName(): string
    {
        return 'Page';
    }

    public static function getIdentifier(): string
    {
        return 'page';
    }

    /**
     * Get list of options shown in a select dropdown.
     *
     * Should be a map of [key => value, ...], where key is a unique identifier
     * and value is the displayed string.
     *
     * @return array
     **/
    public static function getOptions($locale): array
    {
        return Page::all(['id', 'title'])->toArray();
    }

    /**
     * Get the subtitle value shown in CMS menu items list.
     *
     * @param null $value
     * @param array|null $data The data from item fields.
     * @return string
     */
    public static function getDisplayValue($value = null, array $data = null)
    {
        return 'Page: '. optional(Page::find($value))->title;
    }

    /**
     * Get the value of the link visible to the front-end.
     *
     * Can be anything. It is up to you how you will handle parsing it.
     *
     * This will only be called when using the nova_get_menu()
     * and nova_get_menus() helpers or when you call formatForAPI()
     * on the Menu model.
     *
     * @param null $value The key from options list that was selected.
     * @param array|null $data The data from item fields.
     * @return any
     */
    public static function getValue($value = null, array $data = null)
    {
        return route('pages.show', [
            'slug' => optional(Page::find($value))->slug
        ]);
    }

    /**
     * Get the rules for the resource.
     *
     * @return array A key-value map of attributes and rules.
     */

    public static function getRules(): array
    {
        return [
            'value' => 'required',
        ];
    }
}
