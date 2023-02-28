<?php
declare(strict_types=1);

namespace Nagyist\NovaMarkdown\Http\Controllers;

use Illuminate\Support\HtmlString;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MarkdownToolController extends Controller
{
    public function index(Request $request): string
    {
        $changelogFile = base_path() . '/CHANGELOG.md';
        if (!file_exists($changelogFile)) {
            file_put_contents($changelogFile, '## [Unreleased]');
        }

        $changelogMarkdown = file_get_contents($changelogFile);

        $parseDown = new \Parsedown();
        $return = (string)new HtmlString($parseDown->text($changelogMarkdown));
        return $return;
    }
}
