<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $login_name;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $login_pass;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rank")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rankID;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="user", orphanRemoval=true)
     */
    private $addressID;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Visit", inversedBy="users")
     */
    private $select_VisitID;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="user", orphanRemoval=true)
     */
    private $perform_PaymentID;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Order", mappedBy="user")
     */
    private $orders;

    public function __construct()
    {
        $this->addressID = new ArrayCollection();
        $this->select_VisitID = new ArrayCollection();
        $this->perform_PaymentID = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLoginName(): ?string
    {
        return $this->login_name;
    }

    public function setLoginName(string $login_name): self
    {
        $this->login_name = $login_name;

        return $this;
    }

    public function getLoginPass(): ?string
    {
        return $this->login_pass;
    }

    public function setLoginPass(string $login_pass): self
    {
        $this->login_pass = $login_pass;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRankID(): ?Rank
    {
        return $this->rankID;
    }

    public function setRankID(?Rank $rankID): self
    {
        $this->rankID = $rankID;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddressID(): Collection
    {
        return $this->addressID;
    }

    public function addAddressID(Address $addressID): self
    {
        if (!$this->addressID->contains($addressID)) {
            $this->addressID[] = $addressID;
            $addressID->setUser($this);
        }

        return $this;
    }

    public function removeAddressID(Address $addressID): self
    {
        if ($this->addressID->contains($addressID)) {
            $this->addressID->removeElement($addressID);
            // set the owning side to null (unless already changed)
            if ($addressID->getUser() === $this) {
                $addressID->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Visit[]
     */
    public function getSelectVisitID(): Collection
    {
        return $this->select_VisitID;
    }

    public function addSelectVisitID(Visit $selectVisitID): self
    {
        if (!$this->select_VisitID->contains($selectVisitID)) {
            $this->select_VisitID[] = $selectVisitID;
        }

        return $this;
    }

    public function removeSelectVisitID(Visit $selectVisitID): self
    {
        if ($this->select_VisitID->contains($selectVisitID)) {
            $this->select_VisitID->removeElement($selectVisitID);
        }

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPerformPaymentID(): Collection
    {
        return $this->perform_PaymentID;
    }

    public function addPerformPaymentID(Payment $performPaymentID): self
    {
        if (!$this->perform_PaymentID->contains($performPaymentID)) {
            $this->perform_PaymentID[] = $performPaymentID;
            $performPaymentID->setUser($this);
        }

        return $this;
    }

    public function removePerformPaymentID(Payment $performPaymentID): self
    {
        if ($this->perform_PaymentID->contains($performPaymentID)) {
            $this->perform_PaymentID->removeElement($performPaymentID);
            // set the owning side to null (unless already changed)
            if ($performPaymentID->getUser() === $this) {
                $performPaymentID->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }
}
