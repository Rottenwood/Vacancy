$(document).ready(function () {

///////////////////////////////////////////////
////                                       ////
////              Variables                ////
////                                       ////
///////////////////////////////////////////////

    var vacancieslist = $("#vacancies tbody");
    var departmentTitle = $("span#department-name");
    var departments = {};
    var languages = {};

    // Default department and language to show
    var department = 0;
    var language = 0;


///////////////////////////////////////////////
////                                       ////
////               Functions               ////
////                                       ////
///////////////////////////////////////////////

    // Get all vacancies of department in chosen language
    function getVacanciesList(department, language) {
        var departmentForRequest = ++department;
        $.post("api/vacancy/list", {
                department: departmentForRequest,
                language: language
            },
            function (data) {
                drawVacanciesTable(data, department);
            }, "json");
        return true;
    }

    // Render vacancies table
    function drawVacanciesTable(data, department) {
        vacancieslist.empty();
        $.each(data, function (key, value) {
            var vacancyTitle = value["title"];
            var vacancyDescription = value["description"];
            vacancieslist.append('<tr><td>' + vacancyTitle + '</td><td>' + vacancyDescription + '</td></tr>');
        });

        return true;
    }

    // Get all departments
    function getDepartmentsList() {
        $.post("api/department/list", {},
            function (data) {
                departments = data;
                drawDepartments(data);
            }, "json");
        return true;
    }

    // Render department selector
    function drawDepartments(departmentName) {
        $("#department-list li.department-select").remove();
        $.each(departmentName, function (key, value) {
            var valueUppercase = value.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                return letter.toUpperCase();
            });

            $("#department-list").append('<li id="department' + key + '" class="department-select" role="presentation"><a role="menuitem" tabindex="-1" href="#" data-id="' + key + '">' + valueUppercase + '</a></li>');

            if (key == department) {
                departmentTitle.text(value.toUpperCase());
            }
        });

        return true;
    }

    // Get all languages
    function getLanguages() {
        $.post("api/language/list", {},
            function (data) {
                languages = data;
                drawLanguages(data);
            }, "json");
        return true;
    }

    // Render languages selector
    function drawLanguages(languages) {
        $("#language-list li.language-select").remove();
        $("#language-list").append('<li id="language0" class="language-select" role="presentation"><a role="menuitem" tabindex="-1" href="#" data-id="0">English</a></li>');
        $.each(languages, function (key, value) {
            key++;
            var valueUppercase = value.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                return letter.toUpperCase();
            });

            $("#language-list").append('<li id="language' + key + '" class="language-select" role="presentation"><a role="menuitem" tabindex="-1" href="#" data-id="' + key + '">' + valueUppercase + '</a></li>');

            if (key == department) {
                departmentTitle.text(value.toUpperCase());
            }
        });

        return true;
    }

///////////////////////////////////////////////
////                                       ////
////                Events                 ////
////                                       ////
///////////////////////////////////////////////

    // Select department
    $(document).on("click", ".department-select a", function (event) {
        event.preventDefault();
        department = $(this).data('id');

        getVacanciesList(department, language);

        $.each(departments, function (key, value) {
            if (key == department) {
                departmentTitle.text(value.toUpperCase());
            }
        });
    });

    // Select language
    $(document).on("click", ".language-select a", function (event) {
        event.preventDefault();
        language = $(this).data('id');

        getVacanciesList(department, language);
    });

///////////////////////////////////////////////
////                                       ////
////                Execute                ////
////                                       ////
///////////////////////////////////////////////

    getVacanciesList(department);
    getDepartmentsList();
    getLanguages();


});
