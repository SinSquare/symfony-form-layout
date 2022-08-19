# Form Layout Bundle

**Symfony bundle for rendering form into a given layout without the need of custom templates**

## Install

Install this bundle via Composer:

``` bash
$ composer require subbeta/form-layout-bundle

```

First, register the bundle:

```php
# config/bundles.php
return [
    // ...
    FormLayoutBundle\FormLayoutBundle::class => ['all' => true],
];

```

Add the layout twig globall:

```yaml
# config/packages/twig.yaml
twig:
    # ...
    form_themes:
            - '@FormLayout/form/layout.html.twig'
```
or you can set it in the template with

```twig
{% form_theme form with ['@FormLayout/form/layout.html.twig'] %}

```

## Create a form

```php
use FormLayoutBundle\Form\AbstractLayoutType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class MyType extends AbstractLayoutType
{    
    // ... 
    public function getLayout(FormView $view, FormInterface $form): Layout\AbstractLayout
    {
        $this->sortFields($view);

        $layout = new Layout\FormLayout();
        
        // ...

        return $layout;
    }
}

```

## Render the form in the template

```twig
{# ... #}

{{ form(form) }}

{# OR if you want to render additional elements #}

{{ form_start(form) }}
    {# add the additional elements here #}
    
    {% use '@FormLayout/form/form_layout.html.twig' %}
    {{ block('formlayout_layout') }}
    
    {# or here #}
{{ form_end(form) }}

```

## Creating custom layout element

#### create the layout class

```php
use FormLayoutBundle\FormLayout\AbstractLayout;

class MyLayout extends AbstractLayout
{
    public function getType(): string
    {
        return 'mylayout';
    }

    // ...
}

```

#### create the layout template

```twig
{% block formlayout_mylayout %}
    {# ... #}
{% endblock formlayout_form %}

```