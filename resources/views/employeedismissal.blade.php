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
Employee Attendance - Employee program
@stop
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Employee Attendance</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">Section</span>
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
                                    @can('Add Attendance')
                                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add Attendance</a>
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
                                            <th class="border-bottom-0">Today Date</th>
                                            <th class="border-bottom-0">Start Date</th>
                                            <th class="border-bottom-0">End Date</th>
                                            <th class="border-bottom-0">Duration</th>
                                            <th class="border-bottom-0">Reason</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                        @foreach($attendance as $attend)
                                            <?php $i++ ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$attend->employee->name}}</td>
                                            <td>{{$attend->date}}</td>
                                            <td>{{$attend->start_date}}</td>
                                            <td>{{$attend->end_date}}</td>
                                            <td>{{$attend->duration}}</td>
                                            <td>{{$attend->reason}}</td>
                                            <td>
                                                @can('Edit')
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                    data-id           ="{{$attend->id}}"
                                                    data-employee_id  ="{{$attend->employee_id}}"
                                                    data-date         ="{{$attend->date}}"
                                                    data-start_date   ="{{$attend->start_date}}"
                                                    data-end_date     ="{{$attend->end_date}}"
                                                    data-duration     ="{{$attend->duration}}"
                                                    data-reason       ="{{$attend->reason}}"
                                                    data-toggle="modal" href="#exampleModal2"
                                                    title="Edit"><i class="las la-pen"></i></a>
                                                    @endcan

                                                    @can('Delete')
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-id="{{$attend->id}}" data-employee_id="{{$attend->employee->name}}" data-toggle="modal"
                                                    href="#modaldemo9" title="Delete"><i class="las la-trash"></i></a>
                                                    @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- edit -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Attendance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('attendance_update/{id}')}}" method="post" autocomplete="off">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="">
                                            <label for="inputName" class="control-label">Employees</label>
                                            <select name="employee_id" class="form-control SlectBox">
                                                <!--placeholder-->
                                                <option value="" selected disabled>Edit Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}"> {{ $employee->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Today Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="date" name="date"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Start Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="start_date" name="start_date"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee End Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="end_date" name="end_date"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Duration Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="duration" name="duration"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Reason</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- edit -->
				</div>
                        <!-- delete -->
                        <div class="modal" id="modaldemo9">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Delete Attendance</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{url('attendance_destroy')}}" method="post">
                                        {{method_field('post')}}
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <p>Are You Shure to Delete Attendance</p><br>
                                            <input type="hidden" name="id" id="id" value="">
                                            <input class="form-control" name="employee_id" id="employee_id" type="text" readonly>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Save</button>
                                        </div>
                                </div>
                                </form>
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
                                <form action="{{url('attendance_create')}}" method="post">
                                    {{csrf_field()}}

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="inputName" class="control-label">Employees</label>
                                            <select name="employee_id" class="form-control SlectBox">
                                                <!--placeholder-->
                                                <option value="" selected disabled>Choose Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}"> {{ $employee->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Today Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="date" name="date"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Start Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="start_date" name="start_date"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee End Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="end_date" name="end_date"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employee Duration Date</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                    value="{{ date('Y-m-d') }}" id="duration" name="duration"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Reason</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                                </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection


@section('js')
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
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id          = button.data('id')
            var employee_id = button.data('employee->name')
            var date        = button.data('date')
            var start_date  = button.data('start_date')
            var end_date    = button.data('end_date')
            var duration    = button.data('duration')
            var reason      = button.data('reason')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #employee_id').val(employee_id);
            modal.find('.modal-body #date').val(date);
            modal.find('.modal-body #start_date').val(start_date);
            modal.find('.modal-body #end_date').val(end_date);
            modal.find('.modal-body #duration').val(duration);
            modal.find('.modal-body #reason').val(reason);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var employee_id = button.data('employee_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #employee_id').val(employee_id);
        })
    </script>

@endsection
