<?php

declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\EventInterface;
use  \Cake\Log\Log;

class LogBehavior extends Behavior
{
    public function beforeSave(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }

    public function beforeFind(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }

    public function afterFind(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }

    public function afterSave(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }

    public function beforeDelete(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }

    public function afterDelete(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }

    // tao rule cho entity

    public function buildRules(EventInterface $event, $entity, $options)
    {
        Log::write('debug', 'Saving entity: ' . json_encode($entity));
    }


}
