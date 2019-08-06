<?php declare(strict_types=1);

namespace AppBundle\EventListener;

use Thepixeldeveloper\Sitemap\Url;
use Thepixeldeveloper\SitemapBundle\Event\SitemapPopulateEvent;

class ExampleListener
{
    public function onSitemapGenerate(SitemapPopulateEvent $event): void
    {
        $url = new Url('https://example.com');

        $event->getUrlset()->add($url);
    }
}
