<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ServiceForm> $serviceForms
 */
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List of all Pending Service Forms</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" style="white-space: nowrap;">
                        <table id="historyServiceFormsTable" class="table table-bordered table-hover " style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>Endorsed By</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Actioned By</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
