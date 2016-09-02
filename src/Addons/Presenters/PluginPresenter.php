<?php
/**
 * Part of the Codex Project packages.
 *
 * License and copyright information bundled with this package in the LICENSE file.
 *
 * @author    Robin Radic
 * @copyright Copyright 2016 (c) Codex Project
 * @license   http://codex-project.ninja/license The MIT License
 */
namespace Codex\Addons\Presenters;

use Codex\Addons\Annotations\Plugin;

/**
 * This is the class PluginPresenter.
 *
 * @package        Codex\Addons
 * @author         Radic
 * @copyright      Copyright (c) 2015, Radic. All rights reserved
 * @mixin Plugin
 */
class PluginPresenter extends Presenter
{
    /** @var Plugin */
    public $annotation;

    /**
     * @var string
     */
    public $name;

    /**
     * (optional) The property name of the default configuration this filter has. During runtime, this will be replaced with the actual, processed config Collection
     * @var array
     */
    public $requires = [];

    /**
     * If this filter replaces another (like extending), note its name here
     * @var string
     */
    public $replace;

}
