<?php

namespace Webburza\Sylius\LocationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\AbstractTranslation;
use Sylius\Component\Resource\Model\TranslationInterface;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * Location.
 *
 * @ORM\Table(name="webburza_sylius_location")
 * @ORM\Entity()
 * @JMS\ExclusionPolicy("all")
 */
class Location implements ResourceInterface, TranslatableInterface
{
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Expose()
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    protected $published;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $internalName;

    /**
     * @var LocationType
     * @ORM\ManyToOne(targetEntity="LocationType" , cascade={"persist"})
     * @ORM\JoinColumn(name="location_type")
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $locationType;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Email()
     * @JMS\Expose()
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=10, scale=8)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=10, scale=8)
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $longitude;

    /**
     * @var LocationImage[]
     * @ORM\OneToMany(targetEntity="LocationImage", mappedBy="location", cascade={"persist", "remove"})
     * @Assert\NotBlank()
     * @JMS\Expose()
     */
    protected $images;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->images = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     *
     * @return Location
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Set internalName.
     *
     * @param string $internalName
     *
     * @return Location
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;

        return $this;
    }

    /**
     * Get internalName.
     *
     * @return string
     */
    public function getInternalName()
    {
        return $this->internalName;
    }

    /**
     * @return LocationType
     */
    public function getLocationType()
    {
        return $this->locationType;
    }

    /**
     * @param LocationType
     *
     * @return Location
     */
    public function setLocationType(LocationType $locationType)
    {
        $this->locationType = $locationType;

        return $this;
    }

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return Location
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set latitude.
     *
     * @param string $latitude
     *
     * @return Location
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param string $longitude
     *
     * @return Location
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param array|ArrayCollection|LocationImage[] $images
     *
     * @return Location
     */
    public function setImages($images)
    {
        $this->clearImages();
        if (0 < count($images)) {
            foreach ($images as $image) {
                $this->addImage($image);
            }
        }

        return $this;
    }

    /**
     * @param LocationImage $image
     *
     * @return bool
     */
    public function addImage(LocationImage $image)
    {
        $image->setLocation($this);

        return $this->images->add($image);
    }

    /**
     * Clears images.
     */
    public function clearImages()
    {
        $this->images->clear();
    }

    /**
     * @param LocationImage $image
     *
     * @return bool
     */
    public function removeImages(LocationImage $image)
    {
        return $this->images->removeElement($image);
    }

    /**
     * @return ArrayCollection|LocationImage[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Location
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Location
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getTranslation()->getName();
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->getTranslation()->getSlug();
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->getTranslation()->getStreetName();
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->getTranslation()->getStreetNumber();
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getTranslation()->getCity();
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->getTranslation()->getZip();
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->getTranslation()->getState();
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getTranslation()->getCountry();
    }

    /**
     * @return string
     */
    public function getWorkingHours()
    {
        return $this->getTranslation()->getWorkingHours();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getTranslation()->getDescription();
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->getTranslation()->getMetaKeywords();
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->getTranslation()->getMetaDescription();
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        $streetAddress = $this->getStreetName() . ' ' . $this->getStreetNumber();

        return trim($streetAddress);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        $address = '';

        $fragments = [
            $this->getStreetAddress(),
            $this->getCity()
        ];

        foreach ($fragments as $fragment) {
            if ($fragment) {
                $address .= ', ' . $fragment;
            }
        }

        return trim($address, ', ');
    }

    /**
     * @return string
     */
    public function getFullAddress()
    {
        $address = '';

        $fragments = [
            $this->getStreetAddress(),
            $this->getZip(),
            $this->getCity(),
            $this->getCountry()
        ];

        foreach ($fragments as $fragment) {
            if ($fragment) {
                $address .= ', ' . $fragment;
            }
        }

        return trim($address, ', ');
    }

    /**
     * @return string
     */
    public function getCoords()
    {
        return $this->getLatitude() . ',' . $this->getLongitude();
    }

    /**
     * Create resource translation model.
     *
     * @return \Sylius\Component\Resource\Model\TranslationInterface
     */
    protected function createTranslation()
    {
        return new LocationTranslation();
    }
}
