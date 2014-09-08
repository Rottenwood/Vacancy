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
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     * @return integer
     */
    public function getId() {
        return $this->id;
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
}
