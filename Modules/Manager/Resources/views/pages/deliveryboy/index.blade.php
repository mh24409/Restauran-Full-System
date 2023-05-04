@extends('manager::layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Delivery Boy : <strong
                                    class="text-danger">{{ Modules\Manager\Entities\DeliveryBoy::count() }} </strong>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('deliveryboy.create') }}" class="btn btn-info btn-sm"> <i
                                    class="fas fa-plus"></i> New </a>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boys as $boy)
                            <tr>
                                <td>{{ $boy->name }}</td>
                                <td>{{ $boy->mobile }}</td>
                                <td>{{ $boy->address }}</td>
                                <td>{{ $boy->branch->address }}</td>
                                <td>
                                    <a href="{{ route('deliveryboy.edit', $boy->id) }}"
                                        class="edit btn btn-dark btn-sm">Update</a>
                                    <a href="{{ route('deliveryboy.destroy', $boy->id) }}"
                                        class="edit btn btn-danger btn-sm">Delete</a>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#boy{{ $boy->id }}">
                                        view
                                    </button>

                                    <div class="modal fade" id="boy{{ $boy->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="boy{{ $boy->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="boy{{ $boy->id }}Label">
                                                        {{ $boy->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="boy">
                                                        <div class="col-md-6">
                                                            <div> <strong>Name</strong> : {{ $boy->name }}</div>
                                                            <div><strong>Address</strong> : {{ $boy->address }}</div>
                                                            <div><strong>Mobile</strong> : {{ $boy->mobile }}</div>
                                                            <div> <strong>Salary</strong> :{{ $boy->salary->mount }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div> <strong>National_id</strong> : {{ $boy->national_id }}
                                                            </div>
                                                            <div> <strong>Join_date</strong> : {{ $boy->join_date }}
                                                            </div>
                                                            <div> <strong>Branch</strong> :{{ $boy->branch->address }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        let table = new DataTable('.table');
    </script>
@endsection
