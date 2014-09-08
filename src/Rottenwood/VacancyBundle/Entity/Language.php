<?php

namespace Rottenwood\VacancyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 * @ORM\Table(name="languages")
 * @ORM\Entity(repositoryClass="Rottenwood\VacancyBundle\Repository\LanguageRepository")
 */
class Language {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="Vacancy")
     * @ORM\JoinColumn(name="vacancy_id", referencedColumnName="id", nullable=false)
     */
    private $vacancy;

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
     * @param string $language
     */
    public function setLanguage($language) {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * @param Vacancy $vacancy
     */
    public function setVacancy($vacancy) {
        $this->vacancy = $vacancy;
    }

    /**
     * @return Vacancy
     */
    public function getVacancy() {
        return $this->vacancy;
    }

    /**
     * Set name
     * @param string $name
     * @return Language
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
     * @return Language
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
