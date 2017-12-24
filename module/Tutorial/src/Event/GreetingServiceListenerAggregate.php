<?php

namespace Tutorial\Event;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Tutorial\Service\SomeEventServiceInterface;
use Zend\EventManager\Event;

class GreetingServiceListenerAggregate implements ListenerAggregateInterface
{
    private $someEventService;
    private $listeners = [];

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach('getGreeting', [$this, 'event1'], $priority);
        $this->listeners[] = $events->attach('getGreeting', [$this, 'event2'], $priority);
        $this->listeners[] = $events->attach('getGreeting', [$this, 'event3'], $priority);
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            $events->detach($listener);
            unset($this->listeners[$index]);
        }
    }

    public function setSomeEventService(SomeEventServiceInterface $someEventService)
    {
        $this->someEventService = $someEventService;
    }

    public function getSomeEventService()
    {
        return $this->someEventService;
    }

    public function event1(Event $e)
    {
        $params = $e->getParams();
        $this->getSomeEventService()->onGetGreeting($params);
    }

    public function event2(Event $e)
    {
        $params = $e->getParams();
        $this->getSomeEventService()->onGetGreeting($params);
    }

    public function event3(Event $e)
    {
        $params = $e->getParams();
        $this->getSomeEventService()->onGetGreeting($params);
    }
}
