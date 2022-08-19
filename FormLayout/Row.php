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

class Row extends AbstractLayout
{
    public function __construct()
    {
        $this->setAttribute('class', 'form-row');
    }

    public function getType(): string
    {
        return 'row';
    }

    public function createColumn(): Column
    {
        $column = new Column();
        $column->setParent($this);

        $this->addChild($column);

        return $column;
    }
}
