@extends('layouts.theme.app')
@section('mainSection', 'Dashboard')
@section('content')
<div class="d-flex flex-row justify-content-end h-50px">
    <span class="text-muted mt-1 fw-bold fs-2">
        June 1 - June 5&nbsp;&nbsp;<i class="bi bi-calendar-fill fs-2x"></i>
    </span>
</div>
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-25 mb-5 mb-xl-10" style="background-color: #080655;background-image:url('/metronic8/demo1/assets/media/svg/shapes/wave-bg-dark.svg')">
    <div class="card-body d-flex">
        <div class="d-flex flex-row flex-column-fluid">
            <div class="d-flex flex-row-fluid flex-center flex-column">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">592</span>
                <!--end::Amount-->
                <!--begin::Subtitle-->
                <span class="text-white opacity-75 pt-1 fw-bold fs-6">Messages Sent</span>
                <!--end::Subtitle-->
            </div>

            <div class="d-flex flex-row-fluid flex-center flex-column">
                <!--begin::Amount-->
                <div>
                    <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">576 </span>
                    <span class="text-white opacity-75">(97.3%)</span>
                </div>
                <!--end::Amount-->
                <!--begin::Subtitle-->
                <span class="text-white opacity-75 pt-1 fw-bold fs-6">Delivered</span>
                <!--end::Subtitle-->
            </div>

            <div class="d-flex flex-row-fluid flex-center flex-column">
                <!--begin::Amount-->
                <div>
                    <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">54.0%</span>
                    <span class="text-white opacity-75">(311)</span>
                </div>
                <!--end::Amount-->
                <!--begin::Subtitle-->
                <span class="text-white opacity-75 pt-1 fw-bold fs-6">Open Rate</span>
                <!--end::Subtitle-->
            </div>

            <div class="d-flex flex-row-fluid flex-center flex-column">
                <!--begin::Amount-->
                <div>
                    <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">2.8%</span>
                    <span class="text-white opacity-75">(16)</span>
                </div>
                <!--end::Amount-->
                <!--begin::Subtitle-->
                <span class="text-white opacity-75 pt-1 fw-bold fs-6">Click Rate</span>
                <!--end::Subtitle-->
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex flex-row h-400px">
            <div class="d-flex flex-center flex-column flex-row-auto w-400px">
                <span class="text-black text-center fw-bolder fs-1">Engagment</span>
                <div class="d-flex flex-column-fluid flex-center w-300px">
                    <canvas id="myChart" width="100" height="100"></canvas>
                </div>
            </div>

            <div class="d-flex flex-column flex-row-fluid">
                <div class="d-flex flex-row flex-column-fluid">
                    <div class="d-flex flex-row-fluid flex-center">
                        <div class="w-400px pt-5">
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="fw-bolder text-gray-700 fw-bold fs-5 me-2">Delivered</div>
                                <!--end::Section-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-senter">
                                    <!--begin::Number-->
                                    <span class="text-gray-900 fw-boldest fs-2 badge badge-light-primary">351</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <div class="d-flex ms-10">
                                <!--begin::Section-->
                                <div class="fw-bolder text-gray-700 fw-bold fs-7 me-2">Unique Opens</div>
                                <!--end::Section-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-senter">
                                    <!--begin::Number-->
                                    <span class="text-gray-900 fw-boldest fs-4 badge badge-light-primary">312</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <div class="d-flex ms-10">
                                <!--begin::Section-->
                                <div class="fw-bolder text-gray-700 fw-bold fs-7 me-2">Unique Clicks</div>
                                <!--end::Section-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-senter">
                                    <!--begin::Number-->
                                    <span class="text-gray-900 fw-boldest fs-4 badge badge-light-primary">25</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="fw-bolder text-gray-700 fw-bold fs-5 me-2">Hard Bounces</div>
                                <!--end::Section-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-senter">
                                    <!--begin::Number-->
                                    <span class="text-gray-900 fw-boldest fs-2 badge badge-light-primary">0</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="fw-bolder text-gray-700 fw-bold fs-5 me-2">Soft Bounces</div>
                                <!--end::Section-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-senter">
                                    <!--begin::Number-->
                                    <span class="text-gray-900 fw-boldest fs-2 badge badge-light-primary">27</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="fw-bolder text-gray-700 fw-bold fs-5 me-2">Total Message Sent</div>
                                <!--end::Section-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-senter">
                                    <!--begin::Number-->
                                    <span class="text-gray-900 fw-boldest fs-2 badge badge-light-primary">378</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts-by-view')
<script>
    const data = {
        labels: ['Opens', 'Clicks', 'Unopens'],
        datasets: [{
            label: 'Dataset 1',
            data: [512, 39, 21],
            backgroundColor: ['#F1416C', '#50CD89', '#7239EA'],
            borderWidth: 4,
            hoverBorderWidth: 0,
            borderAlign: 'center'
        }]
    };

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            cutout: 100,
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: false
                }
            }
        },
    });
</script>
@endsection