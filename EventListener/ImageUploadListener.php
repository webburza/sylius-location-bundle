<?php

namespace Webburza\Sylius\LocationBundle\EventListener;

use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Exception\UnexpectedTypeException;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webburza\Sylius\LocationBundle\Entity\Location;

class ImageUploadListener
{
    protected $uploader;

    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function uploadLocationImage(GenericEvent $event)
    {
        /** @var Location $subject */
        $subject = $event->getSubject();

        if (!$subject instanceof Location) {
            throw new UnexpectedTypeException($subject, 'Webburza\Sylius\LocationBundle\Entity\Location');
        }

        $images = $subject->getImages();

        if ($images->count()) {
            foreach ($images as $image) {
                if ($image->getPath() === null) {
                    $this->uploader->upload($image);

                    if ($image->getPath() === null) {
                        $images->removeElement($image);
                    }
                }

                if ($image->getLocation() === null) {
                    $image->setLocation($subject);
                }
            }
        } else {
            $subject->clearImages();
        }
    }
}
