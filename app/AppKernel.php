<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function __construct($environment, $debug)
    {
        date_default_timezone_set('Europe/Amsterdam');
        parent::__construct($environment, $debug);
    }

    public function registerBundles()
    {
        $bundles = array(
            /*Symfony / Doctrine / Sensio Core */
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle(),
            /* TreeHouseLabs */
            new TreeHouse\WorkerBundle\TreeHouseWorkerBundle(),
            new Stef\PhotoConverterBundle\StefPhotoConverterBundle(),
        );

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
