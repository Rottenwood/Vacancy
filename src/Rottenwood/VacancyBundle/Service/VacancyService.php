<?php
/**
 * Author: Rottenwood
 * Date Created: 09.09.14 19:53
 */

namespace Rottenwood\VacancyBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Rottenwood\VacancyBundle\Entity\Department;
use Rottenwood\VacancyBundle\Entity\Language;
use Rottenwood\VacancyBundle\Entity\Translation;
use Rottenwood\VacancyBundle\Entity\Vacancy;

/**
 * Main service of Vacancy application
 * @package Rottenwood\VacancyBundle\Service
 */
class VacancyService {

    private $em;
    private $vacancyRepository;
    private $translationRepository;
    private $departmentRepository;
    private $languageRepository;

    public function __construct(ObjectManager $em) {
        $this->em = $em;
        $this->vacancyRepository = $em->getRepository("RottenwoodVacancyBundle:Vacancy");
        $this->translationRepository = $em->getRepository("RottenwoodVacancyBundle:Translation");
        $this->departmentRepository = $em->getRepository("RottenwoodVacancyBundle:Department");
        $this->languageRepository = $em->getRepository("RottenwoodVacancyBundle:Language");
    }

    /**
     * Get all departments from the database
     * @return array
     */
    public function getDepartments() {
        $departmentsArray = $this->departmentRepository->findAll();
        $departments = array();

        foreach ($departmentsArray as $department) {
            /** @var Department $department */
            $departments[] = $department->getName();
        }

        return $departments;
    }

    /**
     * Get all languages from the database
     * @return array
     */
    public function getLanguages() {
        $languagesArray = $this->languageRepository->findAll();
        $languages = array();

        foreach ($languagesArray as $language) {
            /** @var Language $language */
            $languages[] = $language->getName();
        }

        return $languages;
    }

    /**
     * Get list of vacancies in chosen department and language
     * First I get all vacancies of the department,
     * then all vacancies that are translated, and merging them
     * according to Vacancy identificator
     * @param $department
     * @param $language
     * @return array
     */
    public function getVacancies($department, $language) {
        $vacanciesAll = $this->vacancyRepository->findByDepartment($department);
        $vacanciesTranslated = $this->translationRepository->findTranslations($vacanciesAll, $language);

        $vacanciesTranslatedIds = array();
        foreach ($vacanciesTranslated as $vacancyTranslated) {
            /** @var Translation $vacancyTranslated */
            $vacanciesTranslatedIds[] = $vacancyTranslated->getVacancy();
        }

        // Difference in arrays with objects
        $vacanciesWithoutTranslation = array_udiff($vacanciesAll, $vacanciesTranslatedIds,
            function ($obj_a, $obj_b) {
                return $obj_a->id - $obj_b->id;
            }
        );

        // Merging translated vacancies and those, who left untranslated
        $vacanciesResult = array_merge($vacanciesTranslated, $vacanciesWithoutTranslation);

        $vacancies = array();
        foreach ($vacanciesResult as $vacancy) {
            /** @var Vacancy $vacancy */
            $vacancyId = $vacancy->getId();
            $vacancies[$vacancyId]["title"] = $vacancy->getTitle();
            $vacancies[$vacancyId]["description"] = $vacancy->getDescription();
        }

        return $vacancies;
    }

}
