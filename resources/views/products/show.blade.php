<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Show Health Record')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />

    <style>
        .section-box {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            background: #fafafa;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            padding: 6px 12px;
            background: #e8e8e8;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .details-label {
            font-weight: bold;
            margin-top: 8px;
        }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="no-skin">

@include('layouts.partials.header')

<div class="main-container ace-save-state" id="main-container">

@include('layouts.partials.sidebar')

<div class="main-content">
    <div class="main-content-inner">

        <div class="breadcrumbs ace-save-state no-print" id="breadcrumbs">
            <ul class="breadcrumb">
                <li><i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a></li>
                <li><a href="#">Health Management</a></li>
                <li class="active">Show Health Record</li>
            </ul>
        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    Health Record
                    <small><i class="ace-icon fa fa-angle-double-right"></i> Details</small>
                </h1>

                <div class="pull-right no-print" style="margin-top:-30px;">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
                        <i class="ace-icon fa fa-arrow-left bigger-110"></i> Back
                    </a>

                    <button onclick="window.print()" class="btn btn-success btn-sm">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>

            <div class="row">
            <div class="col-xs-12">

                <!-- EMPLOYEE INFORMATION -->
                <div class="section-box">
                    <div class="section-title">Employee Information</div>

                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Employee No:</label> {{ $product->employee_no }}</div>
                        <div class="col-sm-6"><label class="details-label">Date of Examination:</label> {{ $product->date_of_examination }}</div>

                        <div class="col-sm-6"><label class="details-label">Name of Employee:</label> {{ $product->employee_name }}</div>
                        <div class="col-sm-6"><label class="details-label">Father's Name:</label> {{ $product->father_name }}</div>

                        <div class="col-sm-6"><label class="details-label">Date of Birth / Age:</label> {{ $product->dob }}</div>
                        <div class="col-sm-6"><label class="details-label">Address:</label> {{ $product->address }}</div>

                        <div class="col-sm-6"><label class="details-label">Designation:</label> {{ $product->designation }}</div>
                        <div class="col-sm-6"><label class="details-label">Husband's Name:</label> {{ $product->husband_name }}</div>

                        <div class="col-sm-6"><label class="details-label">Department:</label> {{ $product->department }}</div>
                        <div class="col-sm-6"><label class="details-label">Marital Status:</label> {{ $product->marital_status }}</div>

                        <div class="col-sm-6"><label class="details-label">Joining Date:</label> {{ $product->joining_date }}</div>
                        <div class="col-sm-6"><label class="details-label">Dependents:</label> {{ $product->dependents }}</div>

                        <div class="col-sm-6"><label class="details-label">Identification Mark:</label> {{ $product->identification_mark }}</div>
                        <div class="col-sm-6"><label class="details-label">H/O Habit:</label> {{ $product->habit }}</div>

                        <div class="col-sm-6"><label class="details-label">Company:</label> {{ $product->company }}</div>
                        <div class="col-sm-6"><label class="details-label">Mobile Number:</label> {{ $product->mobile }}</div>

                        <div class="col-sm-12"><label class="details-label">Prev. Occ. History:</label> {{ $product->prev_occ_history }}</div>
                    </div>
                </div>

                <!-- PHYSICAL EXAMINATION -->
                <div class="section-box">
                    <div class="section-title">Physical Examination</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Temperature:</label> {{ $product->temperature }}</div>
                        <div class="col-sm-6"><label class="details-label">Pulse:</label> {{ $product->pulse }}</div>

                        <div class="col-sm-6"><label class="details-label">BP:</label> {{ $product->bp }}</div>
                        <div class="col-sm-6"><label class="details-label">Height:</label> {{ $product->height }}</div>

                        <div class="col-sm-6"><label class="details-label">Weight:</label> {{ $product->weight }}</div>
                        <div class="col-sm-6"><label class="details-label">BMI:</label> {{ $product->bmi }}</div>

                        <div class="col-sm-6"><label class="details-label">SpO2:</label> {{ $product->spo2 }}</div>
                        <div class="col-sm-6"><label class="details-label">Respiration Rate:</label> {{ $product->respiration_rate }}</div>

                        <div class="col-sm-6"><label class="details-label">Chest Before Breathing:</label> {{ $product->chest_before }}</div>
                        <div class="col-sm-6"><label class="details-label">Chest After Breathing:</label> {{ $product->chest_after }}</div>
                    </div>
                </div>

                <!-- VISION -->
                <div class="section-box">
                    <div class="section-title">Vision</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Right Eye (Specs):</label> {{ $product->right_eye_specs }}</div>
                        <div class="col-sm-6"><label class="details-label">Left Eye (Specs):</label> {{ $product->left_eye_specs }}</div>

                        <div class="col-sm-6"><label class="details-label">Near Vision (Right):</label> {{ $product->near_vision_right }}</div>
                        <div class="col-sm-6"><label class="details-label">Near Vision (Left):</label> {{ $product->near_vision_left }}</div>

                        <div class="col-sm-6"><label class="details-label">Distant Vision (Right):</label> {{ $product->distant_vision_right }}</div>
                        <div class="col-sm-6"><label class="details-label">Distant Vision (Left):</label> {{ $product->distant_vision_left }}</div>

                        <div class="col-sm-6"><label class="details-label">Colour Vision:</label> {{ $product->color_vision }}</div>
                    </div>
                </div>

                <!-- LOCAL EXAMINATION -->
                <div class="section-box">
                    <div class="section-title">Local Examination</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Eye:</label> {{ $product->eye }}</div>
                        <div class="col-sm-6"><label class="details-label">Nose:</label> {{ $product->nose }}</div>

                        <div class="col-sm-6"><label class="details-label">Ear:</label> {{ $product->ear }}</div>
                        <div class="col-sm-6"><label class="details-label">Conjunctiva:</label> {{ $product->conjunctiva }}</div>

                        <div class="col-sm-6"><label class="details-label">Tongue:</label> {{ $product->tongue }}</div>
                        <div class="col-sm-6"><label class="details-label">Nails:</label> {{ $product->nails }}</div>

                        <div class="col-sm-6"><label class="details-label">Throat:</label> {{ $product->throat }}</div>
                        <div class="col-sm-6"><label class="details-label">Skin:</label> {{ $product->skin }}</div>

                        <div class="col-sm-6"><label class="details-label">Teeth:</label> {{ $product->teeth }}</div>
                        <div class="col-sm-6"><label class="details-label">PEFR:</label> {{ $product->pefr }}</div>

                        <div class="col-sm-6"><label class="details-label">Eczema:</label> {{ $product->eczema }}</div>
                        <div class="col-sm-6"><label class="details-label">Cyanosis:</label> {{ $product->cyanosis }}</div>

                        <div class="col-sm-6"><label class="details-label">Jaundice:</label> {{ $product->jaundice }}</div>
                        <div class="col-sm-6"><label class="details-label">Anaemia:</label> {{ $product->anaemia }}</div>

                        <div class="col-sm-6"><label class="details-label">Oedema:</label> {{ $product->oedema }}</div>
                        <div class="col-sm-6"><label class="details-label">Clubbing:</label> {{ $product->clubbing }}</div>

                        <div class="col-sm-6"><label class="details-label">Allergy:</label> {{ $product->allergy }}</div>
                    </div>
                </div>

                <!-- MEDICAL HISTORY -->
                <div class="section-box">
                    <div class="section-title">Medical History Examination</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Hypertension:</label> {{ $product->hypertension }}</div>
                        <div class="col-sm-6"><label class="details-label">Diabetes:</label> {{ $product->diabetes }}</div>

                        <div class="col-sm-6"><label class="details-label">Dyslipidemia:</label> {{ $product->dyslipidemia }}</div>
                        <div class="col-sm-6"><label class="details-label">Radiation Effect:</label> {{ $product->radiation_effect }}</div>

                        <div class="col-sm-6"><label class="details-label">Vertigo:</label> {{ $product->vertigo }}</div>
                        <div class="col-sm-6"><label class="details-label">Tuberculosis:</label> {{ $product->tuberculosis }}</div>

                        <div class="col-sm-6"><label class="details-label">Thyroid Disorder:</label> {{ $product->thyroid_disorder }}</div>
                        <div class="col-sm-6"><label class="details-label">Epilepsy:</label> {{ $product->epilepsy }}</div>

                        <div class="col-sm-6"><label class="details-label">Br Asthma:</label> {{ $product->br_asthma }}</div>
                        <div class="col-sm-6"><label class="details-label">Heart Disease:</label> {{ $product->heart_disease }}</div>
                    </div>
                </div>

                <!-- SYSTEMIC EXAMINATION -->
                <div class="section-box">
                    <div class="section-title">Systemic Examination</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Respiration System:</label> {{ $product->respiration_system }}</div>
                        <div class="col-sm-6"><label class="details-label">Genito Urinary:</label> {{ $product->genito_urinary }}</div>

                        <div class="col-sm-6"><label class="details-label">CVS:</label> {{ $product->cvs }}</div>
                        <div class="col-sm-6"><label class="details-label">CNS:</label> {{ $product->cns }}</div>

                        <div class="col-sm-6"><label class="details-label">Per Abdomen:</label> {{ $product->per_abdomen }}</div>
                        <div class="col-sm-6"><label class="details-label">ENT:</label> {{ $product->ent }}</div>
                    </div>
                </div>

                <!-- INVESTIGATION -->
                <div class="section-box">
                    <div class="section-title">Investigation</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">PFT:</label> {{ $product->pft }}</div>
                        <div class="col-sm-6"><label class="details-label">X-Ray Chest:</label> {{ $product->xray_chest }}</div>

                        <div class="col-sm-6"><label class="details-label">Vertigo Test:</label> {{ $product->vertigo_test }}</div>
                        <div class="col-sm-6"><label class="details-label">Audiometry:</label> {{ $product->audiometry }}</div>

                        <div class="col-sm-6"><label class="details-label">ECG:</label> {{ $product->ecg }}</div>
                    </div>
                </div>

                <!-- LABORATORY TESTS -->
                <div class="section-box">
                    <div class="section-title">Laboratory Tests</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">HB:</label> {{ $product->hb }}</div>
                        <div class="col-sm-6"><label class="details-label">WBC:</label> {{ $product->wbc }}</div>

                        <div class="col-sm-6"><label class="details-label">Parasite:</label> {{ $product->parasite }}</div>
                        <div class="col-sm-6"><label class="details-label">RBC:</label> {{ $product->rbc }}</div>

                        <div class="col-sm-6"><label class="details-label">Platelet:</label> {{ $product->platelet }}</div>
                        <div class="col-sm-6"><label class="details-label">ESR:</label> {{ $product->esr }}</div>

                        <div class="col-sm-6"><label class="details-label">FBS:</label> {{ $product->fbs }}</div>
                        <div class="col-sm-6"><label class="details-label">PP2BS:</label> {{ $product->pp2bs }}</div>

                        <div class="col-sm-6"><label class="details-label">SGPT:</label> {{ $product->sgpt }}</div>
                        <div class="col-sm-6"><label class="details-label">Creatinine:</label> {{ $product->creatinine }}</div>

                        <div class="col-sm-6"><label class="details-label">RBS:</label> {{ $product->rbs }}</div>
                        <div class="col-sm-6"><label class="details-label">Cholesterol:</label> {{ $product->cholesterol }}</div>

                        <div class="col-sm-6"><label class="details-label">TRG:</label> {{ $product->trg }}</div>
                        <div class="col-sm-6"><label class="details-label">HDL:</label> {{ $product->hdl }}</div>

                        <div class="col-sm-6"><label class="details-label">LDL:</label> {{ $product->ldl }}</div>
                        <div class="col-sm-6"><label class="details-label">C/H Ratio:</label> {{ $product->ch_ratio }}</div>
                    </div>
                </div>

                <!-- URINE REPORT -->
                <div class="section-box">
                    <div class="section-title">Urine Report</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Colour:</label> {{ $product->urine_color }}</div>
                        <div class="col-sm-6"><label class="details-label">Reaction:</label> {{ $product->urine_reaction }}</div>

                        <div class="col-sm-6"><label class="details-label">Albumin:</label> {{ $product->urine_albumin }}</div>
                        <div class="col-sm-6"><label class="details-label">Sugar:</label> {{ $product->urine_sugar }}</div>

                        <div class="col-sm-6"><label class="details-label">Pus Cell:</label> {{ $product->urine_puscell }}</div>
                        <div class="col-sm-6"><label class="details-label">Urine RBC:</label> {{ $product->urine_rbc }}</div>

                        <div class="col-sm-6"><label class="details-label">Epi Cell:</label> {{ $product->urine_epicell }}</div>
                        <div class="col-sm-6"><label class="details-label">Crystal:</label> {{ $product->urine_crystal }}</div>
                    </div>
                </div>

                <!-- DOCTOR DETAILS -->
                <div class="section-box">
                    <div class="section-title">Doctor Details</div>
                    <div class="row">
                        <div class="col-sm-6"><label class="details-label">Health Status:</label> {{ $product->health_status }}</div>
                        <div class="col-sm-6"><label class="details-label">Doctor Name:</label> {{ $product->doctor_name }}</div>

                        <div class="col-sm-6"><label class="details-label">Doctor Signature:</label> {{ $product->doctor_signature }}</div>
                        <div class="col-sm-6"><label class="details-label">Seal of Doctor:</label> {{ $product->doctor_seal }}</div>

                        <div class="col-sm-6"><label class="details-label">Job Restriction:</label> {{ $product->job_restriction }}</div>
                        <div class="col-sm-6"><label class="details-label">Reviewed By:</label> {{ $product->reviewed_by }}</div>

                        <div class="col-sm-12"><label class="details-label">Doctor Remarks:</label> {{ $product->doctor_remarks }}</div>
                    </div>
                </div>

            </div>
            </div>

        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse no-print">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>

</div>

@include('layouts.partials.footer')

<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript">
if ('ontouchstart' in document.documentElement)
    document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
</script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

</body>
</html>
