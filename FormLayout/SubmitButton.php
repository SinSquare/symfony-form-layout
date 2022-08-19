<?php

/*
 * This file is part of the FormLayout Bundle.
 *
 * (c) Abel Katona <katona.abel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FormLayoutBundle\FormLayout;

class SubmitButton extends Button
{
    private $content;
    private $isRaw = false;

    public function __construct()
    {
        parent::__construct();
        $this->setAttribute('type', 'submit');
    }
}
