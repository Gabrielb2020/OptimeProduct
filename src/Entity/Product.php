<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @UniqueEntity("code")
 * @UniqueEntity("name")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex("/[0-9]+/")
     * @Assert\Length(min = 4, max = 10) 
     * )
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min = 4)
     */
    private $name;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank                
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $category;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 0,
     *      max = 9
     * )
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getCode(): ?string
    {
        return $this->code;
    }
    
    public function setCode(string $code): self
    {
        $this->code = $code;
        
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
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function setDescription(string $description): self
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getBrand(): ?string
    {
        return $this->brand;
    }
    
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        
        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    


    
}
