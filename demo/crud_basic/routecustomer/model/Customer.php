<?php

namespace Model;

class Customer
{
    public string $name;
    public string $email;
    public string $address;
    public int $id;
    public function __construct(string $name, string $email, string $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
