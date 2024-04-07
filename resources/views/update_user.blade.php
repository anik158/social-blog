<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>

<div class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Update Profile</h1>
                        <form method="POST" action="{{route('user.update',['id'=>$user->id])}}" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                                <div class="invalid-feedback">
                                    Name is required
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="phone">Phone</label>
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{$user->phone}}" required>
                                <div class="invalid-feedback">
                                    Phone is invalid
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">

                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="img">Profile Picture</label>
                                <input id="img" type="file" class="form-control" name="img" value="" >
                            </div>

                            <div class="align-items-center d-flex">
                                <button type="submit" class="btn btn-warning ms-auto">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            <a href="{{route("settings")}}" class="text-dark">Go Back</a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 text-muted">
                    Copyright &copy; 2024 &mdash; Ahsan
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../js/login.js"></script>
</body>
</html>
