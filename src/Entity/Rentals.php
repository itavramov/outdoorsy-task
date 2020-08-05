<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rentals
 *
 * @ORM\Table(name="rentals")
 * @ORM\Entity
 */
class Rentals
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rentals_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="text", nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sleeps", type="integer", nullable=true)
     */
    private $sleeps;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price_per_day", type="bigint", nullable=true)
     */
    private $pricePerDay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="home_city", type="text", nullable=true)
     */
    private $homeCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="home_state", type="text", nullable=true)
     */
    private $homeState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="home_zip", type="text", nullable=true)
     */
    private $homeZip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="home_county", type="text", nullable=true)
     */
    private $homeCounty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="home_country", type="text", nullable=true)
     */
    private $homeCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vehicle_make", type="text", nullable=true)
     */
    private $vehicleMake;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vehicle_model", type="text", nullable=true)
     */
    private $vehicleModel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vehicle_year", type="integer", nullable=true)
     */
    private $vehicleYear;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vehicle_length", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $vehicleLength;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lng", type="float", precision=10, scale=0, nullable=true)
     */
    private $lng;

    /**
     * @var string|null
     *
     * @ORM\Column(name="primary_image_url", type="text", nullable=true)
     */
    private $primaryImageUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner_name", type="text", nullable=true)
     */
    private $ownerName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner_avatar_url", type="text", nullable=true)
     */
    private $ownerAvatarUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSleeps(): ?int
    {
        return $this->sleeps;
    }

    public function setSleeps(?int $sleeps): self
    {
        $this->sleeps = $sleeps;

        return $this;
    }

    public function getPricePerDay(): ?string
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay(?string $pricePerDay): self
    {
        $this->pricePerDay = $pricePerDay;

        return $this;
    }

    public function getHomeCity(): ?string
    {
        return $this->homeCity;
    }

    public function setHomeCity(?string $homeCity): self
    {
        $this->homeCity = $homeCity;

        return $this;
    }

    public function getHomeState(): ?string
    {
        return $this->homeState;
    }

    public function setHomeState(?string $homeState): self
    {
        $this->homeState = $homeState;

        return $this;
    }

    public function getHomeZip(): ?string
    {
        return $this->homeZip;
    }

    public function setHomeZip(?string $homeZip): self
    {
        $this->homeZip = $homeZip;

        return $this;
    }

    public function getHomeCounty(): ?string
    {
        return $this->homeCounty;
    }

    public function setHomeCounty(?string $homeCounty): self
    {
        $this->homeCounty = $homeCounty;

        return $this;
    }

    public function getHomeCountry(): ?string
    {
        return $this->homeCountry;
    }

    public function setHomeCountry(?string $homeCountry): self
    {
        $this->homeCountry = $homeCountry;

        return $this;
    }

    public function getVehicleMake(): ?string
    {
        return $this->vehicleMake;
    }

    public function setVehicleMake(?string $vehicleMake): self
    {
        $this->vehicleMake = $vehicleMake;

        return $this;
    }

    public function getVehicleModel(): ?string
    {
        return $this->vehicleModel;
    }

    public function setVehicleModel(?string $vehicleModel): self
    {
        $this->vehicleModel = $vehicleModel;

        return $this;
    }

    public function getVehicleYear(): ?int
    {
        return $this->vehicleYear;
    }

    public function setVehicleYear(?int $vehicleYear): self
    {
        $this->vehicleYear = $vehicleYear;

        return $this;
    }

    public function getVehicleLength(): ?string
    {
        return $this->vehicleLength;
    }

    public function setVehicleLength(?string $vehicleLength): self
    {
        $this->vehicleLength = $vehicleLength;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getPrimaryImageUrl(): ?string
    {
        return $this->primaryImageUrl;
    }

    public function setPrimaryImageUrl(?string $primaryImageUrl): self
    {
        $this->primaryImageUrl = $primaryImageUrl;

        return $this;
    }

    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(?string $ownerName): self
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    public function getOwnerAvatarUrl(): ?string
    {
        return $this->ownerAvatarUrl;
    }

    public function setOwnerAvatarUrl(?string $ownerAvatarUrl): self
    {
        $this->ownerAvatarUrl = $ownerAvatarUrl;

        return $this;
    }


}
