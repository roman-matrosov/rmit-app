<?php

namespace App\Entity;

use App\Repository\AppServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=AppServiceRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields={"serviceCode"})
 */
class AppService
{
    /**
	 * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $serviceCode;
    
	/**
	 * @ORM\Column(type="string", length=255, nullable=false)
	 */
	private $appCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $subType;
    
	/**
	 * @ORM\Column(type="datetime")
	 */
	private $lastModified;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
	/**
	 * @ORM\ManyToOne(targetEntity=Application::class, inversedBy="appServices", )
	 * @ORM\JoinColumn(name="app_code", referencedColumnName="app_code", nullable=false, onDelete="CASCADE")
	 */
	private $application;
	
	
	/**
	 * @ORM\PrePersist
	 */
	public function prePersist()
	{
		$this->setLastModified(new \DateTime());
	}
	
	public function getId(): ?string
	{
		return $this->serviceCode;
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

    public function setServiceCode(string $serviceCode): self
    {
        $this->serviceCode = $serviceCode;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSubType(): ?string
    {
        return $this->subType;
    }

    public function setSubType(string $subType): self
    {
        $this->subType = $subType;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
	
	public function getApplication(): ?Application
	{
		return $this->application;
	}
	
	public function setApplication(?Application $application): self
	{
		$this->application = $application;
		
		return $this;
	}
	
	public function getServiceCode(): ?string
	{
		return $this->serviceCode;
	}
}
