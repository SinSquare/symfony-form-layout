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

class Fields extends AbstractLayout
{
    public function getType(): string
    {
        return 'fields';
    }

    public function addChild(AbstractLayout $child): AbstractLayout
    {
        if (!$child instanceof Field) {
            throw new \Excpetion('Child must be of class Field.');
        }

        return parent::addChild($child);
    }

    public function createField(string $field = null): Field
    {
        $field = new Field($field);
        $field->setParent($this);

        $this->addChild($field);

        return $field;
    }

    public function addFields(array $fields): self
    {
        foreach ($fields as $f) {
            if (\is_string($f)) {
                $this->createField($f);
            } else {
                $this->addChild($f);
            }
        }

        return $this;
    }
}
