<?php $view->extend('RottenwoodVacancyBundle:Default:layout.html.php') ?>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h4 class="header">Vacancies of "" department</h4>

            <div class="table-responsive">

                <table id="mytable" class="table table-bordred table-striped tableheader">

                    <thead>

                    <th>Vacancy</th>
                    <th>Description</th>
                    <th class="edit">Edit</th>
                    <th class="delete">Delete</th>
                    </thead>
                    <tbody>

                    <tr>
                        <td>vacancy name</td>
                        <td>vacancy description</td>
                        <td>
                            <p>
                                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                        data-target="#edit" data-placement="top" rel="tooltip"><span
                                        class="glyphicon glyphicon-pencil"></span></button>
                            </p>
                        </td>
                        <td>
                            <p>
                                <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                        data-target="#delete" data-placement="top" rel="tooltip"><span
                                        class="glyphicon glyphicon-trash"></span></button>
                            </p>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
