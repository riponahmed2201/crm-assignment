@extends('master')

@section('title', 'Admin Dashbaord')
@section('page_title', 'Admin Dashbaord')

@section('content')
    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Tasks</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="p-3">
                                    <h6>{{ $taskCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Academic Roles</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $academicRoleCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $userCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Research Projects</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $researchProjectsCount ?? 0 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Member's contributions to this project</h5>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">
                                Subarna Islam (242-0081-015)
                            </li>
                            <li class="list-group-item">
                                Md. Shariful Islam (242-0285-032)
                            </li>
                            <li class="list-group-item">
                                Md. Abid Hossain (242-0286-032)
                            </li>
                            <li class="list-group-item">
                                Umma Habiba (242-0270-015)
                            </li>
                            <li class="list-group-item">
                                Litan Mia (241-0307-014)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
