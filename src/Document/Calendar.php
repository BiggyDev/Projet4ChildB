<?php

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 *
 * @ODM\Document
 */
class Calendar
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    private $id;

    /**
     * @ODM\Field(type="datetime")
     * @Assert\DateTime
     */
    public $begin_hour;

    /**
     * @ODM\Field(type="datetime")
     * @Assert\DateTime
     */
    public $end_hour;

    /**
     * @ODM\Field(type="integer")
     * @Assert\NotBlank
     */
    public $available_places;

    /**
     * @ODM\Field(type="boolean")
     * @Assert\NotBlank
     */
    public $daily;

    /**
     * @ODM\Field(type="boolean")
     * @Assert\NotBlank
     */
    public $weekly;
}