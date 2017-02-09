<?php

declare(strict_types = 1);

namespace Domain\Entity;

/**
 * Class BearPicnic
 * @package Domain\Entity
 */
class BearPicnic extends Entity
{
    /**
     * @var Bear
     */
    private $bear;

    /**
     * @var Picnic
     */
    private $picnic;

    /**
     * @return Bear
     */
    public function getBear(): Bear
    {
        return $this->bear;
    }

    /**
     * @param Bear $bear
     * @return self
     */
    public function setBear(Bear $bear): self
    {
        $this->bear = $bear;
        return $this;
    }

    /**
     * @return Picnic
     */
    public function getPicnic(): Picnic
    {
        return $this->picnic;
    }

    /**
     * @param Picnic $picnic
     * @return self
     */
    public function setPicnic(Picnic $picnic): self
    {
        $this->picnic = $picnic;
        return $this;
    }
}
