<?php

namespace Rottenwood\VacancyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacancy
 * @ORM\Table(name="vacancies")
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
     * Department
     * @ORM\ManyToOne(targetEntity="Department")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id", nullable=false)
     */
    private $department;

    /**
     * Default title of vacancy in English
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * Default description of vacancy in English
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
     * @param mixed $department
     */
    public function setDepartment($department) {
        $this->department = $department;
    }

    /**
     * @return mixed
     */
    public function getDepartment() {
        return $this->department;
    }

    /**
     * Set title
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get title
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }
}
