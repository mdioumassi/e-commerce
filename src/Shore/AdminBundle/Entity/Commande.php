<?php

namespace Shore\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="Commande", indexes={@ORM\Index(name="idClient", columns={"idClient"})})
 * @ORM\Entity
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateCmd", type="date", nullable=false)
     */
    private $datecmd;

    /**
     * @var integer
     *
     * @ORM\Column(name="etatCmd", type="integer", nullable=false)
     */
    private $etatcmd;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;



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
     * Set datecmd
     *
     * @param \DateTime $datecmd
     * @return Commande
     */
    public function setDatecmd($datecmd)
    {
        $this->datecmd = $datecmd;

        return $this;
    }

    /**
     * Get datecmd
     *
     * @return \DateTime 
     */
    public function getDatecmd()
    {
        return $this->datecmd;
    }

    /**
     * Set etatcmd
     *
     * @param integer $etatcmd
     * @return Commande
     */
    public function setEtatcmd($etatcmd)
    {
        $this->etatcmd = $etatcmd;

        return $this;
    }

    /**
     * Get etatcmd
     *
     * @return integer 
     */
    public function getEtatcmd()
    {
        return $this->etatcmd;
    }

    /**
     * Set idclient
     *
     * @param \Shore\AdminBundle\Entity\Client $idclient
     * @return Commande
     */
    public function setIdclient(\Shore\AdminBundle\Entity\Client $idclient = null)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return \Shore\AdminBundle\Entity\Client 
     */
    public function getIdclient()
    {
        return $this->idclient;
    }
}
