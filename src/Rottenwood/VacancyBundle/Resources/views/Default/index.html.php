<?php $view->extend('RottenwoodVacancyBundle:Default:layout.html.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="col-md-8 header">Vacancies of <b><span id="department-name"></span></b> department</h4>

            <div class="col-md-2 selectors">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown"><span id="dropdownMenuLabel">Department</span> <span
                            class="caret"></span>
                    </button>
                    <ul id="department-list" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li class="department-select" role="presentation"></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2 selectors">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown"><span id="dropdownMenuLabel">Language</span> <span
                            class="caret"></span>
                    </button>
                    <ul id="language-list" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li class="language-select" role="presentation"></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table id="vacancies" class="table table-bordred table-striped tableheader">
                    <thead>
                    <th class="vacancy-name">Vacancy</th>
                    <th>Description</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
