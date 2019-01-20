<?php

namespace App\EventListener;

use App\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event): void
    {
        $exception = $event->getException();

        if ($exception instanceof Exception) {
            $event->setResponse(new JsonResponse([
                'error' => [
                    'code' => $exception->exceptionCode,
                    'status' => $exception->exceptionStatus
                ]
            ]));
        }
    }
}
