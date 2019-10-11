<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $productos;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @return mixed
     */

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getProductos(): ?string
    {
        return $this->productos;
    }
    /**
     * @param mixed $productos
     */
    public function setProductos(string $productos): self
    {
        $this->productos = $productos;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }
    /**
     * @param mixed $descripcion
     */
    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }
    /**
     * @param mixed $cantidad
     */
    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
