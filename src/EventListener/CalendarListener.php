<?php
/**
 * Created by PhpStorm.
 * User: yamna
 * Date: 03/04/2019
 * Time: 11:31
 */

namespace App\EventListener;

use App\Entity\Client;
use App\Entity\Provider;
use App\Repository\ClientRepository;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;

class CalendarListener
{
    private $clientRepository;

    public function __construct(
        ClientRepository $clientRepository
    ) {
        $this->clientRepository = $clientRepository;
        $this->router = $router;

    }

    public function load(CalendarEvent $calendar): void
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();

        // Modify the query to fit to your entity and needs
        // Change booking.beginAt by your start date property
        $bookings = $this->clientRepository
            ->createQueryBuilder('client')
            ->where('booking.beginAt BETWEEN :start and :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult()
        ;

        foreach ($bookings as $booking) {
            // this create the events with your data (here booking data) to fill calendar
            $bookingEvent = new Event(
                $booking->getTitle(),
                $booking->getBeginAt(),
                $booking->getEndAt() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Add custom options to events
             *
             * For more information see: https://fullcalendar.io/docs/event-object
             * and: https://github.com/fullcalendar/fullcalendar/blob/master/src/core/options.ts
             */

            $bookingEvent->setOptions([
                'backgroundColor' => 'red',
                'borderColor' => 'red',
            ]);
            $bookingEvent->addOption('url', 'http://google.com');

            // finally, add the event to the CalendarEvent to fill the calendar
            $calendar->addEvent($bookingEvent);
        }
    }
}