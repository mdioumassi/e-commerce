<?php

namespace Shore\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detail
 *
 * @ORM\Table(name="Detail", indexes={@ORM\Index(name="idProduit", columns={"idProduit"}), @ORM\Index(name="idCommande", columns={"idCommande"})})
 * @ORM\Entity
 */
class Detail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="PrixUnitaire", type="integer", nullable=false)
     */
    private $prixunitaire;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommande", referencedColumnName="id")
     * })
     */
    private $idcommande;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduit", referencedColumnName="id")
     * })
     */
    private $idproduit;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Detail
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prixunitaire
     *
     * @param integer $prixunitaire
     * @return Detail
     */
    public function setPrixunitaire($prixunitaire)
    {
        $this->prixunitaire = $prixunitaire;

        return $this;
    }

    /**
     * Get prixunitaire
     *
     * @return integer 
     */
    public function getPrixunitaire()
    {
        return $this->prixunitaire;
    }

    /**
     * Set idcommande
     *
     * @param \Shore\AdminBundle\Entity\Commande $idcommande
     * @return Detail
     */
    public function setIdcommande(\Shore\AdminBundle\Entity\Commande $idcommande = null)
    {
        $this->idcommande = $idcommande;

        return $this;
    }

    /**
     * Get idcommande
     *
     * @return \Shore\AdminBundle\Entity\Commande 
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }

    /**
     * Set idproduit
     *
     * @param \Shore\AdminBundle\Entity\Produit $idproduit
     * @return Detail
     */
    public function setIdproduit(\Shore\AdminBundle\Entity\Produit $idproduit = null)
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return \Shore\AdminBundle\Entity\Produit 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }
}
