<?php
declare(strict_types=1);

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={
 *     @ORM\Index(name="search_idx_username", columns={"username"}),
 *     @ORM\Index(name="search_idx_email", columns={"email"}),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @UniqueEntity(fields={"email"}, message="EMAIL_IS_ALREADY_IN_USE")
 *
 * @Serializer\ExclusionPolicy("all")
 */
class User extends BaseUser
{
    const ROLE_SUPER_ADMIN = "ROLE_SUPER_ADMIN";
    const ROLE_ADMIN = "ROLE_ADMIN";
    const ROLE_USER = "ROLE_USER";

    /**
     * To validate supported roles
     *
     * @var array
     */
    static public $ROLES_SUPPORTED = array(
        self::ROLE_SUPER_ADMIN => self::ROLE_SUPER_ADMIN,
        self::ROLE_ADMIN => self::ROLE_ADMIN,
        self::ROLE_USER => self::ROLE_USER,
    );

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=500, nullable=true,)
     */
    protected $comment;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return string
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}