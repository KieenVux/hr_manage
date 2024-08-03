<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Create Pgae</title>
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

    <div class="container mt-4">
        <h1 style="text-align: center; margin-bottom: 50px;">Create New Staff</h1>
        <style>
            .highlight-label {
                font-weight: bold;
                color: #007bff;
                font-size: 1.2em;
            }
        </style>
        <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
            </svg>
            Back
        </a>
        <form class="row g-3 mt-3" method="POST" action="{{route('staff.store')}}">
            @csrf
            @method('post')
            <div class="col-md-6">
                <label for="name" class="form-label highlight-label">Name</label>
                <input type="text" class="form-control " id="name" required name="name"">
        </div>
        <div class=" col-md-6">
                <label for="grid" class="form-label highlight-label">GrID</label>
                <input type="text" class="form-control" id="grid" required name="grid"">
        </div>
        <div>
            <a href=" {{ route('staff.index') }}" class="btn btn-secondary">Back to Staff List</a>
                <button class=" btn btn-primary" type="submit" value="Create a New Staff"> Create </button>
        </div>
        </form>
    </div>
</body>

</html>
