<?php
namespace Codex\Core\Http\Controllers;

use Codex\Core\Traits\Hookable;

/**
 * This is the CodexController.
 *
 * @package        Codex\Core
 * @author         Codex Dev Team
 * @copyright      Copyright (c) 2015, Codex
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class CodexController extends Controller
{
    use Hookable;

    /**
     * Redirect to the default project and version.
     *
     * @return Redirect
     */
    public function index()
    {
        $this->runHook('controller:index', [ $this ]);

        return redirect(route('codex.document', [
            'projectSlug' => $this->codex->config('default_project')
        ]));
    }

    /**
     * Render the documentation page for the given project and version.
     *
     * @param string      $projectSlug
     * @param string|null $ref
     * @param string      $path
     *
     * @return $this
     */
    public function document($projectSlug, $ref = null, $path = '')
    {
        if (!$this->codex->projects->has($projectSlug)) {
            return abort(404, 'project does not exist');
        }
        $project = $this->codex->projects->get($projectSlug);

        if (is_null($ref)) {
            $ref = $project->getDefaultRef();
        }
        $project->setRef($ref);
        $path = $path === '' ? 'index' : $path;

        $document = $project->documents->get($path);

        $res = $this->runHook('controller:document', [ $this, $project, $document ]);

        if ($this->isResponse($res)) {
            return $res;
        }

        $content    = $document->render();
        $breadcrumb = $document->getBreadcrumb();

        $this->view->share('project', $project);

        return $this->view->make($document->attr('view'), compact('project', 'document', 'content', 'breadcrumb'));
    }
}
