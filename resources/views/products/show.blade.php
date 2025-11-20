<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'View Employee Health Record')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
    @stack('styles')

    {{-- PRINT CSS FIXED --}}
    <style>
        @media print {

            /* Hide unnecessary layout parts */
            #sidebar,
            #navbar,
            .breadcrumbs,
            .btn,
            #btn-scroll-up,
            .page-header a.btn,
            .ace-save-state {
                display: none !important;
                visibility: hidden !important;
            }

            /* Allow page content to print fully */
            body * {
                visibility: visible !important;
            }

            /* Print only main content */
            .main-content {
                position: absolute !important;
                left: 0 !important;
                top: 0 !important;
                padding: 0 !important;
                margin: 0 !important;
                width: 100% !important;
            }

            .main-content * {
                visibility: visible !important;
            }

            /* Table formatting for printing */
            table {
                width: 100% !important;
                border-collapse: collapse !important;
                font-size: 12px !important;
            }

            th,
            td {
                border: 1px solid #000 !important;
                padding: 6px !important;
            }

            thead.thead-dark th {
                background: #ddd !important;
                color: #000 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>

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
                        <li><a href="#">Employee Health Record</a></li>
                        <li class="active">View Record</li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Employee Health Record
                            <small><i class="ace-icon fa fa-angle-double-right"></i> View Health Record</small>

                            {{-- PRINT BUTTON --}}
                            <button class="btn btn-success btn-sm pull-right"
                                style="margin-right:10px;"
                                onclick="window.print()">
                                <i class="fa fa-print"></i> Print
                            </button>

                            {{-- BACK BUTTON --}}
                            <a class="btn btn-primary btn-sm pull-right"
                                href="{{ route('products.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">

                            {{-- ============================================= --}}
                            {{--          FULL HEALTH RECORD TABLE             --}}
                            {{-- ============================================= --}}

                            <table class="table table-bordered table-striped">

                                {{-- Section 1: Employee Information --}}
                                <thead class="thead-dark">
                                    <tr><th colspan="4">1. Employee Information</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>1 Employee No</td><td>{{ $product->EmployeeNo }}</td><td>2 Employee Name</td><td>{{ $product->EmployeeName }}</td></tr>
                                    <tr><td>3 Date of Birth</td><td>{{ $product->DateOfBirth }}</td><td>4 Sex</td><td>{{ ucfirst($product->Sex) }}</td></tr>
                                    <tr><td>5 Identification Mark</td><td colspan="3">{{ $product->IdentificationMark }}</td></tr>
                                    <tr><td>6 Father's Name</td><td>{{ $product->FathersName }}</td><td>7 Marital Status</td><td>{{ $product->MaritalStatus }}</td></tr>
                                    <tr><td>8 Husband's Name</td><td>{{ $product->HusbandsName }}</td><td>9 Address</td><td>{{ $product->Address }}</td></tr>
                                    <tr><td>10 Dependent</td><td>{{ $product->Dependent }}</td><td>11 Mobile</td><td>{{ $product->Mobile }}</td></tr>
                                    <tr><td>12 Joining Date</td><td>{{ $product->JoiningDate ?? 'N/A' }}</td><td>13 Date of Examination</td><td>{{ $product->DateOfExamination }}</td></tr>
                                </tbody>

                                {{-- Section 2: Company & Job Details --}}
                                <thead class="thead-dark">
                                    <tr><th colspan="4">2. Company & Job Details</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>14 Company</td><td>{{ $product->Company }}</td><td>15 Department</td><td>{{ $product->Department }}</td></tr>
                                    <tr><td>16 Designation</td><td>{{ $product->Designation }}</td><td>17 H/O Habit</td><td>{{ $product->H_OHabit }}</td></tr>
                                    <tr><td>18 Previous Occupational History</td><td colspan="3">{{ $product->Prev_Occ_History }}</td></tr>
                                </tbody>

                                {{-- Section 3: Physical Examination --}}
                                <thead class="thead-dark">
                                    <tr><th colspan="4">3. Physical Examination</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>19 Temperature</td><td>{{ $product->Temperature }}</td><td>20 Height</td><td>{{ $product->Height }}</td></tr>
                                    <tr><td>21 Chest Before Breathing</td><td>{{ $product->ChestBeforeBreathing }}</td><td>22 Pulse</td><td>{{ $product->Pulse }}</td></tr>
                                    <tr><td>23 Weight</td><td>{{ $product->Weight }}</td><td>24 Chest After Breathing</td><td>{{ $product->ChestAfterBreathing }}</td></tr>
                                    <tr><td>25 BP</td><td>{{ $product->BP }}</td><td>26 BMI</td><td>{{ $product->BMI }}</td></tr>
                                    <tr><td>27 SpO2</td><td>{{ $product->SpO2 }}</td><td>28 Respiration Rate</td><td>{{ $product->RespirationRate }}</td></tr>
                                </tbody>

                                {{-- Section 4: Vision --}}
                                <thead class="thead-dark">
                                    <tr><th colspan="4">4. Vision</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>29 Right Eye Specs</td><td>{{ $product->RightEyeSpecs }}</td><td>30 Left Eye Specs</td><td>{{ $product->LeftEyeSpecs }}</td></tr>
                                    <tr><td>31 Near Vision Right</td><td>{{ $product->NearVisionRight }}</td><td>32 Near Vision Left</td><td>{{ $product->NearVisionLeft }}</td></tr>
                                    <tr><td>33 Distant Vision Right</td><td>{{ $product->DistantVisionRight }}</td><td>34 Distant Vision Left</td><td>{{ $product->DistantVisionLeft }}</td></tr>
                                    <tr><td>35 Colour Vision</td><td colspan="3">{{ $product->ColourVision }}</td></tr>
                                </tbody>

                                {{-- Section 5: ENT & Systemic Examination --}}
                                <thead class="thead-dark">
                                    <tr><th colspan="4">5. ENT & Systemic Examination</th></tr>
                                </thead>
                                <tbody>

                                    {{-- 5. General Examination --}}
                                    <tr class="table-primary"><td colspan="3"><strong>5. General Examination</strong></td></tr>
                                    @foreach(['Eye','Nose','Conjunctiva','Ear','Tongue','Nails','Throat','Skin','Teeth','PEFR'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach

                                    {{-- 6. Clinical Signs --}}
                                    <tr class="table-primary"><td colspan="3"><strong>6. Clinical Signs</strong></td></tr>
                                    @foreach(['Eczema','Cyanosis','Jaundice','Anaemia','Oedema','Clubbing','Allergy','Lymphnode'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach

                                    {{-- 7. Medical History --}}
                                    <tr class="table-primary"><td colspan="3"><strong>7. Medical History</strong></td></tr>
                                    @foreach(['KnownHypertension','Diabetes','Dyslipidemia','RadiationEffect','Vertigo','Tuberculosis','ThyroidDisorder','Epilepsy','Br_Asthma','HeartDisease','PresentComplain'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach

                                    {{-- 8. Systemic Examination --}}
                                    <tr class="table-primary"><td colspan="3"><strong>8. Systemic Examination</strong></td></tr>
                                    @foreach(['RespirationSystem','GenitoUrinary','CVS','CNS','PerAbdomen','ENT'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach

                                    {{-- 9. Investigations --}}
                                    <tr class="table-primary"><td colspan="3"><strong>9. Investigations</strong></td></tr>
                                    @foreach(['PFT','XRayChest','VertigoTest','Audiometry','ECG'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach

                                </tbody>

                                {{-- Section 6: Family History --}}
                                <thead class="thead-dark">
                                    <tr><th colspan="4">6. Family History</th></tr>
                                </thead>
                                <tbody>
                                    @foreach(['Father','Mother','Brother','Sister'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach
                                </tbody>

                                {{-- Section 7: Lab Investigations --}}
                                <thead class="thead-dark"><tr><th colspan="4">7. Lab Investigations</th></tr></thead>
                                <tbody>
                                    @foreach(['HB','WBC','Paasite','RBC','Platelet','ESR','FBS','PP2BS','SGPT','SCreatintine','RBS','SChol','STRG','SHDL','SLDL','CHRatio'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach
                                </tbody>

                                {{-- Section 8: Urine Analysis --}}
                                <thead class="thead-dark"><tr><th colspan="4">8. Urine Analysis</th></tr></thead>
                                <tbody>
                                    @foreach(['UrineColour','UrineReaction','UrineAlbumin','UrineSugar','UrinePusCell','UrineRBC','UrineEpiCell','UrineCrystal'] as $field)
                                        <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
                                    @endforeach
                                </tbody>

                                {{-- Section 9: Doctor & Remarks --}}
                                <thead class="thead-dark"><tr><th colspan="4">9. Doctor & Remarks</th></tr></thead>
                                <tbody>
                                    <tr><td>9.1 Name of Doctor</td><td>{{ $product->NameOfDoctor }}</td><td>9.2 Doctor Signature</td><td>{{ $product->DoctorSignature }}</td></tr>
                                    <tr><td>9.3 Reviewed By</td><td>{{ $product->ReviewedBy }}</td><td>9.4 Doctors Remarks</td><td>{{ $product->DoctorsRemarks }}</td></tr>
                                    <tr><td>9.5 Health Status</td><td>{{ $product->HealthStatus }}</td></tr>
                                </tbody>

                                {{-- Section 10: Hazardous --}}
                                <thead class="thead-dark"><tr><th colspan="4">10. Hazardous & Dangerous Info</th></tr></thead>
                                <tbody>
                                    @foreach(['Hazardous','Dangerousproc','Rawmaterials','JobRestriction'] as $field)
                                        <tr><td>{{ $field }}</td><td colspan="3">{{ $product->$field }}</td></tr>
                                    @endforeach
                                </tbody>

                            </table>

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
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>

</body>

</html>
