<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 08/12/17
 * Time: 08:30
 */

namespace App\Listener;


use App\DocumentEvents;
use App\Entity\Document;
use App\Event\DocumentDownloadEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DocumentSubscriber implements EventSubscriberInterface
{
    /** @var LoggerInterface  */
    private $logger;

    /**
     * DocumentSubscriber constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            DocumentEvents::DOCUMENT_DOWNLOAD => 'onDocumentDownload'
        );
    }

    /**
     * @param DocumentDownloadEvent $event
     */
    public function onDocumentDownload(DocumentDownloadEvent $event)
    {die(dump($event));
        /** @var Document $document */
        $document = $event->getDocument();
        $this->logger->info('download', ['document' => $document->getId(), 'user' => $document->getUser()->getId()]);
    }
}
