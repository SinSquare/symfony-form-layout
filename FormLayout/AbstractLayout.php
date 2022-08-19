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

abstract class AbstractLayout
{
    /**
     * @var AbstractLayout
     */
    protected $parent;
    /**
     * @var []
     */
    protected $attributes = [];
    /**
     * @var AbstractLayout[]
     */
    protected $children = [];

    abstract public function getType(): string;

    public function toArray(): array
    {
        $children = array_map(
            function ($c) {
                return $c->toArray();
            },
            $this->getChildren()
        );

        return [
            'type' => $this->getType(),
            'attributes' => $this->getAttributes(),
            'children' => $children,
        ];
    }

    // attributes

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function addAttributes(array $parameters = []): self
    {
        $this->attributes = array_replace($this->attributes, $parameters);

        return $this;
    }

    public function replaceAttributes(array $parameters = []): self
    {
        $this->attributes = $parameters;

        return $this;
    }

    public function getAttribute($key, $default = null)
    {
        return \array_key_exists($key, $this->attributes) ? $this->attributes[$key] : $default;
    }

    public function setAttribute($key, $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function remove($key): self
    {
        unset($this->attributes[$key]);

        return $this;
    }

    public function setParent(self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function parent(): self
    {
        return $this->parent;
    }

    public function addChild(self $child): self
    {
        $child->setParent($this);

        $id = spl_object_hash($child);
        $this->children[$id] = $child;

        return $this;
    }

    public function removeChild(self $child): self
    {
        $id = spl_object_hash($child);
        unset($this->children[$id]);

        return $this;
    }

    public function getChildren(): array
    {
        return $this->children;
    }
}
