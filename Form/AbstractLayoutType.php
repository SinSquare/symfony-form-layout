<?php

/*
 * This file is part of the FormLayout Bundle.
 *
 * (c) Abel Katona <katona.abel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FormLayoutBundle\Form;

use FormLayoutBundle\FormLayout as Layout;
use Symfony\Component\Form\AbstractType as BaseAbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

abstract class AbstractLayoutType extends BaseAbstractType
{
    const FIELD_ORDER = [];

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $layout = $this->getLayout($view, $form);
        $view->vars['layout'] = $layout->toArray();
    }

    public function sortFields(FormView $view)
    {
        $order = static::FIELD_ORDER;
        if (\is_array($order) && \count($order) > 0) {
            uksort($view->children, function ($a, $b) use ($order) {
                $ap = array_search($a, $order, true);
                $bp = array_search($b, $order, true);

                if (false !== $ap && false === $bp) {
                    return -1;
                } elseif (false === $ap && false !== $bp) {
                    return 1;
                } elseif (false === $ap && false === $bp) {
                    return 0;
                }

                return $ap < $bp ? -1 : 1;
            });
        }
    }

    public function getLayout(FormView $view, FormInterface $form): Layout\AbstractLayout
    {
        $isChild = null !== $form->getParent();

        $this->sortFields($view);

        $fields = new Layout\Fields();
        foreach (array_keys($view->children) as $field) {
            $fields->createField($field);
        }

        if ($isChild) {
            $layout = (new Layout\Row())
                ->createColumn()
                ->addAttributes(['class' => 'col ml-4'])
                ->addChild($fields)
                ->parent()
            ;

            return $layout;
        }

        $layout = new Layout\FormLayout();

        $layout
            ->createRow()
            ->createColumn()
            ->addChild($fields)
            ->parent()
            ->parent()
            ->createRow()
            ->createColumn()
            ->addChild(
                (new Layout\SubmitButton())
                    ->addAttributes([
                        'name' => 'form_save_button',
                        'class' => 'btn btn-primary',
                        'value' => 'save',
                    ])
                    ->setContent('Save')
            )
        ;

        return $layout;
    }
}
