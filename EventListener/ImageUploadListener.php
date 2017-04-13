<?php

namespace Webburza\Sylius\LocationBundle\EventListener;

use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webburza\Sylius\LocationBundle\Model\LocationImageInterface;
use Webburza\Sylius\LocationBundle\Model\LocationInterface;
use Webmozart\Assert\Assert;

class ImageUploadListener
{
    /**
     * @var ImageUploaderInterface
     */
    protected $uploader;

    /**
     * @param ImageUploaderInterface $uploader
     */
    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * @param GenericEvent $event
     */
    public function uploadLocationImage(GenericEvent $event)
    {
        /** @var LocationInterface $location */
        $location = $event->getSubject();

        Assert::isInstanceOf($location, LocationInterface::class);

        foreach ($location->getImages() as $image) {
            if ($image->hasFile()) {
                $this->uploader->upload($image);
                $image->setLocation($location);
            }

            // Upload failed? Let's remove that image.
            if (null === $image->getPath()) {
                $location->removeImage($image);
            }
        }
    }
}
