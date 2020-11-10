<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- csrf-token for ajax post request --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- Tempusdominus Bbootstrap 4 -->
  {{-- <link rel="stylesheet" href="{{asset('/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{asset('/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{asset('/backend/plugins/jqvmap/jqvmap.min.css')}}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/backend/dist/css/adminlte.min.css')}}">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- datepicker -->
  <link rel="stylesheet" href="{{asset('/backend/plugins/datepicker/css/bootstrap-datepicker3.min.css')}}">

  <link rel="stylesheet" href="{{ asset('/backend/bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/backend/plugins/select2/css/select2.bootstrap.min.css')}}">

  <!-- dataTables -->
  {{-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" /> --}}
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />

  <!-- summernote -->
  {{-- <link rel="stylesheet" href="{{asset('/backend/plugins/summernote/summernote-bs4.css')}}"> --}}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/nepali-date-picker@2.0.1/dist/nepaliDatePicker.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.css')}}">
    <style>
        /* On screens that are 992px or more, set the margin*/
        @media screen and (min-width: 992px) {
            .personal-details {
                margin-left: 3em;
            }
        }

        /* On screens that are 1200px or more, set the margin*/
        @media screen and (min-width: 1200px) {
            .personal-details {
                margin-left: 8em;
            }
        }
    </style>
</head>
<body>
    

@inject('request', 'Illuminate\Http\Request')
{{-- @extends('admin.backend.layouts.master')
@section('title','Grade Sheet')

@section('content') --}}
<div class="card">
    <div class="card-body">
        <div class="text-center"><h3>Search Result</h3></div>
        <div class="row">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
                <select class="form-control border-0 bg-light {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty" id="faculties" required>


                    <option value="">Select a institution...</option>
                    @foreach($faculties as $id => $faculty)
    
                    <option value="{{ $id }}" >{{ $faculty }}</option>
                    @endforeach
                </select>
                {{-- <input type="search" placeholder="Faculty" class="form-control border-0 bg-light"> --}}
            </div>
        </div>
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
            <select class="form-control border-0 bg-light " name="level" id="levels" required>
                <option value="">Select a level...</option>

            </select>
            </div>
        </div>

        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
            <select class="form-control border-0 bg-light select2" name="programs" id="programs" required>
                <option value="">Select a program...</option>              
            </select>
            </div>
        </div>

        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
            <select class="form-control border-0 bg-light" name="semester" id="semester" required>
                <option value="">Select a semester...</option>
            </select>
            </div>
        </div>
   
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
              <input type="search" placeholder="Exam Year" name="year" id="year" class="form-control border-0 bg-light">
            </div>
        </div>
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
              <input type="search" placeholder="Symbol Number" name="symbol_no" id="symbol" class="form-control border-0 bg-light">
            </div>
        </div>
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 col-md-3">
            <div class="input-group">
                <input class="form-control border-0 bg-light" type="text" name="dob" id="dob" placeholder="Date of Birth (YYYY-MM-DD)" required>
            </div>
        </div>
        <div class="form-group col-md-3">
            <button type="submit" class="btn btn-primary rounded-pill btn-block shadow-sm" onclick="getQuery();">Search</button>
        </div>
    </div>
        
    </div>
</div>
    <style>
        .grade_sheet{
            font-weight: bolder;
            font-family: 'Times New Roman'
        }
    </style>
    <div class="card" id="student_result">
        
    </div>
{{-- @endsection --}}

    <script src="{{ asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/form/semantic.min.js')}}"></script>
    <script src="{{ asset('/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('/backend/plugins/nepali-date-picker/nepaliDatePicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.date-picker').nepaliDatePicker({
                dateFormat: "%y-%m-%d"
                , closeOnDateSelect: true
            , });

        // if changes is made on faculty selection
        $("#faculties").change(function() {
                    //
                    var selected_id = $(this).val();
                    $.ajax({
                        cache: false
                        , url: "{{ route('admin.levels.getspecificlevels') }}"
                        , type: 'get'
                        , data: {
                            facultyId: selected_id
                        }
                        , dataType: 'json'
                        , beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        }
                        , success: function(data) {
                            // console.log(data)
                            var len = data.length;
                            $("#levels").empty();
                            $levels = $("#levels").append("<option value=''>Select a level...</option>");
                            for (var i = 0; i < len; i++) {
                                var id = data[i]['id'];
                                var name = data[i]['name'];
                                $levels.append("<option value='" + id + "'>" + name + "</option>");
                            }
                        }
                    });
                });

                // if changes is made on level selection
                $("#levels").change(function() {
                    var selected_id = $(this).val();
                    var faculty_id = $('#faculties').val();
                    //
                    $.ajax({
                        cache: false
                        , url: "{{ route('admin.courses.getspecificcourses') }}"
                        , type: 'get'
                        , data: {
                            levelId: selected_id
                            , facultyId: faculty_id
                        , }
                        , dataType: 'json'
                        , beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        }
                        , success: function(data) {
                            // console.log(data);
                            var len = data.length;
                            $("#programs").empty();
                            $programs = $("#programs").append("<option value=''>Select a program...</option>");
                            for (var i = 0; i < len; i++) {
                                var id = data[i]['id'];
                                var name = data[i]['name'];
                                $programs.append("<option value='" + id + "'>" + name + "</option>");
                            }
                        }
                    });
                });

                // if changes is made on programs selection
                $("#programs").change(function() {                    
                    var level_id = $('#levels').val();
                    $("#semester").empty();
                    if(level_id==1){
                        $("#semester").append(`<option value=""> Select a semester...</option>
                            <option value="first">1st Semester</option>
                            <option value="second">2nd Semester</option>
                            <option value="third">3rd Semester</option>
                            <option value="fourth">4th Semester</option>
                            <option value="fifth">5th Semester</option>
                            <option value="sixth">6th Semester</option>
                            <option value="seventh">7th Semester</option>
                            <option value="eighth">8th Semester</option>
                            `);
                    } else if(level_id==2) {
                        $("#semester").append(`<option value=""> Select a semester...</option>
                            <option value="first">1st Semester</option>
                            <option value="second">2nd Semester</option>
                            <option value="third">3rd Semester</option>
                            <option value="fourth">4th Semester</option>
                            `);
                    }
                });
            });
            
            function getQuery() {        
                var programs = $('#programs').val();
                var semester = $('#semester').val();
                var year = $('#year').val();
                var symbol = $('#symbol').val();
                var dob = $('#dob').val();
        
                if (programs=="" || semester=="" || year=="" || symbol=="") {
                    alert("Fill all the details of your search");
                }
                else {
                    var searchDetails = {
                        programs: programs,
                        semester: semester,
                        year: year,
                        symbol: symbol,
                        dob: dob
                    };
                    $.ajax({
                        data: searchDetails,
                        url: "{{ route('admin.results.getresult') }}",
                        type: 'post',
                        beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function(data) {
                            $('.grade_sheet').remove();
                            
                            if(data){
                                var course = data['course'];
                                var marks = data['marks'];
                                var len = data['marks'].length;
                                var dynamic = "";
                                var total_credit_hrs = 0;
                                var remarks =  (data['remarks']===null)?'':data['remarks'];
                                for (var x = 0; x < len; x++) {
                                    total_credit_hrs += parseInt(marks[x].credit_hrs);
                                    var remark =  (marks[x].remarks===null)?'':marks[x].remarks;
                                    dynamic += '<tr><td>' + (x+1) + '</td><td>' + marks[x].subject_code + '</td><td>' + marks[x].subject_title + '</td><td>' + marks[x].credit_hrs + '</td><td>' + marks[x].grade_point + '</td><td>' + marks[x].grade + '</td><td>' + remark + '</td></tr>';
                                };
                                $('#student_result').append(`
                                <div class="card-body grade_sheet">

                                <div class="sheet-header" >
                                    <div class="logo"><img src="{{ asset('musomlogo.jpg') }}" alt="logo" width="100" height="100"></div>
                                    <span><h4>Mid-Western University</h4></span>
                                    <span><h2 style="font-weight: bolder">School of Management (MUSOM)</h2></span>
                                    <h4 style="font-weight: bolder">(An Autonomous Institution)</h4>
                                    <h4 style="font-weight: bolder">Surkhet, Nepal</h4>
                                    <br>
                                    <h4 style="font-weight: bolder"><u>Grade Sheet</u></h4>
                                </div>
                                <br><br><br>
                                <div class="student_details text-center">
                                    <div class="personal-details">
                                    <div class="row">
                                        <div class="name col-md-6">
                                            <div class="">Name: `+data['name']+`</div>
                                        </div>
                                        <div class="regd_no col-md-6">
                                            <div class="">Regd. No.: `+data['regd_no']+`</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="dob col-md-6">
                                            <div class="">DOB: `+data['dob']+`</div>
                                        </div>
                                        <div class="symbol_no col-md-6">
                                            <div class="">Exam Roll No: `+data['symbol_no']+`</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="level col-md-6">
                                            <div class="">Level: `+data['average_grade']+`</div>
                                        </div>

                                        <div class="programme col-md-6">
                                            <div class="">Programme: `+course['name']+`</div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="semester col-md-6">
                                            <div class="">Semester: `+data['semester']+`</div>
                                        </div>
                                        <div class="year col-md-6">
                                            <div class="">Year: `+data['year']+`</div>
                                        </div>
                                    </div>
                                    </div>
                                    <br>
                                    <div class="container table-responsive" >
                                    <table class="table table-striped table-hover table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Course Code No.</th>
                                                <th>Course Title</th>
                                                <th>Cr. Hr.</th>
                                                <th>Grade Point</th>
                                                <th>Grade</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>`
                                            + dynamic +                                             
                                            `<tr>
                                                <td colspan="3">Total Credit Hour and Semester Wise Grade Point Average</td>
                                                <td>`+total_credit_hrs+`</td>
                                                <td>`+data['sgpa']+`</td>
                                                <td></td>
                                                <td>`+remarks+`</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="result row col-md-6">
                                        </div>
                                        <div class="result row col-md-4">
                                            <div class="">Result: `+data['result']+`</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div>

                                </div>
                                `);
                            } else {
                                $('#student_result').append(`
                                <div class="card-body grade_sheet">

                                <div class="sheet-header text-center">
                                <p style="color:red;">Sorry, data could not be found.</p>
                                </div>
                                </div>
                                `);
                            }
                        }
                    });
                }
            }
    </script>
</body>
</html>