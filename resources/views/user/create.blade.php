@extends('layouts.theme.app')
@section('mainSection', 'Add Users')
@section('pageTitle', 'Dashboard - Users - Add New User')
@section('content')
<div class="container bg-white rounded">
    <form action="{{ route('user.store') }}" method="POST">
      <x-jet-validation-errors/>
      @csrf
      <div class="row">
          <div class="col-md-4 border-right">
              <div class="p-3 py-5 text-center d-flex flex-column align-items-center">
                  <h4 class="text-right">New users</h4>
                  <img class="mt-5 rounded-circle" width="150px" src="{{ asset('assets/media/avatars/blank.png') }}">
                  <button class="mt-2 btn btn-primary profile-button btn-sm" type="button">Upload</button>
              </div>
          </div>
          <div class="mt-8 col-md-8 border-right">
              <div class="py-10">
                  <div class="mt-2 row">
                      <div class="col-md">
                        <label class="labels">First name</label>
                        <input type="text" class="form-control" placeholder="First name" name="name">
                      </div>
                      <div class="col-md">
                        <label class="labels">Last name</label>
                        <input type="text" class="form-control" placeholder="Last name" name="last_name">
                      </div>
                  </div>
                  <div class="mt-3 row">
                      <div class="col-md">
                        <label class="labels">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@example.com">
                      </div>
                      <div class="col-md">
                        <label class="labels">Phone</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="777-234-6789">
                      </div>
                  </div>
              </div>
          </div>


          <div class="mt-8 mb-6 row">
              <!--begin::Label-->
              <label class="col-lg-4 col-form-label fw-bold fs-6">
                  <h4 class="text-right">Select User Role</h4>
                  <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>
              </label>
              <!--end::Label-->
              <!--begin::Col-->
              <div class="col-lg-8">
                  <form>
                      <div class="pb-5 row">
                          <div class="col-4">
                              @foreach($roles as $role)
                                <div class="my-2 form-check">
                                    <input type="radio" class="form-check-input" id="{{ $role->name }}" name="role" value="{{ $role->id }}">
                                    <label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
                                </div>
                              @endforeach
                          </div>
                      </div>
                  </form>
              </div>
              <!--end::Col-->
          </div>
          <div class="w-full">
            <button class="mx-auto mt-2 btn btn-primary profile-button btn-sm" type="submit">Register</button>
          </div>
      </div>
    </form>
</div>
@endsection
