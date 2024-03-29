@extends('admin.layout.master')
@section('title', 'Dashboard')
@push('css')
    <link href="{{ asset('assets/css/widgets/modules-widgets.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
@push('js')
    <script src="{{ asset('assets/js/widgets/modules-widgets.js') }}"></script>
@endpush
@section('content')
    <div class="row widget-statistic layout-top-spacing">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
            <div class="widget widget-one_hybrid widget-referral" style="background: #ffdd92">
                <div class="widget-heading">
                    <a href="{{ route('admin.admins.index') }}">
                        <div class="w-title d-flex justify-content-evenly">
                            <div class="w-icon" style="background:#ffdd92;  color:#1b55e2; border: 1px solid #1b55e2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="ml-2">
                                <p class="w-value">{{ $admins }}</p>
                                <h5 class="">Admins</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
            <div class="widget widget-one_hybrid widget-referral" style="background:#f1f2f3">
                <div class="widget-heading">
                    <a href="{{ route('admin.users.index') }}">
                        <div class="w-title d-flex justify-content-evenly">
                            <div class="w-icon" style=" background:#f1f2f3;color:#1b55e2; border: 1px solid #1b55e2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                            </div>
                            <div class="ml-2">
                                <p class="w-value">{{ $users }}</p>
                                <h5 class="">Users</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
            <div class="widget widget-one_hybrid widget-referral" style="background:#ffc6c6; color: #000">
                <div class="widget-heading">
                    <a href="{{ route('admin.brands.index') }}">
                        <div class="w-title d-flex justify-content-evenly">
                            <div class="w-icon" style="background:#ffc6c6; border: 1px solid #d70606">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                            </div>
                            <div class="ml-2">
                                <p class="w-value">{{ $brands }}</p>
                                <h5 class="">Brands</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 layout-spacing">
            <div class="widget widget-one_hybrid widget-referral" style="background:#c3ff45; color: #000">
                <div class="widget-heading">
                    <a href="{{ route('admin.services.index') }}">
                        <div class="w-title d-flex justify-content-evenly">
                            <div class="w-icon" style="background:#c3ff45; border: 1px solid brown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="brown" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                            </div>
                            <div class="ml-2">
                                <p class="w-value">{{ $services }}</p>
                                <h5 class="">Services</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
