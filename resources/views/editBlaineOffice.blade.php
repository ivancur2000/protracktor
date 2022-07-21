@extends('layouts.theme.app')
@section('mainSection', 'Offices')
@section('pageTitle', 'Dashboard - Offices - Blaine Office')
@section('content')

<div class="container rounded bg-white m-5 p-3">
      <h3 class="text-right">Edit Blaine Office</h3>
      <div class="row px-3">
        <div class="col-md-4 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5" >
            <i class="fa-solid fa-image" style="font-size: 150px;"></i>
            <button
              class="btn btn-primary profile-button mt-2 btn-sm"
              type="button"
            >
              Upload
            </button>
          </div>
        </div>
        <div class="col-md-8 border-right shadow p-3 mb-5 bg-body rounded">
          <div class="row mb-5aa mt-5">
            <label class="col-lg-4 col-form-label fw-bold fs-6">
              <h4 class="text-right">Office Title</h4>
              <small>This will be the title of the office</small>
            </label>
            <div class="col-lg-8">
              <form>
                <input
                  type="text"
                  name="title"
                  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  value=""
                />
              </form>
            </div>
          </div>
        </div>
        

        <div class="my-5">
          <h3 >Address</h3>
          <div class="border-right mt-8 shadow-lg p-3 mb-5 bg-body rounded">
            <div class="py-10">
              <div class="row mt-2">
                <div class="col-md-3">
                  <label for="country" class="form-label fw-bold">Country</label>
                  <select name="country" id="country" class="form-control">
                    <option value="">United States</option>
                    <option value="">Canada</option>
                    <option value="">Mexico</option>
                  </select>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-7">
                  <label for="street" class="form-label fw-bold">Street Address</label>
                  <input type="text" name="street" id="street" class="form-control" />
                </div>
                <div class="col-md-5">
                  <label for="suite" class="form-label fw-bold">Suite Number</label>
                  <input type="text" name="suite" id="suite" class="form-control" />
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-3">
                  <label for="city" class="form-label fw-bold">City</label>
                  <input type="text" name="city" id="city" class="form-control" />
                </div>
                <div class="col-md-4">
                  <label for="state" class="form-label fw-bold">State/Province</label>
                  <select name="state" id="state" class="form-control">
                    <option value="">Mimesota</option>
                    <option value="">NY</option>
                    <option value="">Colorado</option>
                  </select>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-4">
                  <label for="zipCode" class="form-label fw-bold">Zip Code</label>
                  <input type="text" name="city" id="zipCode" class="form-control" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-5 mt-5">
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <h4 class="text-right">Contact Informarion</h4>
            <small>This is the phone and fax number that contact can reach this office</small>
          </label>
          <div class="col-lg-8 shadow p-3 mb-5 bg-body rounded">
            <form class="row">
              <small class="fw-bold">This should be the primary contact information that clients can use contact you at this location.</small>
              <div class="row mt-3">
                <div class="col-md-2">
                  <label class="fw-bold form-label" for="phone">Phone</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control" name="extension" id="extension" placeholder="Extension">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-2">
                  <label class="fw-bold form-label" for="Fax">Fax</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="Fax" id="Fax">
                </div>
              </div>
            </form>
          </div>
          <!--end::Col-->
        </div>

        <div class="row mb-5 mt-5">
          <label class="col-lg-4 col-form-label fw-bold fs-6">
            <h4 class="text-right">Localization</h4>
          </label>
          <div class="col-lg-8 shadow p-3 mb-5 bg-body rounded">
            <form class="row my-3">
              <label class="form-label fw-bold" for="timezone">Timezone</label>
              <div class="col-md-5">
                <select name="timezone" id="timezone" class="form-control">
                  <option value="">Central Chicago</option>
                  <option value="">Colorado</option>
                </select>
              </div>
            </form>
          </div>
          <!--end::Col-->
        </div>      
      </div>
    </div>

@endsection