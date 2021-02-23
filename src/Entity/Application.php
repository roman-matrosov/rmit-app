<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ApplicationRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields={"appCode"})
 */
class Application
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=255)
	 */
    private $appCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $appGroup;

    /**
     * @ORM\Column(type="string", length=90, nullable=true)
     */
    private $appType;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $appCost;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastModified;

    /**
     * @ORM\OneToMany(targetEntity=AppService::class, mappedBy="application", cascade={"persist"})
     */
    private $appServices;
    
	/**
	 * @ORM\PrePersist
	 */
	public function prePersist()
	{
		$this->setLastModified(new \DateTime());
	}
	
    public function __construct()
    {
        $this->appServices = new ArrayCollection();
    }

    public function __toString() : string
    {
        return $this->getName();
    }

    public function getId(): ?string
    {
        return $this->appCode;
    }
    
    public function getAppCode(): ?string
    {
        return $this->appCode;
    }

    public function setAppCode(string $appCode): self
    {
        $this->appCode = $appCode;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAppGroup(): ?string
    {
        return $this->appGroup;
    }

    public function setAppGroup(string $appGroup): self
    {
        $this->appGroup = $appGroup;

        return $this;
    }

    public function getAppType(): ?string
    {
        return $this->appType;
    }

    public function setAppType(string $appType): self
    {
        $this->appType = $appType;

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

    public function getAppCost(): ?float
    {
        return $this->appCost;
    }

    public function setAppCost(?float $appCost): self
    {
        $this->appCost = $appCost;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTimeInterface $lastModified): self
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * @return Collection|AppService[]
     */
    public function getAppServices(): Collection
    {
        return $this->appServices;
    }

    public function addAppService(AppService $appService): self
    {
        if (!$this->appServices->contains($appService)) {
            $this->appServices[] = $appService;
            $appService->setApplication($this);
        }

        return $this;
    }

    public function removeAppService(AppService $appService): self
    {
        if ($this->appServices->removeElement($appService)) {
            // set the owning side to null (unless already changed)
            if ($appService->getApplication() === $this) {
                $appService->setApplication(null);
            }
        }

        return $this;
    }
}
