<?php

namespace Shore\AdminBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="Produit", indexes={@ORM\Index(name="idFournisseur", columns={"idFournisseur"}), @ORM\Index(name="idCategorie", columns={"idCategorie"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Produit
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixUnitaire", type="integer", nullable=false)
     */
    private $prixunitaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @var boolean
     *
     * @ORM\Column(name="statut", type="boolean", nullable=false)
     */
    private $statut;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategorie", referencedColumnName="id")
     * })
     */
    private $idcategorie;

    /**
     * @var \Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFournisseur", referencedColumnName="id")
     * })
     */
    private $idfournisseur;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/visuels';
    }
    
   public function upload()
    {
        // Nous utilisons le nom de fichier original, donc il est dans la pratique
        // nécessaire de le nettoyer pour éviter les problèmes de sécurité

        // move copie le fichier présent chez le client dans le répertoire indiqué.
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // On sauvegarde le nom de fichier
        $this->path = $this->file->getClientOriginalName();
       
        // La propriété file ne servira plus
        $this->file = null;
    }
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
     * Set nom
     *
     * @param string $nom
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prixunitaire
     *
     * @param integer $prixunitaire
     * @return Produit
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
     * Set stock
     *
     * @param integer $stock
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     * @return Produit
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set idcategorie
     *
     * @param \Shore\AdminBundle\Entity\Categorie $idcategorie
     * @return Produit
     */
    public function setIdcategorie(\Shore\AdminBundle\Entity\Categorie $idcategorie = null)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return \Shore\AdminBundle\Entity\Categorie 
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Set idfournisseur
     *
     * @param \Shore\AdminBundle\Entity\Fournisseur $idfournisseur
     * @return Produit
     */
    public function setIdfournisseur(\Shore\AdminBundle\Entity\Fournisseur $idfournisseur = null)
    {
        $this->idfournisseur = $idfournisseur;

        return $this;
    }

    /**
     * Get idfournisseur
     *
     * @return \Shore\AdminBundle\Entity\Fournisseur 
     */
    public function getIdfournisseur()
    {
        return $this->idfournisseur;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Produit
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}
