<?php

namespace Tutorial\Service;

use Tutorial\Service\SomeEventServiceInterface;

class SomeEventService implements SomeEventServiceInterface
{
    public function onGetGreeting($params)
    {
        echo "Some event on 'getGreeting' service with param hour = {$params['hour']}";
    }
}
