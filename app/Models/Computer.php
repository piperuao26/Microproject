<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    /**
     * COMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the computer primary key (id)
     * $this->attributes['name'] - string - contains the computer name
     * $this->attributes['description'] - float - contains the computer description 
     * $this->attributes['price'] - int - contains the computer price
     * $this->attributes['quantity'] - int - contains the quantity of computers
     * $this->attributes['ramCard'] - float - contains the ram card of every computer
     * $this->attributes['graphicAccelerator'] - float - contains the ram card of every computer
     * $this->attributes['hdd'] - float - contains the hard drive disc of every computer
     * Add any additional attributes specific to the Computer model here
     */

    protected $fillable = ['name', 'description' , 'price', 'quantity', 'ramCard', 'graphicAccelerator', 'hdd'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }


    public function getDescription(): float
    {
        return $this->attributes['description'];
    }

    public function setDescription($description): void
    {
        $this->attributes['description'] = $description;
    }
    
    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity): void
    {
        $this->attributes['quantity'] = $quantity;

    }

    
    public function getRamCard(): float
    {
        return $this->attributes['ramCard'];
    }

    public function setRamCard($ramCard): void
    {
        $this->attributes['ramCard'] = $ramCard;
    }

    public function getGraphicAccelerator(): float
    {
        return $this->attributes['graphicAccelerator'];
    }

    public function setGraphicAccelerator($ramCard): void
    {
        $this->attributes['graphicAccelerator'] = $graphicAccelerator;
    }

    public function getHdd(): float
    {
        return $this->attributes['hdd'];
    }

    public function setHdd($hdd): void
    {
        $this->attributes['hdd'] = $hdd;
    }

}