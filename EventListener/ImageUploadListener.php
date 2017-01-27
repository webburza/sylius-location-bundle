<?php

namespace Webburza\Sylius\LocationBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;
use Webburza\Sylius\LocationBundle\Entity\Location;
use Webburza\Sylius\LocationBundle\Uploader\ImageUploaderInterface;
use Webmozart\Assert\Assert;

/**
 * @author Grzegorz Sadowski <grzegorz.sadowski@lakion.com>
 */
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
        $subject = $event->getSubject();
        Assert::isInstanceOf($subject, Location::class);

        $this->uploadImages($subject);
    }


    /**
     * @param Location $subject
     */
    private function uploadImages(Location $subject)
    {
        $images = $subject->getImages();
        if ($images->count()) {
            foreach ($images as $image) {
//
                if ($image->hasFile()) {
                    $this->uploader->upload($image);
                }
                if ($image->getLocation() === null) {
                    $image->setLocation($subject);
                }

                // Upload failed? Let's remove that image.
                if (null === $image->getPath()) {
                    $images->removeElement($image);
                }

            }
        } else {
            $subject->clearImages();
        }
    }
}