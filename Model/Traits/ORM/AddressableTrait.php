<?php

namespace Addressable\Bundle\Model\Traits\ORM;

use Doctrine\ORM\Mapping as ORM;
use Addressable\Bundle\Validator\Constraints as AssertAddress;
use Addressable\Bundle\Model\Traits\Addressable;

/**
 * Trait for implementing addressable on an ORM entity.
 */
trait AddressableTrait
{
    use Addressable;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    protected $streetNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $streetName;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    protected $city;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    protected $country;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    protected $zipCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $administrativeAreaLevel1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $administrativeAreaLevel2;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @AssertAddress\Latitude()
     */
    #[AssertAddress\Latitude()]
    #[ORM\Column(type: 'float', nullable: true)]
    protected $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @AssertAddress\Longitude()
     */
    #[AssertAddress\Longitude()]
    #[ORM\Column(type: 'float', nullable: true)]
    protected $longitude;
}
