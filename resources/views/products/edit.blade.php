<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Edit Product')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
    @stack('styles')
</head>

<body class="no-skin">

    @include('layouts.partials.header')

    <div class="main-container ace-save-state" id="main-container">

        @include('layouts.partials.sidebar')

        <div class="main-content">
            <div class="main-content-inner">

                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li><a href="#">Employee Health Record</a></li>
                        <li class="active">Edit Product</li>
                    </ul>
                </div>

                <div class="page-content">

                    <div class="page-header">
                        <h1>
                            Employee Health Record
                            <small><i class="ace-icon fa fa-angle-double-right"></i> Edit Health Record</small>
                            <a class="btn btn-primary btn-sm pull-right" href="{{ route('products.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">

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

                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <table class="table table-bordered table-striped">

                                    {{-- SECTION 1 EMPLOYEE INFO --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">1. Employee Information</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1 Employee No</td>
                                            <td><input type="text" name="EmployeeNo" class="form-control"
                                                    value="{{ old('EmployeeNo', $product->EmployeeNo) }}"></td>
                                            <td>2 Employee Name</td>
                                            <td><input type="text" name="EmployeeName" class="form-control"
                                                    value="{{ old('EmployeeName', $product->EmployeeName) }}"></td>
                                        </tr>

                                        <tr>
                                            <td>3 Date of Birth</td>
                                            <td><input type="date" name="DateOfBirth" class="form-control"
                                                    value="{{ old('DateOfBirth', $product->DateOfBirth) }}"></td>
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
                                            <td colspan="3">
                                                <textarea name="IdentificationMark" class="form-control">{{ old('IdentificationMark', $product->IdentificationMark) }}</textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>6 Father's Name</td>
                                            <td><input type="text" name="FathersName" class="form-control"
                                                    value="{{ old('FathersName', $product->FathersName) }}"></td>
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
                                            <td><input type="text" name="HusbandsName" class="form-control"
                                                    value="{{ old('HusbandsName', $product->HusbandsName) }}"></td>
                                            <td>9 Address</td>
                                            <td><textarea name="Address" class="form-control">{{ old('Address', $product->Address) }}</textarea></td>
                                        </tr>

                                        <tr>
                                            <td>10 Dependent</td>
                                            <td><input type="text" name="Dependent" class="form-control"
                                                    value="{{ old('Dependent', $product->Dependent) }}"></td>
                                            <td>11 Mobile</td>
                                            <td><input type="text" name="Mobile" class="form-control"
                                                    value="{{ old('Mobile', $product->Mobile) }}"></td>
                                        </tr>

                                        <tr>
                                            <td>12 Joining Date</td>
                                            <td>
                                                <input type="date" name="JoiningDate" class="form-control"
                                                       value="{{ old('JoiningDate', $product->JoiningDate) }}">
                                            </td>

                                            <td>13 Date of Examination</td>
                                            <td><input type="date" name="DateOfExamination" class="form-control"
                                                    value="{{ old('DateOfExamination', $product->DateOfExamination) }}"></td>
                                        </tr>
                                    </tbody>

                                    {{-- SECTION 2 --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">2. Company & Job Details</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>14 Company</td>
                                            <td><textarea name="Company" class="form-control">{{ old('Company', $product->Company) }}</textarea></td>
                                            <td>15 Department</td>
                                            <td><input type="text" name="Department" class="form-control"
                                                    value="{{ old('Department', $product->Department) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>16 Designation</td>
                                            <td><input type="text" name="Designation" class="form-control"
                                                    value="{{ old('Designation', $product->Designation) }}"></td>
                                            <td>17 H/O Habit</td>
                                            <td><textarea name="H_OHabit" class="form-control">{{ old('H_OHabit', $product->H_OHabit) }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>18 Previous Occupational History</td>
                                            <td colspan="3"><textarea name="Prev_Occ_History"
                                                    class="form-control">{{ old('Prev_Occ_History', $product->Prev_Occ_History) }}</textarea></td>
                                        </tr>
                                    </tbody>

                                    {{-- SECTION 3 --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">3. Physical Examination</th></tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $physicalFields = [
                                                'Temperature','Height','ChestBeforeBreathing','Pulse','Weight',
                                                'ChestAfterBreathing','BP','BMI','SpO2','RespirationRate'
                                            ];
                                        @endphp

                                        @foreach($physicalFields as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 4 – VISION --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">4. Vision</th></tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $visionFields = [
                                                'RightEyeSpecs','LeftEyeSpecs','NearVisionRight','NearVisionLeft',
                                                'DistantVisionRight','DistantVisionLeft','ColourVision'
                                            ];
                                        @endphp

                                        @foreach($visionFields as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 5 ENT + Clinical + Medical + Systemic --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">5. ENT & Systemic Examination</th></tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $allFields = [
                                                // General Exam
                                                'Eye','Nose','Conjunctiva','Ear','Tongue','Nails','Throat','Skin','Teeth','PEFR',
                                                // Clinical
                                                'Eczema','Cyanosis','Jaundice','Anaemia','Oedema','Clubbing','Allergy','Lymphnode',
                                                // Medical
                                                'KnownHypertension','Diabetes','Dyslipidemia','RadiationEffect','Vertigo','Tuberculosis',
                                                'ThyroidDisorder','Epilepsy','Br_Asthma','HeartDisease','PresentComplain',
                                                // Systemic
                                                'RespirationSystem','GenitoUrinary','CVS','CNS','PerAbdomen','ENT'
                                            ];
                                        @endphp

                                        @foreach($allFields as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 6 Investigations --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">6. Investigations</th></tr>
                                    </thead>

                                    <tbody>
                                        @foreach(['PFT','XRayChest','VertigoTest','Audiometry','ECG'] as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 7 – FAMILY HISTORY --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">7. Family History</th></tr>
                                    </thead>

                                    <tbody>
                                        @foreach(['Father','Mother','Brother','Sister'] as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 8 – LAB --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">8. Lab Investigations</th></tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $labs = ['HB','WBC','Paasite','RBC','Platelet','ESR','FBS','PP2BS','SGPT','SCreatintine','RBS','SChol','STRG','SHDL','SLDL','CHRatio'];
                                        @endphp
                                        @foreach($labs as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 9 – Urine --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">9. Urine Analysis</th></tr>
                                    </thead>

                                    <tbody>
                                        @foreach(['UrineColour','UrineReaction','UrineAlbumin','UrineSugar','UrinePusCell','UrineRBC','UrineEpiCell','UrineCrystal'] as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <input type="text" name="{{ $field }}" class="form-control"
                                                           value="{{ old($field, $product->$field) }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    {{-- SECTION 10 – Doctor --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">10. Doctor & Remarks</th></tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Name of Doctor</td>
                                            <td><input type="text" name="NameOfDoctor" class="form-control"
                                                    value="{{ old('NameOfDoctor', $product->NameOfDoctor) }}"></td>
                                            <td>Doctor Signature</td>
                                            <td><input type="text" name="DoctorSignature" class="form-control"
                                                    value="{{ old('DoctorSignature', $product->DoctorSignature) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Reviewed By</td>
                                            <td><input type="text" name="ReviewedBy" class="form-control"
                                                    value="{{ old('ReviewedBy', $product->ReviewedBy) }}"></td>
                                            <td>Doctor’s Remarks</td>
                                            <td><textarea name="DoctorsRemarks"
                                                    class="form-control">{{ old('DoctorsRemarks', $product->DoctorsRemarks) }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Health Status</td>
                                            <td colspan="3">
                                                <input type="text" name="HealthStatus" class="form-control"
                                                       value="{{ old('HealthStatus', $product->HealthStatus) }}">
                                            </td>
                                        </tr>
                                    </tbody>

                                    {{-- SECTION 11 – HAZARDOUS --}}
                                    <thead class="thead-dark">
                                        <tr><th colspan="4">11. Hazardous & Dangerous Info</th></tr>
                                    </thead>

                                    <tbody>
                                        @foreach(['Hazardous','Dangerousproc','Rawmaterials','JobRestriction'] as $field)
                                            <tr>
                                                <td>{{ $field }}</td>
                                                <td colspan="3">
                                                    <textarea name="{{ $field }}" class="form-control">{{ old($field, $product->$field) }}</textarea>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">
                                                    <i class="fa fa-save"></i> Update
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>

    </div>

    @include('layouts.partials.footer')

    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>

</body>
</html>
