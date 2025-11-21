<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>@yield('title', 'Health Records')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      {{-- Stylesheets --}}
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" />
      <style>
         #simple-table th,
         #simple-table td {
         white-space: nowrap;
         }
         .dataTables_wrapper {
         overflow-x: auto;
         width: 100%;
         }
         table.dataTable {
         width: 100% !important;
         }
         table.dataTable tbody tr.open>td {
         background: #f9f9f9;
         }
         .dataTables_child {
         padding: 10px;
         background: #f9f9f9;
         }
         .page-content {
         padding: 10px 20px;
         }
         .details-table th {
         width: 250px;
         background: #f1f1f1;
         }
         .details-section {
         margin-bottom: 20px;
         }
         .details-section h5 {
         margin: 0 0 8px;
         font-weight: bold;
         color: #2c3e50;
         border-bottom: 1px solid #ddd;
         padding-bottom: 5px;
         }
      </style>
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
                     <li><i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a></li>
                     <li><a href="#">Health Management</a></li>
                     <li class="active">Manage Health Records</li>
                  </ul>
               </div>
               <div class="page-content">
                  <div class="page-header">
                     <h1>
                        Manage Health Records
                        <small><i class="ace-icon fa fa-angle-double-right"></i> Employees Health Record
                        List</small>
                        @can('product-create')
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm pull-right">
                        <i class="ace-icon fa fa-plus bigger-110"></i> Add Record
                        </a>
                        @endcan
                     </h1>
                  </div>
                  {{-- Success Message --}}
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade in">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     {{ session('success') }}
                  </div>
                  @endif
                  <div class="row">
                     <div class="col-xs-12">
                        <table id="simple-table" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 @can('product-delete')
                                 <th class="center">
                                    <label class="pos-rel">
                                    <input type="checkbox" class="ace" id="select-all" />
                                    <span class="lbl"></span>
                                    </label>
                                 </th>
                                 @endcan
                                 <th class="detail-col">Details</th>
                                 <th>No</th>
                                 <th>Employee No</th>
                                 <th>Employee Name</th>
                                 <th>Department</th>
                                 <th>Date of Examination</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($products as $key => $product)
                              <tr data-product='@json($product)'>
                                 @can('product-delete')
                                 <td class="center">
                                    <label class="pos-rel">
                                    <input type="checkbox" class="ace row-checkbox" />
                                    <span class="lbl"></span>
                                    </label>
                                 </td>
                                 @endcan
                                 <td class="center">
                                    <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                    <i class="ace-icon fa fa-angle-double-down"></i>
                                    <span class="sr-only">Details</span>
                                    </a>
                                 </td>
                                 <td>{{ ++$i }}</td>
                                 <td>{{ $product->EmployeeNo }}</td>
                                 <td>{{ $product->EmployeeName }}</td>
                                 <td>{{ $product->Department }}</td>
                                 <td>
                                    {{ $product->DateOfExamination ? \Carbon\Carbon::parse($product->DateOfExamination)->format('d M Y') : '' }}
                                 </td>
                                 <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                       @can('product-print')
                                       {{-- 🔥 Print / PDF Dropdown --}}
                                       <div class="btn-group">
                                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                                          <i class="ace-icon fa fa-file-pdf-o bigger-120"></i> PDF <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                             <li><a href="{{ route('products.pdf', [$product->id, 'mypdf']) }}" target="_blank">Medical Check-UP Report</a></li>
                                             <li><a href="{{ route('products.pdf', [$product->id, 'form32']) }}" target="_blank">Form No. 32</a></li>
                                             <li><a href="{{ route('products.pdf', [$product->id, 'form33']) }}" target="_blank">Form No. 33</a></li>
                                          </ul>
                                       </div>
                                       @endcan
                                       @can('product-list')
                                       <a href="{{ route('products.show', $product->id) }}" class="btn btn-xs btn-success">
                                       <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                       </a>
                                       @endcan
                                       @can('product-edit')
                                       <a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-info">
                                       <i class="ace-icon fa fa-pencil bigger-120"></i>
                                       </a>
                                       @endcan
                                       @can('product-delete')
                                       <button type="button" class="btn btn-xs btn-danger delete-btn" data-id="{{ $product->id }}">
                                       <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                       </button>
                                       <form id="delete-form-{{$product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                          @csrf
                                          @method('DELETE')
                                       </form>
                                       @endcan
                                    </div>
                                 </td>
                              </tr>
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
         {{-- Delete Confirmation Dialog --}}
         <div id="confirm-delete-dialog" class="hide">
            <div class="alert alert-info bigger-110">
               <p>This action cannot be undone.</p>
            </div>
            <div class="space-6"></div>
            <p class="bigger-110 bolder center grey">
               <i class="ace-icon fa fa-exclamation-triangle red bigger-120"></i>
               Are you sure you want to delete this record?
            </p>
         </div>
      </div>
      @include('layouts.partials.footer')
      {{-- Scripts --}}
      <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
      <script src="{{ asset('assets/js/ace.min.js') }}"></script>
      <script type="text/javascript">
         jQuery(function ($) {
             var active_class = 'active';
             var table = $('#simple-table').DataTable({
                 lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "All"]],
                 pageLength: 5,
                 scrollX: true,
                 paging: true,
                 searching: true,
                 info: true,
                 ordering: true
             });
         
             // Select/Deselect All
             $('#select-all').on('click', function () {
                 var checked = this.checked;
                 table.$('input.row-checkbox').each(function () {
                     this.checked = checked;
                     $(this).closest('tr').toggleClass(active_class, checked);
                 });
                 $(this).prop('indeterminate', false);
             });
         
             // Individual row checkbox
             $('#simple-table tbody').on('click', 'input.row-checkbox', function () {
                 var $row = $(this).closest('tr');
                 $row.toggleClass(active_class, this.checked);
                 var total = table.$('input.row-checkbox').length;
                 var checked = table.$('input.row-checkbox:checked').length;
                 $('#select-all').prop('checked', total === checked);
                 $('#select-all').prop('indeterminate', checked > 0 && checked < total);
             });
         
             // Show details dynamically in proper table format with ALL schema fields
             $('#simple-table tbody').on('click', '.show-details-btn', function (e) {
                 e.preventDefault();
                 var $btn = $(this);
                 var $tr = $btn.closest('tr');
                 var dtRow = table.row($tr);
         
                 if (dtRow.child.isShown()) {
                     dtRow.child.hide();
                     $tr.removeClass('open');
                     $btn.find('i').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
                 } else {
                     var p = $tr.data('product');
         
                     var detailHtml = `
         <div class="dataTables_child">
             <table class="table table-bordered details-table">
                 
                 <!-- Personal Details -->
                 <thead><tr><th colspan="4">👤 Personal Details</th></tr></thead>
                 <tbody>
                     <tr><th>Employee No</th><td>${p.EmployeeNo ?? ''}</td><th>Employee Name</th><td>${p.EmployeeName ?? ''}</td></tr>
                     <tr><th>Date of Birth</th><td>${p.DateOfBirth ?? ''}</td><th>Sex</th><td>${p.Sex ?? ''}</td></tr>
                     <tr><th>Identification Mark</th><td>${p.IdentificationMark ?? ''}</td><th>Father's Name</th><td>${p.FathersName ?? ''}</td></tr>
                     <tr><th>Marital Status</th><td>${p.MaritalStatus ?? ''}</td><th>Husband's Name</th><td>${p.HusbandsName ?? ''}</td></tr>
                     <tr><th>Address</th><td>${p.Address ?? ''}</td><th>Dependent</th><td>${p.Dependent ?? ''}</td></tr>
                     <tr><th>Mobile</th><td>${p.Mobile ?? ''}</td><th>Joining Date</th><td>${p.JoiningDate ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Work Info -->
                 <thead><tr><th colspan="4">🏢 Work Information</th></tr></thead>
                 <tbody>
                     <tr><th>Company</th><td>${p.Company ?? ''}</td><th>Department</th><td>${p.Department ?? ''}</td></tr>
                     <tr><th>Designation</th><td>${p.Designation ?? ''}</td><th>Date of Examination</th><td>${p.DateOfExamination ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Habits & History -->
                 <thead><tr><th colspan="4">🍷 Habits & History</th></tr></thead>
                 <tbody>
                     <tr><th>H/O Habit</th><td>${p.H_OHabit ?? ''}</td><th>Previous Occup. History</th><td>${p.Prev_Occ_History ?? ''}</td></tr>
                 </tbody>
         
                 <!-- General Examination -->
                 <thead><tr><th colspan="4">🩺 General Examination</th></tr></thead>
                 <tbody>
                     <tr><th>Height</th><td>${p.Height ?? ''}</td><th>Weight</th><td>${p.Weight ?? ''}</td></tr>
                     <tr><th>Pulse</th><td>${p.Pulse ?? ''}</td><th>BP</th><td>${p.BP ?? ''}</td></tr>
                     <tr><th>Temperature</th><td>${p.Temperature ?? ''}</td><th>BMI</th><td>${p.BMI ?? ''}</td></tr>
                     <tr><th>SpO2</th><td>${p.SpO2 ?? ''}</td><th>Respiration Rate</th><td>${p.RespirationRate ?? ''}</td></tr>
                     <tr><th>Chest Before Breathing</th><td>${p.ChestBeforeBreathing ?? ''}</td><th>Chest After Breathing</th><td>${p.ChestAfterBreathing ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Eye & ENT -->
                 <thead><tr><th colspan="4">👀 Eye / ENT</th></tr></thead>
                 <tbody>
                     <tr><th>Right Eye Specs</th><td>${p.RightEyeSpecs ?? ''}</td><th>Left Eye Specs</th><td>${p.LeftEyeSpecs ?? ''}</td></tr>
                     <tr><th>Near Vision (R)</th><td>${p.NearVisionRight ?? ''}</td><th>Near Vision (L)</th><td>${p.NearVisionLeft ?? ''}</td></tr>
                     <tr><th>Distant Vision (R)</th><td>${p.DistantVisionRight ?? ''}</td><th>Distant Vision (L)</th><td>${p.DistantVisionLeft ?? ''}</td></tr>
                     <tr><th>Colour Vision</th><td>${p.ColourVision ?? ''}</td><th>Eye</th><td>${p.Eye ?? ''}</td></tr>
                     <tr><th>Nose</th><td>${p.Nose ?? ''}</td><th>Conjunctiva</th><td>${p.Conjunctiva ?? ''}</td></tr>
                     <tr><th>Ear</th><td>${p.Ear ?? ''}</td><th>Throat</th><td>${p.Throat ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Skin & Others -->
                 <thead><tr><th colspan="4">🧍 Skin & Others</th></tr></thead>
                 <tbody>
                     <tr><th>Tongue</th><td>${p.Tongue ?? ''}</td><th>Nails</th><td>${p.Nails ?? ''}</td></tr>
                     <tr><th>Skin</th><td>${p.Skin ?? ''}</td><th>Teeth</th><td>${p.Teeth ?? ''}</td></tr>
                     <tr><th>PEFR</th><td>${p.PEFR ?? ''}</td><th>Eczema</th><td>${p.Eczema ?? ''}</td></tr>
                     <tr><th>Cyanosis</th><td>${p.Cyanosis ?? ''}</td><th>Jaundice</th><td>${p.Jaundice ?? ''}</td></tr>
                     <tr><th>Anaemia</th><td>${p.Anaemia ?? ''}</td><th>Oedema</th><td>${p.Oedema ?? ''}</td></tr>
                     <tr><th>Clubbing</th><td>${p.Clubbing ?? ''}</td><th>Allergy</th><td>${p.Allergy ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Medical History -->
                 <thead><tr><th colspan="4">📋 Medical History</th></tr></thead>
                 <tbody>
                     <tr><th>Known Hypertension</th><td>${p.KnownHypertension ?? ''}</td><th>Diabetes</th><td>${p.Diabetes ?? ''}</td></tr>
                     <tr><th>Dyslipidemia</th><td>${p.Dyslipidemia ?? ''}</td><th>Radiation Effect</th><td>${p.RadiationEffect ?? ''}</td></tr>
                     <tr><th>Vertigo</th><td>${p.Vertigo ?? ''}</td><th>Tuberculosis</th><td>${p.Tuberculosis ?? ''}</td></tr>
                     <tr><th>Thyroid Disorder</th><td>${p.ThyroidDisorder ?? ''}</td><th>Epilepsy</th><td>${p.Epilepsy ?? ''}</td></tr>
                     <tr><th>Bronchial Asthma</th><td>${p.Br_Asthma ?? ''}</td><th>Heart Disease</th><td>${p.HeartDisease ?? ''}</td></tr>
                     <tr><th>Present Complain</th><td colspan="3">${p.PresentComplain ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Family History -->
                 <thead><tr><th colspan="4">👪 Family History</th></tr></thead>
                 <tbody>
                     <tr><th>Father</th><td>${p.Father ?? ''}</td><th>Mother</th><td>${p.Mother ?? ''}</td></tr>
                     <tr><th>Brother</th><td>${p.Brother ?? ''}</td><th>Sister</th><td>${p.Sister ?? ''}</td></tr>
                 </tbody>
         
                 <!-- System Examination -->
                 <thead><tr><th colspan="4">🫁 System Examination</th></tr></thead>
                 <tbody>
                     <tr><th>Respiration System</th><td>${p.RespirationSystem ?? ''}</td><th>Genito Urinary</th><td>${p.GenitoUrinary ?? ''}</td></tr>
                     <tr><th>CVS</th><td>${p.CVS ?? ''}</td><th>CNS</th><td>${p.CNS ?? ''}</td></tr>
                     <tr><th>Per Abdomen</th><td>${p.PerAbdomen ?? ''}</td><th>ENT</th><td>${p.ENT ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Tests -->
                 <thead><tr><th colspan="4">🧪 Special Tests</th></tr></thead>
                 <tbody>
                     <tr><th>PFT</th><td>${p.PFT ?? ''}</td><th>X-Ray Chest</th><td>${p.XRayChest ?? ''}</td></tr>
                     <tr><th>Vertigo Test</th><td>${p.VertigoTest ?? ''}</td><th>Audiometry</th><td>${p.Audiometry ?? ''}</td></tr>
                     <tr><th>ECG</th><td>${p.ECG ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Lab Investigations -->
                 <thead><tr><th colspan="4">🧬 Lab Investigations</th></tr></thead>
                 <tbody>
                     <tr><th>HB</th><td>${p.HB ?? ''}</td><th>TC</th><td>${p.TC ?? ''}</td></tr>
                     <tr><th>DC</th><td>${p.DC ?? ''}</td><th>RBC</th><td>${p.RBC ?? ''}</td></tr>
                     <tr><th>Platelet</th><td>${p.Platelet ?? ''}</td><th>ESR</th><td>${p.ESR ?? ''}</td></tr>
                     <tr><th>FBS</th><td>${p.FBS ?? ''}</td><th>PP2BS</th><td>${p.PP2BS ?? ''}</td></tr>
                     <tr><th>SGPT</th><td>${p.SGPT ?? ''}</td><th>S.Creatinine</th><td>${p.SCreatintine ?? ''}</td></tr>
                     <tr><th>RBS</th><td>${p.RBS ?? ''}</td><th>S.Chol</th><td>${p.SChol ?? ''}</td></tr>
                     <tr><th>TRG</th><td>${p.STRG ?? ''}</td><th>HDL</th><td>${p.SHDL ?? ''}</td></tr>
                     <tr><th>LDL</th><td>${p.SLDL ?? ''}</td><th>CH Ratio</th><td>${p.CHRatio ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Urine Analysis -->
                 <thead><tr><th colspan="4">💧 Urine Analysis</th></tr></thead>
                 <tbody>
                     <tr><th>Colour</th><td>${p.UrineColour ?? ''}</td><th>Reaction</th><td>${p.UrineReaction ?? ''}</td></tr>
                     <tr><th>Albumin</th><td>${p.UrineAlbumin ?? ''}</td><th>Sugar</th><td>${p.UrineSugar ?? ''}</td></tr>
                     <tr><th>Pus Cell</th><td>${p.UrinePusCell ?? ''}</td><th>RBC</th><td>${p.UrineRBC ?? ''}</td></tr>
                     <tr><th>Epithelial Cell</th><td>${p.UrineEpiCell ?? ''}</td><th>Crystal</th><td>${p.UrineCrystal ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Doctor Section -->
                 <thead><tr><th colspan="4">👨‍⚕️ Doctor Section</th></tr></thead>
                 <tbody>
                     <tr><th>Health Status</th><td>${p.HealthStatus ?? ''}</td><th>Name of Doctor</th><td>${p.NameOfDoctor ?? ''}</td></tr>
                     <tr><th>Doctor Signature</th><td>${p.DoctorSignature ?? ''}</td><th>Reviewed By</th><td>${p.ReviewedBy ?? ''}</td></tr>
                     <tr><th>Job Restriction</th><td>${p.JobRestriction ?? ''}</td><th>Doctor's Remarks</th><td>${p.DoctorsRemarks ?? ''}</td></tr>
                 </tbody>
         
                 <!-- Occupational Hazards -->
                 <thead><tr><th colspan="4">⚠️ Occupational Hazards</th></tr></thead>
                 <tbody>
                     <tr><th>HazardousProcess</th><td>${p.HazardousProcess ?? ''}</td><th>Dangerous Proc.</th><td>${p.DangerousOperation ?? ''}</td></tr>
                     <tr><th>Raw Materials</th><td colspan="3">${p.Rawmaterials ?? ''}</td></tr>
                 </tbody>
             </table>
         </div>`;
         
                     dtRow.child(detailHtml).show();
                     $tr.addClass('open');
                     $btn.find('i').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
                 }
             });
         
             // Delete confirmation dialog
             $('.delete-btn').on('click', function (e) {
                 e.preventDefault();
                 var formId = 'delete-form-' + $(this).data('id');
                 var productName = $(this).closest('tr').find('td:eq(4)').text();
                 $("#confirm-delete-dialog").removeClass('hide').dialog({
                     resizable: false,
                     width: 400,
                     modal: true,
                     buttons: [
                         {
                             html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete",
                             "class": "btn btn-danger btn-minier",
                             click: function () { $(this).dialog("close"); $('#' + formId).submit(); }
                         },
                         {
                             html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                             "class": "btn btn-minier",
                             click: function () { $(this).dialog("close"); }
                         }
                     ],
                     open: function () {
                         $(this).find('.bolder').text("Are you sure you want to delete record of '" + productName + "'?");
                         var dialogTitle = "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-trash-o red'></i> Confirm Deletion</h4></div>";
                         $(this).parent().find('.ui-dialog-title').html(dialogTitle);
                     }
                 });
             });
         });
      </script>
   </body>
</html>