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

class Field extends AbstractLayout
{
    private $field;

    public function __construct(string $field = null)
    {
        if (!empty($field)) {
            $this->setField($field);
        }
    }

    public function addChild(AbstractLayout $child): AbstractLayout
    {
        throw new \Excpetion('Field does not have any child element.');
    }

    public function removeChild(AbstractLayout $child): AbstractLayout
    {
        throw new \Excpetion('Field does not have any child element.');
    }

    public function getType(): string
    {
        return 'field';
    }

    public function setField(string $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function toArray(): array
    {
        $arr = parent::toArray();
        $arr['field'] = $this->getField();

        return $arr;
    }
}
