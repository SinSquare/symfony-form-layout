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

class Button extends AbstractLayout
{
    private $content;
    private $isRaw = false;

    public function __construct()
    {
        $this->setAttribute('class', 'btn');
    }

    public function addChild(AbstractLayout $child): AbstractLayout
    {
        throw new \Excpetion('Button does not have any child element.');
    }

    public function removeChild(AbstractLayout $child): AbstractLayout
    {
        throw new \Excpetion();
    }

    public function getType(): string
    {
        return 'button';
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setIsRaw(bool $isRaw): self
    {
        $this->isRaw = $isRaw;

        return $this;
    }

    public function getIsRaw(): bool
    {
        return $this->isRaw;
    }

    public function toArray(): array
    {
        $arr = parent::toArray();
        $arr['is_raw'] = $this->getIsRaw();
        $arr['content'] = $this->getContent();

        return $arr;
    }
}
