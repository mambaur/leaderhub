@extends('admin.layouts.main', ['title' => 'User Managements', 'menu' => 'user-managements', 'submenu' => 'user-management-list'])

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
                                <h4 class="card-title card-title-dash">User Managements</h4>
                                <p class="card-subtitle card-subtitle-dash">List user who can access admin panel</p>
                            </div>
                            <div>
                                <a href="{{ route('user_management_create') }}" class="btn btn-primary btn-sm">+ Add
                                    User</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-1">
                            <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="w-25 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>
                                                <h6>{{ $item->name }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ $item->email }}</h6>
                                            </td>
                                            <td>
                                                <h6>{{ @$item->getRoleNames()[0] }}
                                                </h6>
                                            </td>
                                            <td class="text-end">
                                                @if ($item->email == 'garudafiberapp@gmail.com' && auth()->user()->email != 'garudafiberapp@gmail.com')
                                                    <a class="btn btn-primary py-1 disabled" href="#">
                                                        Edit</a>
                                                    <a href="#" class="btn btn-danger btn-delete py-1 disabled">
                                                        Delete</a>
                                                @else
                                                    <a class="btn btn-primary py-1"
                                                        href="{{ route('user_management_edit', $item->id) }}">
                                                        Edit</a>
                                                    <a href="#" class="btn btn-danger btn-delete py-1"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-url="{{ route('user_management_delete', $item->id) }}">
                                                        Delete</a>
                                                @endif
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
            $('.table').DataTable({});
        });

        $(document).on("click", ".btn-delete", function(e) {
            e.preventDefault()
            let url = $(this).data('url');
            $(".form-delete").attr('action', url);
        });
    </script>
@endsection
