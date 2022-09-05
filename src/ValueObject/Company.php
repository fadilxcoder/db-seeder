<?php

namespace App\ValueObject;

use JsonSerializable;

class Company implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $phrase;

    /**
     * @var string|null
     */
    private $bs;

    /**
     * @var string|null
     */
    private $phone;

    public function __construct(
        string $name,
        ?string $phrase,
        ?string $bs,
        ?string $phone
    ) {
        $this->name = $name;
        $this->phrase = $phrase;
        $this->bs = $bs;
        $this->phone = $phone;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhrase(): ?string
    {
        return $this->phrase;
    }

    public function getBs(): ?string
    {
        return $this->bs;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}
