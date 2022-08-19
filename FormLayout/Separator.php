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

class Separator extends AbstractLayout
{
    public function getType(): string
    {
        return 'separator';
    }

    public function addChild(AbstractLayout $child): AbstractLayout
    {
        throw new \Excpetion('Separator does not have any child element.');
    }

    public function removeChild(AbstractLayout $child): AbstractLayout
    {
        throw new \Excpetion('Separator does not have any child element.');
    }
}
