<?php

namespace Rottenwood\VacancyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacancy
 * @ORM\Table(name="vacancy")
 * @ORM\Entity(repositoryClass="Rottenwood\VacancyBundle\Repository\VacancyRepository")
 */
class Vacancy {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Department")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id", nullable=false)
     */
    private $department;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="nameRu", type="string", length=255, nullable=true)
     */
    private $nameRu;

    /**
     * @var string
     * @ORM\Column(name="descriptionRu", type="string", length=255, nullable=true)
     */
    private $descriptionRu;

    /**
     * @var string
     * @ORM\Column(name="nameFr", type="string", length=255, nullable=true)
     */
    private $nameFr;

    /**
     * @var string
     * @ORM\Column(name="descriptionFr", type="string", length=255, nullable=true)
     */
    private $descriptionFr;


    /**
     * Get id
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     * @return Vacancy
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     * @param string $description
     * @return Vacancy
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set nameRu
     * @param string $nameRu
     * @return Vacancy
     */
    public function setNameRu($nameRu) {
        $this->nameRu = $nameRu;

        return $this;
    }

    /**
     * Get nameRu
     * @return string
     */
    public function getNameRu() {
        return $this->nameRu;
    }

    /**
     * Set descriptionRu
     * @param string $descriptionRu
     * @return Vacancy
     */
    public function setDescriptionRu($descriptionRu) {
        $this->descriptionRu = $descriptionRu;

        return $this;
    }

    /**
     * Get descriptionRu
     * @return string
     */
    public function getDescriptionRu() {
        return $this->descriptionRu;
    }

    /**
     * Set nameFr
     * @param string $nameFr
     * @return Vacancy
     */
    public function setNameFr($nameFr) {
        $this->nameFr = $nameFr;

        return $this;
    }

    /**
     * Get nameFr
     * @return string
     */
    public function getNameFr() {
        return $this->nameFr;
    }

    /**
     * Set descriptionFr
     * @param string $descriptionFr
     * @return Vacancy
     */
    public function setDescriptionFr($descriptionFr) {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    /**
     * Get descriptionFr
     * @return string
     */
    public function getDescriptionFr() {
        return $this->descriptionFr;
    }

    /**
     * Set Department
     * @param Department $department
     */
    public function setDepartment($department) {
        $this->department = $department;
    }

    /**
     * Get Department
     * @return Department
     */
    public function getDepartment() {
        return $this->department;
    }
}
