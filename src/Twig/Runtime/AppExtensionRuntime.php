<?php

namespace App\Twig\Runtime;

use App\Service\UploaderHelper;
use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;
use Twig\Extension\RuntimeExtensionInterface;

class AppExtensionRuntime implements RuntimeExtensionInterface, ServiceSubscriberInterface
{
    private $container;
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function getUploadedAssetPath($path)
    {
        return $this->container->get(UploaderHelper::class)->getPublicPath($path);
    }

    public static function getSubscribedServices(): array
    {
        return [
            UploaderHelper::class,
        ];
    }
}
