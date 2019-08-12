<?php

namespace App\Elements;

use Curlyspoon\Cms\Libs\Element as CurlyspoonElement;
use Symfony\Component\OptionsResolver\OptionsResolver as SymfonyOptionsResolver;

abstract class Element extends CurlyspoonElement
{
    protected function optionsResolver(): SymfonyOptionsResolver
    {
        $resolver = parent::optionsResolver();

        $resolver->setDefined('section_class');
        $resolver->setDefault('section_class', '');
        $resolver->addAllowedTypes('section_class', 'string');

        return $resolver;
    }
}
