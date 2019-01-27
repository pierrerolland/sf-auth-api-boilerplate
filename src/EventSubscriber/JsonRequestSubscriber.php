<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class JsonRequestSubscriber implements EventSubscriberInterface
{
    public function onKernelRequest(GetResponseEvent $event): void
    {
        $content = $event->getRequest()->getContent();

        if (!empty($content)) {
            $decoded = json_decode($content, true);

            if (JSON_ERROR_NONE === json_last_error()) {
                $event->getRequest()->request->replace($decoded);
            }
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 101]
        ];
    }
}
