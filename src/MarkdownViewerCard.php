<?php
declare(strict_types=1);

namespace Nagyist\NovaMarkdown;

use Laravel\Nova\Card;
use Michelf\Markdown;

class MarkdownViewerCard extends Card
{
    /**
     * The component's name.
     *
     * @var string
     */
    public $component = 'markdown-viewer-card';

    /**
     * Get the component's additional JSON data.
     *
     * @return string
     */
    public function toHtml(string $markDown): string
    {
        return Markdown::defaultTransform($markDown);
    }
}
