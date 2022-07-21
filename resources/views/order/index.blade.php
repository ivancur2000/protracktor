@extends('layouts.theme.app')
@section('mainSection', 'Orders')
@section('pageTitle', 'Dashboard - Orders')
@section('content')

<div class="card card-p-0 px-5 card-flush">
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
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
                    </svg>
                </span>
                <!--end::Svg Icon-->Export Report
            </button>
            <!--begin::Menu-->
            <div id="kt_datatable_example_1_export_menu"
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="copy">
                        Copy to clipboard
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                        Export as Excel
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="csv">
                        Export as CSV
                    </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-export="pdf">
                        Export as PDF
                    </a>
                </div>
                <!--end::Menu item-->
            </div>
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary" type="button" id="dropdownMenuButton1" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear-fill fs-2x"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#columnsSelectorModal" href="#">Add columns</a></li>
                    <li><a class="dropdown-item" href="#">Reorder columns</a></li>
                </ul>
            </div>
            <!--end::Menu-->
            <!--end::Export dropdown-->
        </div>
    </div>
    <div class="card-body">
        <table id="kt_datatable_example_1" class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th data-column-key="settlementDate" class="min-w-100px">Settlement Date</th>
                    <th data-column-key="orderId" class="min-w-100px">Order ID</th>
                    <th data-column-key="productType" class="min-w-100px">Product Type</th>
                    <th data-column-key="propertyAddress" class="min-w-100px">Property Address</th>
                    <th data-column-key="escrowOfficer" class="text-end min-w-75px">Escrow Officer</th>
                    <th data-column-key="closingOffice" class="text-end min-w-75px">Closing Office</th>
                    <th data-column-key="orderStatus" class="text-end min-w-100px pe-5">Order Status</th>

                    <th data-column-key="buyingAgent" class="text-end min-w-100px pe-5" style="display: none;">Buying Agent</th>
                    <th data-column-key="listingAgent" class="text-end min-w-100px pe-5" style="display: none;">Listing Agent</th>
                    <th data-column-key="optinStatus" class="text-end min-w-100px pe-5" style="display: none;">Optin Status</th>
                    <th data-column-key="perferredCLosingLocation" class="text-end min-w-100px pe-5" style="display: none;">Perferred Closing Location</th>
                    <th data-column-key="closingTeam" class="text-end min-w-100px pe-5" style="display: none;">Closing Team</th>
                    <th data-column-key="addtionalField" class="text-end min-w-100px pe-5" style="display: none;">Addtional Field</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <tbody class="fw-bold text-gray-600">
                @foreach($ordersArray as $order)
                <tr class="odd">                                        
                    <td data-column-key="settlementDate">
                        <a href="#" class="text-dark text-hover-primary">{{$order['settlementDate']}}</a>
                    </td>
                    <td data-column-key="orderId">
                        <a href="{{ route('order.show', ['orderId' => $order['orderId']] )}}" class="text-dark text-hover-primary">{{$order['orderId']}}</a>
                    </td>
                    <td data-column-key="productType">
                        <div class="badge badge-light-success">{{$order['productType']}}</div>
                    </td>
                    <td data-column-key="propertyAddress" data-order="2022-03-10T21:23:00-05:00">{{$order['propertyAddress']}}</td>
                    <td data-column-key="escrowOfficer" class="text-end pe-0">{{$order['escrowOfficer']}}</td>
                    <td data-column-key="closingOffice" class="text-end pe-0">{{$order['closingOffice']}}</td>
                    <td data-column-key="orderStatus" class="text-end">{{$order['orderStatus']}}</td>      

                    <td data-column-key="buyingAgent" class="text-end" style="display: none;">{{$order['buyingAgent']}}</td>      
                    <td data-column-key="listingAgent" class="text-end" style="display: none;">{{$order['listingAgent']}}</td>      
                    <td data-column-key="optinStatus" class="text-end" style="display: none;">{{$order['optinStatus']}}</td>      
                    <td data-column-key="perferredCLosingLocation" class="text-end" style="display: none;">{{$order['perferredCLosingLocation']}}</td>      
                    <td data-column-key="closingTeam" class="text-end" style="display: none;">{{$order['closingTeam']}}</td>      
                    <td data-column-key="addtionalField" class="text-end" style="display: none;">{{$order['addtionalField']}}</td>
                </tr>
                @endforeach                
            </tbody>
          
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="columnsSelectorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="columnsSelectorForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select the columns to Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        @foreach ($columns as $column)
                        <label class="list-group-item">
                            <input class="form-check-input me-1" name="columnsSeleted[]" type="checkbox" value="{{ $column->key }}"
                                {{ $column->value ? 'checked':'' }} data-description="{{ $column->description }} ">
                            {{ $column->description }} 
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Fields to View</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const columnsSelectorForm = document.querySelector("#columnsSelectorForm");
    const columnsSelector = document.getElementsByName('columnsSeleted[]');
    const columns = document.querySelectorAll('#kt_datatable_example_1 th, #kt_datatable_example_1 td');

    columnsSelectorForm.addEventListener('submit', (e) => {
        e.preventDefault();
        onColumnsSelectorFormSubmit();
    });

    function showColumnsSelected() {
        columns.forEach((column) => {
            column.style.display = 'none';
        });
        columnsSelector.forEach((columnSelector) => {
            const column = document.querySelectorAll(`[data-column-key="${columnSelector.value}"]`);
            if (columnSelector.checked) {
                column.forEach((row) => row.style.display = 'table-cell');
            }
        });
    }

    async function onColumnsSelectorFormSubmit() {
        showColumnsSelected();
        let columnsData = [];
        columnsSelector.forEach((columnSelector) => {
            columnsData.push({
                description: columnSelector.dataset.description,
                key: columnSelector.value,
                value: columnSelector.checked
            });
        });
        $('#columnsSelectorModal').modal('hide');

        const response = await fetch("api/preference/orders-table/save", {
            method: "post",
            body: JSON.stringify({
                columns: columnsData
            }),
            headers: {
                "Content-Type": "aplication/json",
                "Authorization": "Bearer {{ auth()->user()->createToken('auth_token')->plainTextToken}}"
            },
        });
        const json = await response.json();
    }
    showColumnsSelected();
</script>
@endsection