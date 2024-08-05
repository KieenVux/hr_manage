<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function getInputData() {
            const name = document.getElementById('name').value;
            const grid = document.getElementById('grid').value;
            document.getElementById('output').innerText = `
            Name: ${name}
            GrID: ${grid}
            `;
        }
    </script>
</head>

<body>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <h1 style="text-align: center; margin: 50px 20px;">Edit a staff</h1>
    <style>
        .highlight-label {
            font-weight: bold;
            color: #007bff;
            /* Màu xanh dương */
            font-size: 1.2em;
        }
    </style>

    <div class="container mt-4">
        <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
            </svg>
            Back
        </a>
        <form class="row g-3" action="{{route('staff.update', ['staff' => $staff])}}" method="post">
            @csrf
            @method('put')
            <div class="col-md-6">
                <label for="name" class="form-label highlight-label">Name</label>
                <input type="text" class="form-control mt-3" id="name" required name="name" value="{{$staff->name}}">
            </div>
            <div class="col-md-6">
                <label for="grid" class="form-label highlight-label">GrID</label>
                <input type="text" class="form-control mt-3" id="grid" required name="grid" value="{{$staff->grid}}">
            </div>
            <div class="col-12">
                <a href=" {{ route('staff.index') }}" class="btn btn-secondary">Back to Staff List</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=getInputData()>
                    Update
                </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Staff</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p style="text-align: center;">
                                Are You Confirm To Update Staff ID: {{$staff->id}}
                            </p>
                            <p style="text-align: center;" id="output"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
