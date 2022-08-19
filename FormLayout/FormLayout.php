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

class FormLayout extends AbstractLayout
{
    public function getType(): string
    {
        return 'form';
    }

    public function createRow(): Row
    {
        $row = new Row();
        $row->setParent($this);

        $this->addChild($row);

        return $row;
    }

    public function setParent(AbstractLayout $parent): AbstractLayout
    {
        throw new \Exception("Layout can't have a parent!");
    }
}
