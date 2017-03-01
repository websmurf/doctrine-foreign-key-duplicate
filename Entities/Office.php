<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="offices",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="id", columns={"id"})
 *     }
 * )
 */
class Office
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, name="office_name")
     */
    protected $name;

}
