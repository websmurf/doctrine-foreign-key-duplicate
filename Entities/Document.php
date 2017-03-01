<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="documents",
 *     indexes={
 *         @ORM\Index(name="document_type", columns={"document_type"}),
 *         @ORM\Index(name="document_state", columns={"document_state"})
 *     }
 * )
 */
class Document
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=11, nullable=false, name="document_type")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, name="document_title")
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=false, name="document_content")
     */
    private $content;

    /**
     * @ORM\Column(type="json_array", nullable=false, name="document_params")
     */
    private $params;

    /**
     * @ORM\Column(type="boolean", nullable=false, name="document_state")
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="Entities\Office")
     * @ORM\JoinColumn(name="office_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $office;

}
