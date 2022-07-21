@extends('layouts.theme.app')
@section('mainSection', 'User Management')
@section('pageTitle', 'Dashboard - User Management - Add New User')
@section('content')
<div class="container rounded bg-white">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <h4 class="text-right">My Account</h4>
                <img class="rounded-circle mt-5" width="150px" src="assets/media/avatars/blank.png">
                <button class="btn btn-primary profile-button mt-2 btn-sm" type="button">Upload</button>
            </div>
        </div>
        <div class="col-md-8 border-right mt-8">
            <div class="py-10">
                <div class="row mt-2">
                    <div class="col-md"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="full name" value="{{ auth()->user()->name }}"></div>
                    <div class="col-md"><label class="labels">Email address</label><input type="text" class="form-control" value="{{ auth()->user()->email }}" placeholder="email address"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md"><label class="labels">Phone</label><input type="text" class="form-control" value="" placeholder="777-234-6789"></div>
                    <div class="col-md">
                        <label class="labels">Time Zone</label>
                        <select class="form-select">
                            <option selected>Time Zone</option>
                            <option value="1">Central - Chicago</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-6 mt-8">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <h4 class="text-right">Select User Role</h4>
                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <form>
                    <div class="row pb-5">
                        <div class="col-2">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                                <label class="form-check-label" for="radio1">Super Admin</label>
                            </div>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</h6>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-2">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                <label class="form-check-label" for="radio2">Admin</label>
                            </div>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</h6>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-2">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                                <label class="form-check-label">Coordinator</label>
                            </div>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</h6>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-2">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option4">
                                <label class="form-check-label">Client</label>
                            </div>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</h6>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-2">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Partner</label>
                            </div>

                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</h6>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6  mt-8">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <h4 class="text-right">Select Order Association</h4>
                <small>Select or Enter the ordern number the user should be associated with</small>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <form>
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col fv-row fv-plugins-icon-container">
                            <select class="form-select">
                                <option selected>Type in order ID</option>
                                <option value="1">Option 2</option>
                            </select>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col fv-row fv-plugins-icon-container">
                            <button class="btn btn-primary">Lookup Order informaion</button>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                </form>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6  mt-8">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <h4 class="text-right">Select Team</h4>
                <small>Select the team the user belongs to, if necessary</small>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <form>
                    <!--begin::Row-->
                    <div class="row">
                    <div class="col fv-row fv-plugins-icon-container">
                            <select class="form-select">
                                <option selected>Select Team</option>
                                <option value="1">Option 2</option>
                            </select>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col fv-row fv-plugins-icon-container">                           
                        </div>
                    </div>                    
                    <!--end::Row-->
                </form>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6  mt-8">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <h4 class="text-right">Select Office</h4>
                <small>Select the Office of the user.</small>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <form>
                    <!--begin::Row-->
                    <div class="row mb-5">
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Blaine</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Excelsior</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Rochester</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Woodbury</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Bloomington</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Lakeville</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Savage</label>
                            </div>
                        </div>                   
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Chanhassen</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Mankato</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Shakopee</label>
                            </div>
                        </div>                   
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Coon Rapids</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Minnetonka</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Victoria</label>
                            </div>
                        </div>                   
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Cottage Grove</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Northfield</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Waconia</label>
                            </div>
                        </div>                   
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Eagan</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Orono</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option5">
                                <label class="form-check-label">Wayzata</label>
                            </div>
                        </div>                   
                    </div>
                </form>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6  mt-8">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <h4 class="text-right">Two Factor Authentication</h4>
                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <form>
                    <!--begin::Row-->
                    <div class="row">
                        <small>Provides an added layer of security for you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>
                    </div>
                    <!--end::Row-->
                    <div class="row">
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <button class="btn btn-primary">Enable</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6  mt-8">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">
                <h4 class="text-right">Notifications</h4>                
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <form>
                    <!--begin::Row-->
                    <div class="row">
                        <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>

                    </div>
                    <!--end::Row-->
                    <div class="row">
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <button class="btn btn-primary">Enable</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Col-->
        </div>

    </div>
</div>
</div>
</div>
@endsection