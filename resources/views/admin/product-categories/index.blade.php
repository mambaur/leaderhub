@extends('admin.layouts.main', ['title' => 'Product Categories', 'menu' => 'categories', 'submenu' => 'product-category-list'])

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                                <h4 class="card-title card-title-dash">Category</h4>
                                <p class="card-subtitle card-subtitle-dash">Product Categories</p>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-sm">+ Add
                                    Category</button>
                            </div>
                        </div>
                        <div class="table-responsive mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="w-25 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6>Leader</h6>
                                        </td>
                                        <td class="text-end">
                                            <a class="btn btn-primary py-1">
                                                Edit</a>
                                            <a class="btn btn-danger py-1">
                                                Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Probono</h6>
                                        </td>
                                        <td class="text-end">
                                            <a class="btn btn-primary py-1">
                                                Edit</a>
                                            <a class="btn btn-danger py-1">
                                                Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({});
        });
    </script>
@endsection
