<?php
/**
 * Author: Rottenwood
 * Date Created: 09.09.14 19:53
 */

namespace Rottenwood\VacancyBundle\Service;

use Doctrine\ORM\EntityManager;
use Rottenwood\VacancyBundle\Entity\Department;
use Rottenwood\VacancyBundle\Entity\Language;
use Rottenwood\VacancyBundle\Entity\Translation;
use Rottenwood\VacancyBundle\Entity\Vacancy;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->vacancyRepository = $this->em->getRepository("RottenwoodVacancyBundle:Vacancy");
        $this->translationRepository = $this->em->getRepository("RottenwoodVacancyBundle:Translation");
        $this->departmentRepository = $this->em->getRepository("RottenwoodVacancyBundle:Department");
        $this->languageRepository = $this->em->getRepository("RottenwoodVacancyBundle:Language");
    }

    public function getDepartments() {
        $departmentsArray = $this->departmentRepository->findAll();
        $departments = array();

        foreach ($departmentsArray as $department) {
            /** @var Department $department */
            $departments[] = $department->getName();
        }

        return $departments;
    }

    public function getLanguages() {
        $languagesArray = $this->languageRepository->findAll();
        $languages = array();

        foreach ($languagesArray as $language) {
            /** @var Language $language */
            $languages[] = $language->getName();
        }

        return $languages;
    }

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
