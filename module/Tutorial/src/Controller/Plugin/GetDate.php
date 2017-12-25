<?php

namespace Tutorial\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class GetDate extends AbstractPlugin
{
    public function __invoke()
    {
        $dt = new \DateTime();
        $dt->setTimezone(new \DateTimeZone('America/New_York'));
        $date = $dt->format('d F Y');

        return $date ?: false;
    }
}
