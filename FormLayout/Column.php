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

class Column extends AbstractLayout
{
    public function __construct()
    {
        $this->setAttribute('class', 'col');
    }

    public function getType(): string
    {
        return 'column';
    }

    public function createFields(): Fields
    {
        $fields = new Fields();
        $fields->setParent($this);

        $this->addChild($fields);

        return $fields;
    }
}
