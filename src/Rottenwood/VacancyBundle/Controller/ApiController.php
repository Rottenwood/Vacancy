<?php
/**
 * Author: Rottenwood
 * Date Created: 09.09.14 15:11
 */

namespace Rottenwood\VacancyBundle\Controller;

use Rottenwood\VacancyBundle\Entity\Department;
use Rottenwood\VacancyBundle\Entity\Language;
use Rottenwood\VacancyBundle\Entity\Vacancy;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * API Controller
 * @package Rottenwood\VacancyBundle\Controller
 */
class ApiController extends Controller {

    private $em;

    public function getDepartmentsAction() {
        $this->em = $this->getDoctrine()->getManager();
        $departments = $this->em->getRepository('RottenwoodVacancyBundle:Department')->findAll();
        $result = array();

        foreach ($departments as $department) {
            /** @var Department $department */
            $result[] = $department->getName();
        }

        return new JsonResponse($result);
    }

    public function getLanguagesAction() {
        $this->em = $this->getDoctrine()->getManager();
        $languages = $this->em->getRepository('RottenwoodVacancyBundle:Language')->findAll();
        $result = array();

        foreach ($languages as $language) {
            /** @var Language $depa $languages */
            $result[] = $language->getName();
        }

        return new JsonResponse($result);
    }

    public function getVacanciesAction(Request $request) {
        $this->em = $this->getDoctrine()->getManager();

        $department = $request->request->get('department');
        $department++;
        $language = $request->request->get('language');

        $vacanciesAll = $this->em->getRepository("RottenwoodVacancyBundle:Vacancy")->findByDepartment
            ($department);

        $vacanciesTranslated = $this->em->getRepository('RottenwoodVacancyBundle:Translation')->findTranslations($vacanciesAll, $language);

        $vacanciesTranslatedIds = array();

        foreach ($vacanciesTranslated as $vacancyTranslated) {
            $vacanciesTranslatedIds[] = $vacancyTranslated->getVacancy();
        }

        $vacanciesWithoutTranslation = array_udiff($vacanciesAll, $vacanciesTranslatedIds,
            function ($obj_a, $obj_b) {
                return $obj_a->id - $obj_b->id;
            }
        );

        $vacancies = array_merge($vacanciesTranslated, $vacanciesWithoutTranslation);

        $result = array();

        foreach ($vacancies as $vacancy) {
            /** @var Vacancy $vacancy */
            $vacancyId = $vacancy->getId();
            $result[$vacancyId]["title"] = $vacancy->getTitle();
            $result[$vacancyId]["description"] = $vacancy->getDescription();
        }

        return new JsonResponse($result);
    }
} 
