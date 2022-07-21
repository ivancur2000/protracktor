@extends('layouts.theme.app')
@section('mainSection', 'Edit Users')
@section('pageTitle', 'Dashboard - Users - Edit User')
@section('content')
<div class="container bg-white rounded">
    <form action="{{ route('user.update', $user->id) }}" method="POST">
      <x-jet-validation-errors/>
      @csrf
      @method('PUT')
      <div class="row">
          <div class="col-md-4 border-right">
              <div class="p-3 py-5 text-center d-flex flex-column align-items-center">
                  <h4 class="text-right">Edit user</h4>
                  <img class="mt-5 rounded-circle" width="150px" src="{{ asset('assets/media/avatars/blank.png') }}">
                  <button class="mt-2 btn btn-primary profile-button btn-sm" type="button">Upload</button>
              </div>
          </div>
          <div class="mt-8 col-md-8 border-right">
              <div class="py-10">
                  <div class="mt-2 row">
                      <div class="col-md">
                        <label class="labels">First name</label>
                        <input type="text" class="form-control" placeholder="First name" name="name" value="{{ $user->name }}">
                      </div>
                      <div class="col-md">
                        <label class="labels">Last name</label>
                        <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ $user->last_name }}">
                      </div>
                  </div>
                  <div class="mt-3 row">
                      <div class="col-md">
                        <label class="labels">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@example.com" value="{{ $user->email }}">
                      </div>
                      <div class="col-md">
                        <label class="labels">Phone</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="777-234-6789" value="{{ $user->phone_number }}">
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
                      <div class="pb-5 row">
                        <div class="col-4">
                            @foreach($roles as $role)
                              <div class="my-2 form-check">
                                  <input  
                                    type="radio" 
                                    class="form-check-input" 
                                    id="{{ $role->name }}" 
                                    name="role" 
                                    value="{{ $role->id }}"
                                    @if($user->roles[0]->name == $role->name)
                                      checked
                                    @endif
                                  >
                                  <label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
                              </div>
                            @endforeach
                        </div>
                    </div>
              </div>
              <!--end::Col-->
          </div>
 
          <div class="mt-8 mb-6 row">
              <label class="col-lg-4 col-form-label fw-bold fs-6">
                  <h4 class="text-right">Acount status</h4>
                  <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>
              </label>
              <!--end::Label-->
              <!--begin::Col-->
              <div class="col-lg-8">
                    <div class="pb-5 row">
                        <div class="col-4">
                          <div class="my-2 form-check">
                              <input  
                                type="radio" 
                                class="form-check-input" 
                                id="Pending approval" 
                                name="status_acount" 
                                value="0"
                                @if($user->state_acount == 0)
                                  checked
                                @endif
                              >
                              <label class="form-check-label" for="Pending approval">Pending approval</label>
                          </div>
                          <div class="my-2 form-check">
                              <input  
                                type="radio" 
                                class="form-check-input" 
                                id="Active" 
                                name="status_acount" 
                                value="1"
                                @if($user->state_acount == 1)
                                  checked
                                @endif
                              >
                              <label class="form-check-label" for="Active">Active</label>
                          </div>
                          <div class="my-2 form-check">
                              <input  
                                type="radio" 
                                class="form-check-input" 
                                id="Refused" 
                                name="status_acount" 
                                value="2"
                                @if($user->state_acount == 2)
                                  checked
                                @endif
                              >
                              <label class="form-check-label" for="Refused">Refused</label>
                          </div>
                        </div>
                    </div>
              </div>
          </div>

          <div class="mt-8 mb-6 row">
              <!--begin::Label-->
              <label class="col-lg-4 col-form-label fw-bold fs-6">
                  <h4 class="text-right">Teams</h4>
                  <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin finibus sem vehicula vulputate.</small>
              </label>
              <!--end::Label-->
              <!--begin::Col-->
              <div class="col-lg-8">
                <select class="w-full form-control" id="team_id" name="team_id">
                  <option></option>
                  @foreach($teams as $team)
                    <option 
                      value="{{ $team->id }}"
                      @if($user->team)
                        @if($team->id == $user->team->id)
                          selected
                        @endif
                      @endif
                    >
                      {{ $team->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <!--end::Col-->
          </div>
          <div class="w-full">
            <button class="mx-auto mt-2 btn btn-primary profile-button btn-sm" type="submit">Update</button>
          </div>
      </div>
    </form>
</div>
<script>
let role = document.getElementsByName('role');
let teamSelect = document.getElementById('team_id');

role.forEach((roleElement)=> {

  if(roleElement.checked){
    if(roleElement.value == 2){
      teamSelect.disabled = false;
    }else{
      teamSelect.disabled = true;
    }
  }
  
  roleElement.addEventListener('click', (e)=>{
    if(e.target.value == 2){
      teamSelect.disabled = false;
    }else{
      teamSelect.disabled = true;
    }
  });
});

</script>
@endsection
