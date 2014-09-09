<?php
/**
 * Author: Rottenwood
 * Date Created: 09.09.14 15:11
 */

namespace Rottenwood\VacancyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * API Controller
 * @package Rottenwood\VacancyBundle\Controller
 */
class ApiController extends Controller {

    /**
     * API: Get all departments names
     * @return JsonResponse
     */
    public function getDepartmentsAction() {
        $departments = $this->get('vacancy.service')->getDepartments();

        return new JsonResponse($departments);
    }

    /**
     * API: Get all languages
     * @return JsonResponse
     */
    public function getLanguagesAction() {
        $languages = $this->get('vacancy.service')->getLanguages();

        return new JsonResponse($languages);
    }

    /**
     * API: Get all vacancies in chosen department and language
     * @param Request $request
     * @return JsonResponse
     */
    public function getVacanciesAction(Request $request) {
        $department = $request->request->get('department');
        $language = $request->request->get('language');

        $vacancies = $this->get('vacancy.service')->getVacancies($department, $language);

        return new JsonResponse($vacancies);
    }
} 
