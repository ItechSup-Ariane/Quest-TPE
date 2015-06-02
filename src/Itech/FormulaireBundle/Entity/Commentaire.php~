<?php

namespace Itech\FormulaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="zoneTexte", type="string", length=255)
     */
    private $zoneTexte;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Commentaire
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set zoneTexte
     *
     * @param string $zoneTexte
     * @return Commentaire
     */
    public function setZoneTexte($zoneTexte)
    {
        $this->zoneTexte = $zoneTexte;

        return $this;
    }

    /**
     * Get zoneTexte
     *
     * @return string 
     */
    public function getZoneTexte()
    {
        return $this->zoneTexte;
    }
}
