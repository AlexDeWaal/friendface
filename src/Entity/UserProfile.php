<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity(repositoryClass="App\Repository\UserProfileRepository")
*/

class UserProfile
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue()
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\Column(type="integer")
    */

    private $id;
    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */

    private $username;

    private $friends;

    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank()
    * @Assert\Email()
    */
    
    private $email;
    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */

    /**
    * @Assert\NotBlank()
    */
    private $password;

    // getFriends
    public function getFriends() {
        if ($this->friends == null) {
        $this->friends = array();
        }
        return $this->friends;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;

        return $this;
    }

    // addFriend
    // public function addFriend($friend) {
    //     if ($this->friends == null) {
    //         $this->friends = array();
    //     }
    //     array_push($this->friends, $friend);
    // }
}
?>
