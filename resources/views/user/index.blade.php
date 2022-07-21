@extends('layouts.theme.app')
@section('mainSection', 'Users')
@section('pageTitle', 'Dashboard - User Management')
@section('content')

<div class="px-5 card card-p-0 card-flush">
    <div class="py-5 card-header align-items-center gap-2 gap-md-5">
        <div class="card-title">
            <!--begin::Search-->
            <div class="my-1 d-flex align-items-center position-relative">
                <span class="svg-icon svg-icon-1 position-absolute ms-4"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor"></path>
                    </svg></span>
                <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14"
                    placeholder="Search Report" />
            </div>
            <!--end::Search-->
            <!--begin::Export buttons-->
            <div id="kt_datatable_example_1_export" class="d-none"></div>
            <!--end::Export buttons-->
        </div>
        <div>
         <a class="mx-auto" href="{{ route('user.create'); }}">Create new user</a>
        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <!--begin::Export dropdown-->
            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1"
                            transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
                        <path
                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                            fill="currentColor"></path>
                        <path
                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                            fill="#C4C4C4"></path>
                    </svg> </span>
                <!--end::Svg Icon-->
                Export Report
            </button>
            <!--begin::Menu-->
            <div id="kt_datatable_example_1_export_menu"
                class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="px-3 menu-item">
                    <a href="#" class="px-3 menu-link" data-kt-export="copy">
                        Copy to clipboard
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="px-3 menu-item">
                    <a href="#" class="px-3 menu-link" data-kt-export="excel">
                        Export as Excel
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="px-3 menu-item">
                    <a href="#" class="px-3 menu-link" data-kt-export="csv">
                        Export as CSV
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="px-3 menu-item">
                    <a href="#" class="px-3 menu-link" data-kt-export="pdf">
                        Export as PDF
                    </a>
                </div>
                <!--end::Menu item-->
            </div>           
            <!--end::Menu-->
            <!--end::Export dropdown-->
        </div>
    </div>
    <div class="card-body">
        <table id="kt_datatable_example_1" class="table align-middle border rounded table-row-dashed fs-6 g-5">
            <thead>
                <!--begin::Table row-->
                <tr class="text-gray-400 text-start fw-bolder fs-7 text-uppercase">
                    <th data-column-key="settlementDate" class="min-w-100px">Full Name</th>
                    <th data-column-key="orderID" class="min-w-100px">User Role</th>
                    <th data-column-key="productType" class="min-w-100px">Email Address</th>
                    <th data-column-key="closingOffice" class="text-end min-w-75px">Account Status</th>
                    <th data-column-key="closingOffice" class="text-end min-w-75px">Team</th>
                    <th data-column-key="icono" class="text-end min-w-100px pe-5"></th>    
                </tr>
                <!--end::Table row-->
            </thead>
            <tbody class="text-gray-600 fw-bold">
                @foreach($users as $user)
                <tr class="odd">                                        
                    <td data-column-key="settlementDate">
                        <a href="#" class="text-dark text-hover-primary">{{ $user->name . " " . $user->last_name }}</a>
                    </td>
                    <td data-column-key="orderID">
                        <a href="#" class="text-dark text-hover-primary">
                          @foreach($user->roles as $role)  
                            {{ $role->name }}
                          @endforeach
                        </a>
                    </td>
                    <td data-column-key="productType">
                        <div class="badge badge-light-success">{{ $user->email }}</div>
                    </td>
                    <td data-column-key="closingOffice" class="text-end pe-0">
                      @switch($user->state_acount)
                        @case(0)
                          {{"Pending approval"}}
                          @break
                        @case(1)
                          {{"Active"}}
                          @break
                        @case(2)
                          {{"Refused"}}
                          @break
                        @deafult
                          {{"Pending approval"}}
                      @endswitch
                    </td>
                    <td data-column-key="closingOffice" class="text-end pe-0">
                      @if($user->team)
                        <div class="badge badge-light-success">
                          {{ $user->team->name }}
                        </div>
                      @else
                        {{"No Team"}}
                      @endif
                    </td>
                    <td class="w-full text-center" data-column-key="Status">
                      <a href="{{  route('user.edit', $user->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <form action="{{  route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 bg-white border-0 text-danger">
                          <i class="fa-solid fa-circle-minus"></i>
                        </button>
                      </form>
                    </td>
                </tr>
                @endforeach                
            </tbody>                     
        </table>
    </div>
</div> 
@endsection
