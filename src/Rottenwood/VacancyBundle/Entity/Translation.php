<?php

namespace Rottenwood\VacancyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translation of vacancy
 * @ORM\Table(name="translations")
 * @ORM\Entity(repositoryClass="Rottenwood\VacancyBundle\Repository\TranslationRepository")
 */
class Translation {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Vacancy
     * @ORM\ManyToOne(targetEntity="Vacancy")
     * @ORM\JoinColumn(name="vacancy_id", referencedColumnName="id", nullable=false)
     */
    private $vacancy;

    /**
     * Language of vacancy
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", nullable=false)
     */
    private $language;

    /**
     * Title of vacancy
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * Description of vacancy
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
     * Set Vacancy
     * @param mixed $vacancy
     */
    public function setVacancy($vacancy) {
        $this->vacancy = $vacancy;
    }

    /**
     * Get Vacancy
     * @return mixed
     */
    public function getVacancy() {
        return $this->vacancy;
    }

    /**
     * Set Language
     * @param Language $language
     */
    public function setLanguage($language) {
        $this->language = $language;
    }

    /**
     * Get Language
     * @return Language
     */
    public function getLanguage() {
        return $this->language;
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
     * Set description
     * @param string $description
     * @return Translation
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
