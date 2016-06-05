<?php
namespace Codex\Dev\Metas;

use Sebwite\IdeaMeta\Metas\BaseMeta;

class CodexProjectsMeta extends BaseMeta
{
    protected $methods = [
        'new \Codex\Projects\Projects',
        '\Codex\Projects\Projects::get(\'\')',
    ];

    public function getData()
    {
        $projects = [ ];
        /** @var \Codex\Codex $codex */
        $codex = app('Codex\Contracts\Codex');
        foreach ($codex->projects->all() as $project) {
            /** @var \Codex\Projects\Project $project */
            $projects[ $project->getName() ] = 'Codex\Projects\Project';
        }

        return $projects;
    }


    public static function canRun()
    {
        return true;
    }
}
