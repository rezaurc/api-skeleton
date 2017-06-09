<?php
/**
 * Copyright (c) 2017. Rezaur Chowdhury <reza@rezaur.net>.
 *
 * This file is a part of api-skeleton .
 *
 * api-skeleton
 *
 * User.php
 *
 * 6/3/17 5:20 AM
 *
 * For the full copyright and license information, please view the LICENSE file
 * that is distributed with the source code.
 */

namespace AppBundle\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"user", "user-read"}},
 *     "denormalization_context"={"groups"={"user", "user-write"}}
 * })
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Groups({"user"})
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user"})
     */
    protected $fullname;

    /**
     * @Groups({"user-write"})
     */
    protected $plainPassword;

    /**
     * @Groups({"user"})
     */
    protected $username;

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }
    public function getFullname()
    {
        return $this->fullname;
    }

    public function isUser(UserInterface $user = null)
    {
        return $user instanceof self && $user->id === $this->id;
    }
}