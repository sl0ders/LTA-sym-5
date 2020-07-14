<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private ?string $price;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private ?string $unity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $imgSmall;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $imgBig;

    /**
     * @ORM\OneToOne(targetEntity=Stock::class, mappedBy="product", cascade={"persist", "remove"})
     */
    private ?Stock $stock;

    /**
     * @ORM\OneToMany(targetEntity=Variety::class, mappedBy="ProductId")
     */
    private ArrayCollection $varieties;


    public function __construct()
    {
        $this->varieties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(string $unity): self
    {
        $this->unity = $unity;

        return $this;
    }

    public function getImgSmall(): ?string
    {
        return $this->imgSmall;
    }

    public function setImgSmall(string $imgSmall): self
    {
        $this->imgSmall = $imgSmall;

        return $this;
    }

    public function getImgBig(): ?string
    {
        return $this->imgBig;
    }

    public function setImgBig(string $imgBig): self
    {
        $this->imgBig = $imgBig;

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;

        // set (or unset) the owning side of the relation if necessary
        $newProduct = null === $stock ? null : $this;
        if ($stock->getProduct() !== $newProduct) {
            $stock->setProduct($newProduct);
        }

        return $this;
    }

    /**
     * @return Collection|Variety[]
     */
    public function getVarieties(): Collection
    {
        return $this->varieties;
    }

    public function addVariety(Variety $variety): self
    {
        if (!$this->varieties->contains($variety)) {
            $this->varieties[] = $variety;
            $variety->setProduct($this);
        }

        return $this;
    }

    public function removeVariety(Variety $variety): self
    {
        if ($this->varieties->contains($variety)) {
            $this->varieties->removeElement($variety);
            // set the owning side to null (unless already changed)
            if ($variety->getProduct() === $this) {
                $variety->setProduct(null);
            }
        }

        return $this;
    }
}
