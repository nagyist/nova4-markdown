<?php
declare(strict_types=1);

namespace Nagyist\NovaMarkdown;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaMarkdown extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot(): void
    {
        Nova::script('nova-markdown', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-markdown', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param Request $request
     * @return mixed
     */
    public function menu(Request $request): mixed
    {
        return MenuSection::make('Changelog')
            ->path('/nova-markdown')
            ->icon('server');
    }


    public function cards(): array
    {
        return [
            new MarkdownViewerCard(),
        ];
    }

}
