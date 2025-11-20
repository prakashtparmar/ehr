<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Employee Health Record</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        thead th {
            background: #e0e0e0;
            font-weight: bold;
            font-size: 13px;
            text-align: left;
        }

        .section-title {
            background: #d0d0d0;
            font-weight: bold;
            font-size: 13px;
            padding: 6px;
        }

        .sub-title {
            background: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Employee Health Record</h2>

    {{-- SECTION 1 --}}
    <table>
        <thead>
            <tr><th colspan="4">1. Employee Information</th></tr>
        </thead>

        <tbody>
            <tr><td>Employee No</td><td>{{ $product->EmployeeNo }}</td><td>Employee Name</td><td>{{ $product->EmployeeName }}</td></tr>
            <tr><td>Date Of Birth</td><td>{{ $product->DateOfBirth }}</td><td>Sex</td><td>{{ ucfirst($product->Sex) }}</td></tr>
            <tr><td>Identification Mark</td><td colspan="3">{{ $product->IdentificationMark }}</td></tr>
            <tr><td>Father's Name</td><td>{{ $product->FathersName }}</td><td>Marital Status</td><td>{{ $product->MaritalStatus }}</td></tr>
            <tr><td>Husband's Name</td><td>{{ $product->HusbandsName }}</td><td>Address</td><td>{{ $product->Address }}</td></tr>
            <tr><td>Dependent</td><td>{{ $product->Dependent }}</td><td>Mobile</td><td>{{ $product->Mobile }}</td></tr>
            <tr><td>Joining Date</td><td>{{ $product->JoiningDate }}</td><td>Date Of Examination</td><td>{{ $product->DateOfExamination }}</td></tr>
        </tbody>
    </table>

    {{-- SECTION 2 --}}
    <table>
        <thead>
            <tr><th colspan="4">2. Company & Job Details</th></tr>
        </thead>

        <tbody>
            <tr><td>Company</td><td>{{ $product->Company }}</td><td>Department</td><td>{{ $product->Department }}</td></tr>
            <tr><td>Designation</td><td>{{ $product->Designation }}</td><td>H/O Habit</td><td>{{ $product->H_OHabit }}</td></tr>
            <tr><td>Previous Occupational History</td><td colspan="3">{{ $product->Prev_Occ_History }}</td></tr>
        </tbody>
    </table>

    {{-- SECTION 3 --}}
    <table>
        <thead>
            <tr><th colspan="4">3. Physical Examination</th></tr>
        </thead>

        <tbody>
            <tr><td>Temperature</td><td>{{ $product->Temperature }}</td><td>Height</td><td>{{ $product->Height }}</td></tr>
            <tr><td>Chest Before Breathing</td><td>{{ $product->ChestBeforeBreathing }}</td><td>Pulse</td><td>{{ $product->Pulse }}</td></tr>
            <tr><td>Weight</td><td>{{ $product->Weight }}</td><td>Chest After Breathing</td><td>{{ $product->ChestAfterBreathing }}</td></tr>
            <tr><td>BP</td><td>{{ $product->BP }}</td><td>BMI</td><td>{{ $product->BMI }}</td></tr>
            <tr><td>SpO2</td><td>{{ $product->SpO2 }}</td><td>Respiration Rate</td><td>{{ $product->RespirationRate }}</td></tr>
        </tbody>
    </table>

    {{-- SECTION 4 --}}
    <table>
        <thead>
            <tr><th colspan="4">4. Vision</th></tr>
        </thead>
        <tbody>
            <tr><td>Right Eye Specs</td><td>{{ $product->RightEyeSpecs }}</td><td>Left Eye Specs</td><td>{{ $product->LeftEyeSpecs }}</td></tr>
            <tr><td>Near Vision Right</td><td>{{ $product->NearVisionRight }}</td><td>Near Vision Left</td><td>{{ $product->NearVisionLeft }}</td></tr>
            <tr><td>Distant Vision Right</td><td>{{ $product->DistantVisionRight }}</td><td>Distant Vision Left</td><td>{{ $product->DistantVisionLeft }}</td></tr>
            <tr><td>Colour Vision</td><td colspan="3">{{ $product->ColourVision }}</td></tr>
        </tbody>
    </table>

    {{-- SECTION 5,6,7,8 grouped --}}
    <table>
        <thead>
            <tr><th colspan="4">5. ENT & Systemic Examination</th></tr>
        </thead>
        <tbody>

            {{-- 5. General Examination --}}
            <tr><td colspan="4" class="sub-title">5. General Examination</td></tr>
            @foreach(['Eye','Nose','Conjunctiva','Ear','Tongue','Nails','Throat','Skin','Teeth','PEFR'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach

            {{-- 6. Clinical Signs --}}
            <tr><td colspan="4" class="sub-title">6. Clinical Signs</td></tr>
            @foreach(['Eczema','Cyanosis','Jaundice','Anaemia','Oedema','Clubbing','Allergy','Lymphnode'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach

            {{-- 7. Medical History --}}
            <tr><td colspan="4" class="sub-title">7. Medical History</td></tr>
            @foreach(['KnownHypertension','Diabetes','Dyslipidemia','RadiationEffect','Vertigo','Tuberculosis','ThyroidDisorder','Epilepsy','Br_Asthma','HeartDisease','PresentComplain'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach

            {{-- 8. Systemic Examination --}}
            <tr><td colspan="4" class="sub-title">8. Systemic Examination</td></tr>
            @foreach(['RespirationSystem','GenitoUrinary','CVS','CNS','PerAbdomen','ENT'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach

        </tbody>
    </table>

    {{-- SECTION 6 --}}
    <table>
        <thead>
            <tr><th colspan="4">6. Family History</th></tr>
        </thead>
        <tbody>
            @foreach(['Father','Mother','Brother','Sister'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach
        </tbody>
    </table>

    {{-- SECTION 7 --}}
    <table>
        <thead><tr><th colspan="4">7. Lab Investigations</th></tr></thead>
        <tbody>
            @foreach(['HB','WBC','Paasite','RBC','Platelet','ESR','FBS','PP2BS','SGPT','SCreatintine','RBS','SChol','STRG','SHDL','SLDL','CHRatio'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach
        </tbody>
    </table>

    {{-- SECTION 8 --}}
    <table>
        <thead><tr><th colspan="4">8. Urine Analysis</th></tr></thead>
        <tbody>
            @foreach(['UrineColour','UrineReaction','UrineAlbumin','UrineSugar','UrinePusCell','UrineRBC','UrineEpiCell','UrineCrystal'] as $field)
                <tr><td>{{ $field }}</td><td>{{ $product->$field }}</td><td colspan="2"></td></tr>
            @endforeach
        </tbody>
    </table>

    {{-- SECTION 9 --}}
    <table>
        <thead><tr><th colspan="4">9. Doctor & Remarks</th></tr></thead>
        <tbody>
            <tr><td>Name of Doctor</td><td>{{ $product->NameOfDoctor }}</td><td>Doctor Signature</td><td>{{ $product->DoctorSignature }}</td></tr>
            <tr><td>Reviewed By</td><td>{{ $product->ReviewedBy }}</td><td>Doctors Remarks</td><td>{{ $product->DoctorsRemarks }}</td></tr>
            <tr><td>Health Status</td><td colspan="3">{{ $product->HealthStatus }}</td></tr>
        </tbody>
    </table>

    {{-- SECTION 10 --}}
    <table>
        <thead><tr><th colspan="4">10. Hazardous & Dangerous Info</th></tr></thead>
        <tbody>
            @foreach(['Hazardous','Dangerousproc','Rawmaterials','JobRestriction'] as $field)
                <tr><td>{{ $field }}</td><td colspan="3">{{ $product->$field }}</td></tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
