<?php

    namespace AERGUS\associationBundle\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="Section")
     */
    class Section
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        /**
         * @ORM\Column(type="string")
         */
        protected $libelle;

        /**
         * @ORM\ManyToOne(targetEntity="Ufr", inversedBy="sections")
         * @ORM\JoinColumn(name="ufr_id", referencedColumnName="id")
         */
        protected $ufr;

        /**
         * @ORM\OneToMany(targetEntity="Ressortissants", mappedBy="section")
         */
        protected $ressortissants;

        /**
         * @ORM\OneToMany(targetEntity="Membre", mappedBy="section")
         */
        protected $membres;

        public function __construct()
        {
            $this->ressortissants = new ArrayCollection();
            $this->membres = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Section
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
     * Set ufr
     *
     * @param \AERGUS\associationBundle\Entity\Ufr $ufr
     *
     * @return Section
     */
    public function setUfr(\AERGUS\associationBundle\Entity\Ufr $ufr = null)
    {
        $this->ufr = $ufr;

        return $this;
    }

    /**
     * Get ufr
     *
     * @return \AERGUS\associationBundle\Entity\Ufr
     */
    public function getUfr()
    {
        return $this->ufr;
    }

    /**
     * Add ressortissant
     *
     * @param \AERGUS\associationBundle\Entity\Ressortissants $ressortissant
     *
     * @return Section
     */
    public function addRessortissant(\AERGUS\associationBundle\Entity\Ressortissants $ressortissant)
    {
        $this->ressortissants[] = $ressortissant;

        return $this;
    }

    /**
     * Remove ressortissant
     *
     * @param \AERGUS\associationBundle\Entity\Ressortissants $ressortissant
     */
    public function removeRessortissant(\AERGUS\associationBundle\Entity\Ressortissants $ressortissant)
    {
        $this->ressortissants->removeElement($ressortissant);
    }

    /**
     * Get ressortissants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRessortissants()
    {
        return $this->ressortissants;
    }

    /**
     * Add membre
     *
     * @param \AERGUS\associationBundle\Entity\Membre $membre
     *
     * @return Section
     */
    public function addMembre(\AERGUS\associationBundle\Entity\Membre $membre)
    {
        $this->membres[] = $membre;

        return $this;
    }

    /**
     * Remove membre
     *
     * @param \AERGUS\associationBundle\Entity\Membre $membre
     */
    public function removeMembre(\AERGUS\associationBundle\Entity\Membre $membre)
    {
        $this->membres->removeElement($membre);
    }

    /**
     * Get membres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembres()
    {
        return $this->membres;
    }
}
