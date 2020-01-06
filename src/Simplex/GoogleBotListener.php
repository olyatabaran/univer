<?php
namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class GoogleBotListener implements EventSubscriberInterface
{

    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        if (($response->headers->has('User-agent') && false === strpos($response->headers->get('User-agent'), 'Googlebot'))) {
            return;
        }

        $response->setContent('Hello google' . $response->getContent());
    }
    public static function getSubscribedEvents()
    {
        return ['request' => 'onResponse'];
    }
}