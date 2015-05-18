<?php

namespace Ragsnas\RagsnasWrapMyUrlBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\Routing\Generator\UrlGenerator as SymfonyUrlGenerator;
use Psr\Log\LoggerInterface;

class UrlGenerator extends SymfonyUrlGenerator
{

    /**
     * {@inheritdoc}
     */
    protected function doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, array $requiredSchemes = array())
    {
        $doNotWrap = false;
        if(isset($parameters['do-not-wrap'])) {
            $doNotWrap = true;
            unset ($parameters['do-not-wrap']);
        }
        $path = parent::doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);

        if (!$doNotWrap && $this->context->getWrapMyUrlWrap() && stripos(strtolower($path), 'sf2path') === false) {
            return sprintf(
                $this->context->getWrapMyUrlWrap(),
                ($this->context->isWrapMyUrlUrlencode() ? urlencode($path) : $path)
            );
        }

        return $path;
    }
}
