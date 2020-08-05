<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RentalImages
 *
 * @ORM\Table(name="rental_images", indexes={@ORM\Index(name="rental_images_rental_id_fkey", columns={"rental_id"})})
 * @ORM\Entity
 */
class RentalImages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rental_images_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="text", nullable=true)
     */
    private $url;

    /**
     * @var \Rentals
     *
     * @ORM\ManyToOne(targetEntity="Rentals")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rental_id", referencedColumnName="id")
     * })
     */
    private $rental;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getRental(): ?Rentals
    {
        return $this->rental;
    }

    public function setRental(?Rentals $rental): self
    {
        $this->rental = $rental;

        return $this;
    }


}
