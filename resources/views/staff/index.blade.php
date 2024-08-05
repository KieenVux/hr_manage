<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Staff Lists</title>
</head>

<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Company Name</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('staff.index') }}">Staff List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('staff.create') }}">Create Staff</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 style="text-align: center;">List Staff</h1>
        <form action="{{route('staff.create')}}"">
        <button class=" btn btn-primary">Create</button>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered w-100 mx-auto">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"> GrID</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($staffs as $staff )
                    <tr>
                        <td>{{$staff->id}}</td>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->grid}}</td>
                        <td>
                            <a href="{{route('staff.edit', ['staff' => $staff])}}" class="btn btn-primary" style="text-decoration: none;">Edit</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$staff->id}}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$staff->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$staff->id}}">Delete Staff</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p style="text-align: center;">Are you sure you want to delete staff with ID: {{$staff->id}} <br>
                                                Name: {{$staff->name}}<br>
                                                GrID: {{$staff->grid}}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{route('staff.delete', ['staff' => $staff])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </form>
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
</body>

</html>
