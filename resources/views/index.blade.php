@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    @section('title')
Employee - Employee program
@stop
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Employee</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">Section</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
				<!-- row -->
				<div class="row">
                        <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                                    @can('addEmployee')
                                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add Employee</a>
                                    @endcan
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap">
                                        <thead>
                                        <tr>
                                            <th class="border-bottom-0">ID</th>
                                            <th class="border-bottom-0">Employee Name</th>
                                            <th class="border-bottom-0">Employee Email</th>
                                            <th class="border-bottom-0">Employee Address</th>
                                            <th class="border-bottom-0">Employee Phone</th>
                                            <th class="border-bottom-0">Job Title</th>
                                            <th class="border-bottom-0">salary</th>
                                            <th class="border-bottom-0">Gender</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Hire Date</th>
                                            <th class="border-bottom-0">Date Of Birth</th>
                                            <th class="border-bottom-0">Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                        @foreach($employees as $employee)
                                            <?php $i++ ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->address}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{$employee->job_title}}</td>
                                            <td>{{$employee->salary}}</td>
                                            <td>{{$employee->Gender}}</td>
                                            <td>{{$employee->status}}</td>
                                            <td>{{$employee->hire_date}}</td>
                                            <td>{{$employee->date_of_birth}}</td>
                                            <td>

                                                <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                        type="button">Processes<i class="fas fa-caret-down ml-1"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        @can('editEmployee')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id            ="{{$employee->id}}"
                                                        data-name          ="{{$employee->name}}"
                                                        data-email         ="{{$employee->email}}"
                                                        data-address       ="{{$employee->address}}"
                                                        data-phone         ="{{$employee->phone}}"
                                                        data-job_title     ="{{$employee->job_title}}"
                                                        data-salary        ="{{$employee->salary}}"
                                                        data-Gender        ="{{$employee->Gender}}"
                                                        data-status        ="{{$employee->status}}"
                                                        data-hire_date     ="{{$employee->hire_date}}"
                                                        data-date_of_birth ="{{$employee->date_of_birth}}"
                                                        data-toggle="modal" href="#exampleModal2"
                                                        title="Edit"><i class="las la-pen"></i></a>
                                                        @endcan

                                                        @can('ArchiveEmployee')
                                                        <a class="dropdown-item" href="#" data-id="{{ $employee->id }}"
                                                            data-toggle="modal" data-target="#Transfer_Employee">
                                                        <i class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;Archives</a>
                                                        @endcan

                                                        @can('deleteEmployee')
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{$employee->id}}" data-name="{{$employee->name}}" data-toggle="modal"
                                                        href="#modaldemo9" title="Delete"><i class="las la-trash"></i></a>
                                                        @endcan
                                                    </div>
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
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Add Employee</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('create')}}" method="post">
                                        {{csrf_field()}}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Name</label>
                                        <input type="text" class="form-control" id="name" name="name"  >
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Email</label>
                                        <input type="text" class="form-control" id="email" name="email"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Address</label>
                                        <input type="text" class="form-control" id="address" name="address"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Job Title</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Salary</label>
                                        <input type="text" class="form-control" id="salary" name="salary"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Employee Gender</label>
                                        <select class="form-control" id="Gender" name="Gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Employee Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Active">Active</option>
                                            <option value="Deactive">Deactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Hire Date</label>
                                        <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                        value="{{ date('Y-m-d') }}" id="hire_date" name="hire_date"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Date Of Birth</label>
                                        <input type="text" class="fc-datepicker form-control" placeholder="YYYY-MM-DD"
                                        id="date_of_birth" name="date_of_birth"  >
                                    </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Basic modal -->
                    <!-- Open Form edit & Delete -->
                    <!-- edit -->
				</div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('update/{id}')}}" method="post" autocomplete="off">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="">
                                            <label for="recipient-name" class="col-form-label">Employee Name</label>
                                            <input class="form-control" name="name" id="name" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Email</label>
                                            <input type="text" class="form-control" id="email" name="email"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Address</label>
                                            <input type="text" class="form-control" id="address" name="address"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Job Title</label>
                                            <input type="text" class="form-control" id="job_title" name="job_title"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Salary</label>
                                            <input type="text" class="form-control" id="salary" name="salary"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleTextarea">Employee Gender</label>
                                            <select class="form-control" id="Gender" name="Gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleTextarea">Employee Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Hire Date</label>
                                            <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                            value="{{ date('Y-m-d') }}" id="hire_date" name="hire_date"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Date Of Birth</label>
                                            <input type="text" class="fc-datepicker form-control" placeholder="YYYY-MM-DD"
                                            id="date_of_birth" name="date_of_birth"  >
                                        </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save Edit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- delete -->
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Delete Employee</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                    type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{url('destroy')}}" method="post">
                                    {{method_field('post')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>Are You Shure to Delete</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="name" id="name" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Form edit & Delete -->
                <!-- Open Form Archive -->
                <div class="modal fade" id="Transfer_Employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Archive Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <form action="{{ url('trached') }}" method="post">
                                    {{ method_field('post') }}
                                    {{ csrf_field() }}
                            </div>
                            <div class="modal-body">
                                Are You Shure to Delete Trached ?
                                <input type="hidden" name="id" id="id" value="">
                                <input type="hidden" name="id_page" id="id_page" value="2">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Archive</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <!-- End Form Archive -->
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button    = $(event.relatedTarget)
            var id            = button.data('id')
            var name          = button.data('name')
            var email         = button.data('email')
            var address       = button.data('address')
            var phone         = button.data('phone')
            var job_title     = button.data('job_title')
            var salary        = button.data('salary')
            var Gender        = button.data('Gender')
            var status        = button.data('status')
            var hire_date     = button.data('hire_date')
            var date_of_birth = button.data('date_of_birth')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #address').val(address);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #job_title').val(job_title);
            modal.find('.modal-body #salary').val(salary);
            modal.find('.modal-body #Gender').val(Gender);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #hire_date').val(hire_date);
            modal.find('.modal-body #date_of_birth').val(date_of_birth);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
        <script>
            $('#Transfer_Employee').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
            })
        </script>

@endsection
