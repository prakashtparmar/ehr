<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>@yield('title', 'Dashboard')</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   {{-- Stylesheets --}}
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
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
                  <li><a href="#">User Management</a></li>
                  <li class="active">Create User</li>
               </ul>
            </div>

            <div class="page-content">
               <div class="page-header">
                  <h1>
                     User Management
                     <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Create New User
                     </small>
                     <a class="btn btn-primary btn-sm pull-right" href="{{ route('users.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                     </a>
                  </h1>
               </div>

               <div class="row">
                  <div class="col-xs-12">

                     {{-- Validation Errors --}}
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                           <strong>Whoops!</strong> There were some problems with your input.<br><br>
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                     {{-- Create User Form --}}
                     <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Basic Info --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Name:</strong>
                                 <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ old('name') }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Email:</strong>
                                 <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Password:</strong>
                                 <input type="password" name="password" class="form-control" placeholder="Password">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Confirm Password:</strong>
                                 <input type="password" name="confirm-password" class="form-control"
                                    placeholder="Confirm Password">
                              </div>
                           </div>
                        </div>

                        {{-- Role & Mobile --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <strong>Roles:</strong>
                                 <div class="checkbox">
                                    @foreach ($roles as $value => $label)
                                       <label style="margin-right: 15px;">
                                          <input type="checkbox" name="roles[]" value="{{ $value }}"
                                             {{ (is_array(old('roles')) && in_array($value, old('roles'))) ? 'checked' : '' }}>
                                          {{ $label }}
                                       </label>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Mobile:</strong>
                                 <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                    value="{{ old('mobile') }}">
                              </div>
                           </div>
                        </div>

                        {{-- Active & Status --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Active:</strong>
                                 <select name="is_active" class="form-control">
                                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>No</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Status:</strong>
                                 <select name="status" class="form-control">
                                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                 </select>
                              </div>
                           </div>
                        </div>

                        {{-- Profile --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>User Type:</strong>
                                 <input type="text" name="user_type" class="form-control" placeholder="User Type"
                                    value="{{ old('user_type') }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>User Code:</strong>
                                 <input type="text" name="user_code" class="form-control" placeholder="User Code"
                                    value="{{ old('user_code') }}">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Profile Image:</strong>
                                 <input type="file" name="image" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Address:</strong>
                                 <textarea name="address" class="form-control" rows="2" placeholder="Address">{{ old('address') }}</textarea>
                              </div>
                           </div>
                        </div>

                        {{-- Personal Info --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Gender:</strong>
                                 <select name="gender" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Marital Status:</strong>
                                 <select name="marital_status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Other" {{ old('marital_status') == 'Other' ? 'selected' : '' }}>Other</option>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Date of Birth:</strong>
                                 <input type="date" name="date_of_birth" class="form-control"
                                    value="{{ old('date_of_birth') }}">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Joining Date:</strong>
                                 <input type="date" name="joining_date" class="form-control"
                                    value="{{ old('joining_date') }}">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <strong>Emergency Contact No:</strong>
                                 <input type="text" name="emergency_contact_no" class="form-control"
                                    placeholder="Emergency Contact" value="{{ old('emergency_contact_no') }}">
                              </div>
                           </div>
                        </div>

                        {{-- Submit --}}
                        <div class="text-center">
                           <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">
                              <i class="fa fa-floppy-o"></i> Submit
                           </button>
                        </div>

                     </form>
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
   @include('layouts.partials.scripts')
   <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
   <script type="text/javascript">
      if ('ontouchstart' in document.documentElement)
         document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
   </script>
   <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
   <script src="{{ asset('assets/js/ace.min.js') }}"></script>

   {{-- Fix Logout Dropdown --}}
   <script>
       $(document).ready(function(){
           $('.dropdown-toggle').dropdown();
       });
   </script>
</body>

</html>
