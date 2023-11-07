@extends('admin.layouts.main', ['title' => 'Products', 'menu' => 'products', 'submenu' => 'product-list'])

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
                                <h4 class="card-title card-title-dash">Pending
                                    Requests</h4>
                                <p class="card-subtitle card-subtitle-dash">You
                                    have 50+ new requests</p>
                            </div>
                            <div>
                                <a href="{{ route('product_create') }}" class="btn btn-primary btn-sm">+ Add
                                    Product</a>
                            </div>
                        </div>
                        <div class="table-responsive  mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Company</th>
                                        <th>Progress</th>
                                        <th class="w-25 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex ">
                                                    <img src="{{ url('/') }}/admin-assets/images/faces/face1.jpg"
                                                        alt="">
                                                    <div>
                                                        <h6>{{ $item->name }}</h6>
                                                        <p>Head admin</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>Company name 1</h6>
                                                <p>company type</p>
                                            </td>
                                            <td>
                                                <div>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                        <p class="text-success">79%
                                                        </p>
                                                        <p>85/162</p>
                                                    </div>
                                                    <div class="progress progress-md">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 85%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <a class="btn btn-primary py-1"
                                                    href="{{ route('product_edit', $item->id) }}">
                                                    Edit</a>
                                                <a href="#" class="btn btn-danger btn-delete py-1"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    data-url="{{ route('product_delete', $item->id) }}">
                                                    Delete</a>
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
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="form-delete" method="post">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Warning!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
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
            $('.table').DataTable({
                order: [
                    [3, 'desc']
                ] // updated_at
            });
        });

        $(document).on("click", ".btn-delete", function(e) {
            e.preventDefault()
            let url = $(this).data('url');
            $(".form-delete").attr('action', url);
        });
    </script>
@endsection
