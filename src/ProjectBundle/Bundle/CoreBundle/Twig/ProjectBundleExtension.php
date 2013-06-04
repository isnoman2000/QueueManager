<?php

namespace ProjectBundle\Bundle\CoreBundle\Twig;

class ProjectBundleExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'maskNumber' => new \Twig_Filter_Method($this, 'maskNumberFilter'),
        );
    }

    public function maskNumberFilter($number, $char = 'x', $minimumLength = 5)
    {
        if (strlen($number) > $minimumLength) {

            $maskCharacter = $this->prepareMaskCharacterString($char);
            $maskString = substr($number, 2, strlen($number) - 4);
            $maskSub = substr($maskCharacter, 0, strlen($maskString));
            return str_replace($maskString, $maskSub, $number);
        }

        return $number;
    }

    private function prepareMaskCharacterString($char)
    {
        $str = '';
        for ($i = 0; $i < 30; $i++) {
            $str .= $char;
        }
        return $str;
    }

    public function getName()
    {
        return 'projectbundle_extension';
    }
}