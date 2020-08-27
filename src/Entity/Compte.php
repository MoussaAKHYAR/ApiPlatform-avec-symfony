<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read:comptes"}},
 *      collectionOperations={"get"},
 *      itemOperations={"get"}
 *)
 * @ApiFilter(SearchFilter::class, properties={"numero": "exact"})
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read:comptes"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"read:comptes"})
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $rib;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:comptes"})
     */
    private $solde;

    /**
     * @ORM\Column(type="date")
     * @Groups({"read:comptes"})
     */
    private $dateOuverture;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $salaire;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $nomEmployeur;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $telephoneEmployeur;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $numeroIdentification;

    /**
     * @ORM\Column(type="float")
     */
    private $agios;

    /**
     * @ORM\Column(type="float")
     */
    private $frais;

    /**
     * @ORM\Column(type="float")
     */
    private $renumeration;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups({"read:comptes"})
     */
    private $typeCompte;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="comptes")
     * @Groups({"read:comptes"})
     */
    private $compteEntreprise;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="comptes")
     * @Groups({"read:comptes"})
     */
    private $compteClient;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="operationCompte")
     * @Groups({"read:comptes"})
     */
    private $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(?float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nomEmployeur;
    }

    public function setNomEmployeur(?string $nomEmployeur): self
    {
        $this->nomEmployeur = $nomEmployeur;

        return $this;
    }

    public function getTelephoneEmployeur(): ?string
    {
        return $this->telephoneEmployeur;
    }

    public function setTelephoneEmployeur(?string $telephoneEmployeur): self
    {
        $this->telephoneEmployeur = $telephoneEmployeur;

        return $this;
    }

    public function getNumeroIdentification(): ?string
    {
        return $this->numeroIdentification;
    }

    public function setNumeroIdentification(?string $numeroIdentification): self
    {
        $this->numeroIdentification = $numeroIdentification;

        return $this;
    }

    public function getAgios(): ?float
    {
        return $this->agios;
    }

    public function setAgios(float $agios): self
    {
        $this->agios = $agios;

        return $this;
    }

    public function getFrais(): ?float
    {
        return $this->frais;
    }

    public function setFrais(float $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getRenumeration(): ?float
    {
        return $this->renumeration;
    }

    public function setRenumeration(float $renumeration): self
    {
        $this->renumeration = $renumeration;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(string $typeCompte): self
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    public function getCompteEntreprise(): ?Entreprise
    {
        return $this->compteEntreprise;
    }

    public function setCompteEntreprise(?Entreprise $compteEntreprise): self
    {
        $this->compteEntreprise = $compteEntreprise;

        return $this;
    }

    public function getCompteClient(): ?Client
    {
        return $this->compteClient;
    }

    public function setCompteClient(?Client $compteClient): self
    {
        $this->compteClient = $compteClient;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setOperationCompte($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getOperationCompte() === $this) {
                $operation->setOperationCompte(null);
            }
        }

        return $this;
    }
}
