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
        $path = parent::doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);

        if ($this->context->getWrapMyUrlWrap()) {
            return sprintf(
                $this->context->getWrapMyUrlWrap(),
                ($this->context->isWrapMyUrlUrlencode() ? urlencode($path) : $path)
            );
        }

        return $path;
    }
}
