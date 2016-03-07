<?php
/**
 * Part of the Codex Project PHP packages.
 *
 * License and copyright information bundled with this package in the LICENSE file
 */


namespace Codex\Core\Contracts;


interface Extendable
{

    public function extensions();

    public function extend($name, $extension);

}