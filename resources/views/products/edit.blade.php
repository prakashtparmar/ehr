<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Edit Product')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
    @stack('styles')
</head>

<body class="no-skin">
    {{-- Header --}}
    @include('layouts.partials.header')

    <div class="main-container ace-save-state" id="main-container">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        <div class="main-content">
            <div class="main-content-inner">

                {{-- Breadcrumbs --}}
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li><a href="#">Employe Health Record</a></li>
                        <li class="active">Edit Product</li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Employe Health Record
                            <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Health Record</small>
                            <a class="btn btn-primary btn-sm pull-right" href="{{ route('products.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Form Start --}}
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered table-striped">

                                    {{-- Section 1: Employee Information --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">1. Employee Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Employee No</td>
                                            <td><input type="text" name="EmployeeNo" class="form-control" value="{{ old('EmployeeNo', $product->EmployeeNo) }}"></td>
                                            <td>2 Employee Name</td>
                                            <td><input type="text" name="EmployeeName" class="form-control" value="{{ old('EmployeeName', $product->EmployeeName) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>3 Date of Birth</td>
                                            <td><input type="date" name="DateOfBirth" class="form-control" value="{{ old('DateOfBirth', $product->DateOfBirth) }}"></td>
                                            <td>4 Sex</td>
                                            <td>
                                                <select name="Sex" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="male" {{ old('Sex', $product->Sex) == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ old('Sex', $product->Sex) == 'female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5 Identification Mark</td>
                                            <td colspan="3"><textarea name="IdentificationMark" class="form-control">{{ old('IdentificationMark', $product->IdentificationMark) }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>6 Father's Name</td>
                                            <td><input type="text" name="FathersName" class="form-control" value="{{ old('FathersName', $product->FathersName) }}"></td>
                                            <td>7 Marital Status</td>
                                            <td>
                                                <select name="MaritalStatus" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Married" {{ old('MaritalStatus', $product->MaritalStatus) == 'Married' ? 'selected' : '' }}>Married</option>
                                                    <option value="Unmarried" {{ old('MaritalStatus', $product->MaritalStatus) == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                                                    <option value="Single" {{ old('MaritalStatus', $product->MaritalStatus) == 'Single' ? 'selected' : '' }}>Single</option>
                                                    <option value="NA" {{ old('MaritalStatus', $product->MaritalStatus) == 'NA' ? 'selected' : '' }}>NA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8 Husband's Name</td>
                                            <td><input type="text" name="HusbandsName" class="form-control" value="{{ old('HusbandsName', $product->HusbandsName) }}"></td>
                                            <td>9 Address</td>
                                            <td><textarea name="Address" class="form-control">{{ old('Address', $product->Address) }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>10 Dependent</td>
                                            <td><input type="text" name="Dependent" class="form-control" value="{{ old('Dependent', $product->Dependent) }}"></td>
                                            <td>11 Mobile</td>
                                            <td><input type="text" name="Mobile" class="form-control" pattern="[0-9]{10}" value="{{ old('Mobile', $product->Mobile) }}" required></td>
                                        </tr>
                                        <tr>
                                            <td>12. Joining Date</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <input type="date" name="JoiningDate" class="form-control me-2" value="{{ old('JoiningDate', $product->JoiningDate) }}" {{ $product->JoiningDate ? '' : 'disabled' }}>
                                                    <label class="ms-2">
                                                        <input type="checkbox" name="JoiningDateNA" value="NA" {{ $product->JoiningDate ? '' : 'checked' }}> N/A
                                                    </label>
                                                </div>
                                            </td>
                                            <td>13 Date of Examination</td>
                                            <td><input type="date" name="DateOfExamination" class="form-control" value="{{ old('DateOfExamination', $product->DateOfExamination) }}"></td>
                                        </tr>
                                    </tbody>

                                    {{-- Section 2: Company & Job Details --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">2. Company & Job Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>14 Company</td>
                                            <td><textarea name="Company" class="form-control">{{ old('Company', $product->Company) }}</textarea></td>
                                            <td>15 Department</td>
                                            <td><input type="text" name="Department" class="form-control" value="{{ old('Department', $product->Department) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>16 Designation</td>
                                            <td><input type="text" name="Designation" class="form-control" value="{{ old('Designation', $product->Designation) }}"></td>
                                            <td>17 H/O Habit</td>
                                            <td><textarea name="H_OHabit" class="form-control">{{ old('H_OHabit', $product->H_OHabit) }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>18 Previous Occupational History</td>
                                            <td colspan="3"><textarea name="Prev_Occ_History" class="form-control">{{ old('Prev_Occ_History', $product->Prev_Occ_History) }}</textarea></td>
                                        </tr>
                                    </tbody>

                                    {{-- Section 3: Physical Examination --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">3. Physical Examination</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>19 Temperature</td>
                                            <td><input type="text" name="Temperature" class="form-control" value="{{ old('Temperature', $product->Temperature) }}"></td>
                                            <td>20 Height</td>
                                            <td><input type="text" name="Height" class="form-control" value="{{ old('Height', $product->Height) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>21 Chest Before Breathing</td>
                                            <td><input type="text" name="ChestBeforeBreathing" class="form-control" value="{{ old('ChestBeforeBreathing', $product->ChestBeforeBreathing) }}"></td>
                                            <td>22 Pulse</td>
                                            <td><input type="text" name="Pulse" class="form-control" value="{{ old('Pulse', $product->Pulse) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>23 Weight</td>
                                            <td><input type="text" name="Weight" class="form-control" value="{{ old('Weight', $product->Weight) }}"></td>
                                            <td>24 Chest After Breathing</td>
                                            <td><input type="text" name="ChestAfterBreathing" class="form-control" value="{{ old('ChestAfterBreathing', $product->ChestAfterBreathing) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>25 BP</td>
                                            <td><input type="text" name="BP" class="form-control" value="{{ old('BP', $product->BP) }}"></td>
                                            <td>26 BMI</td>
                                            <td><input type="text" name="BMI" class="form-control" value="{{ old('BMI', $product->BMI) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>27 SpO2</td>
                                            <td><input type="text" name="SpO2" class="form-control" value="{{ old('SpO2', $product->SpO2) }}"></td>
                                            <td>28 Respiration Rate</td>
                                            <td><input type="text" name="RespirationRate" class="form-control" value="{{ old('RespirationRate', $product->RespirationRate) }}"></td>
                                        </tr>
                                    </tbody>

                                    {{-- Section 4: Vision --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">4. Vision</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>29 Right Eye Specs</td>
                                            <td><input type="text" name="RightEyeSpecs" class="form-control" value="{{ old('RightEyeSpecs', $product->RightEyeSpecs ?? 'Normal') }}"></td>
                                            <td>30 Left Eye Specs</td>
                                            <td><input type="text" name="LeftEyeSpecs" class="form-control" value="{{ old('LeftEyeSpecs', $product->LeftEyeSpecs ?? 'Normal') }}"></td>
                                        </tr>
                                        <tr>
                                            <td>31 Near Vision Right</td>
                                            <td><input type="text" name="NearVisionRight" class="form-control" value="{{ old('NearVisionRight', $product->NearVisionRight ?? 'N/6') }}"></td>
                                            <td>32 Near Vision Left</td>
                                            <td><input type="text" name="NearVisionLeft" class="form-control" value="{{ old('NearVisionLeft', $product->NearVisionLeft ?? 'N/6') }}"></td>
                                        </tr>
                                        <tr>
                                            <td>33 Distant Vision Right</td>
                                            <td><input type="text" name="DistantVisionRight" class="form-control" value="{{ old('DistantVisionRight', $product->DistantVisionRight ?? '6/6') }}"></td>
                                            <td>34 Distant Vision Left</td>
                                            <td><input type="text" name="DistantVisionLeft" class="form-control" value="{{ old('DistantVisionLeft', $product->DistantVisionLeft ?? '6/6') }}"></td>
                                        </tr>
                                        <tr>
                                            <td>35 Colour Vision</td>
                                            <td colspan="3"><input type="text" name="ColourVision" class="form-control" value="{{ old('ColourVision', $product->ColourVision ?? 'Normal') }}"></td>
                                        </tr>
                                    </tbody>

                                    {{-- Sections 5 to 10 follow the same pattern --}}
                                    {{-- Each input uses old('field', $product->field) or default value if necessary --}}

                                    {{-- Example for Family History --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">6. Family History</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['Father', 'Mother', 'Brother', 'Sister'] as $index => $field)
                                            <tr>
                                                <td>{{ 6.1 + $index }} {{ $field }}</td>
                                                <td><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field, $product->$field) }}"></td>
                                                <td colspan="2"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- Lab Investigations --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">7. Lab Investigations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['HB','TC','DC','RBC','Platelet','ESR','FBS','PP2BS','SGPT','SCreatintine','RBS','SChol','STRG','SHDL','SLDL','CHRatio'] as $index => $field)
                                            <tr>
                                                <td>{{ 7.1 + $index }} {{ $field }}</td>
                                                <td><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field, $product->$field) }}"></td>
                                                <td colspan="2"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- Urine Analysis --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">8. Urine Analysis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['UrineColour','UrineReaction','UrineAlbumin','UrineSugar','UrinePusCell','UrineRBC','UrineEpiCell','UrineCrystal'] as $index => $field)
                                            <tr>
                                                <td>{{ 8.1 + $index }} {{ $field }}</td>
                                                <td><input type="text" name="{{ $field }}" class="form-control" value="{{ old($field, $product->$field) }}"></td>
                                                <td colspan="2"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- Doctor & Remarks --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">9. Doctor & Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>9.1 Name of Doctor</td>
                                            <td><input type="text" name="NameOfDoctor" class="form-control" value="{{ old('NameOfDoctor', $product->NameOfDoctor) }}"></td>
                                            <td>9.2 Doctor Signature</td>
                                            <td><input type="text" name="DoctorSignature" class="form-control" value="{{ old('DoctorSignature', $product->DoctorSignature) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>9.3 Reviewed By</td>
                                            <td><input type="text" name="ReviewedBy" class="form-control" value="{{ old('ReviewedBy', $product->ReviewedBy) }}"></td>
                                            <td>9.4 Doctors Remarks</td>
                                            <td><textarea name="DoctorsRemarks" class="form-control">{{ old('DoctorsRemarks', $product->DoctorsRemarks) }}</textarea></td>
                                        </tr>
                                    </tbody>

                                    {{-- Hazardous & Dangerous Info --}}
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">10. Hazardous & Dangerous Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(['Hazardous','Dangerousproc','Rawmaterials','JobRestriction'] as $index => $field)
                                            <tr>
                                                <td>{{ 10.1 + $index }} {{ $field }}</td>
                                                <td colspan="3"><textarea name="{{ $field }}" class="form-control">{{ old($field, $product->$field) }}</textarea></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">
                                                    <i class="fa fa-floppy-o"></i> Update
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                            {{-- Form End --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Scroll Up --}}
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.querySelector('input[name="JoiningDate"]');
            const naCheckbox = document.querySelector('input[name="JoiningDateNA"]');

            if (naCheckbox.checked) {
                dateInput.disabled = true;
                dateInput.value = '';
            }

            dateInput.addEventListener('change', function () {
                if (this.value) {
                    naCheckbox.checked = false;
                    dateInput.disabled = false;
                }
            });

            naCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    dateInput.value = '';
                    dateInput.disabled = true;
                } else {
                    dateInput.disabled = false;
                }
            });
        });
    </script>
</body>

</html>
