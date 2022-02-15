<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Event\CategoryCreated;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class CategoryEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $engine
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            CategoryCreated::class => 'onCategoryCreated',
        ];
    }

    public function onCategoryCreated(CategoryCreated $event): void
    {
        $email = (new Email())
            ->from('admin@api.com')
            ->to('juan@api.com')
            ->subject('New category has been created!')
            ->text('New category has been created!')
            ->html(
                $this->engine->render('emails/new-category.html.twig', [
                    'id' => $event->id,
                    'name' => $event->name,
                    'created_on' => $event->createdOn,
                ])
            );

        $this->mailer->send($email);
    }
}