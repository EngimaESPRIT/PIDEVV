<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new GestionEJBundle\GestionEJBundle(),
            new MyAppBundle\MyAppBundle(),
            new MyApp\UserBundle\MyAppUserBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new GestionTransportBundle\GestionTransportBundle(),
            new GestionMatchBundle\GestionMatchBundle(),
            new GestionCommoditeBundle\GestionCommoditeBundle(),
            new GestionActualiteBundle\GestionActualiteBundle(),
            new GestionShopBundle\GestionShopBundle(),
            new Nomaya\SocialBundle\NomayaSocialBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new CMEN\GoogleChartsBundle\CMENGoogleChartsBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new blackknight467\StarRatingBundle\StarRatingBundle(),
            new AncaRebeca\FullCalendarBundle\FullCalendarBundle(),
            // ...
            new Ivory\GoogleMapBundle\IvoryGoogleMapBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            // Optionally
            new Ivory\SerializerBundle\IvorySerializerBundle(),
            new Http\HttplugBundle\HttplugBundle(),
            new FOS\RestBundle\FOSRestBundle(),

            new JMS\SerializerBundle\JMSSerializerBundle($this),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),



        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();

            if ('dev' === $this->getEnvironment()) {
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
            }
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
