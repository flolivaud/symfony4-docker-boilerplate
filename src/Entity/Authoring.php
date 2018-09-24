<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait Authoring
{
    /**
     * @var User
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=false)
     */
    protected $createdBy;

    /**
     * @var User
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="modified_by", referencedColumnName="id", nullable=false)
     */
    protected $modifiedBy;

    /**
     * @var \DateTimeImmutable
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime_immutable", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTimeImmutable
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified_at", type="datetime_immutable", nullable=false)
     */
    protected $modifiedAt;

    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }

    public function getModifiedBy(): User
    {
        return $this->modifiedBy;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getModifiedAt(): \DateTimeImmutable
    {
        return $this->modifiedAt;
    }
}
