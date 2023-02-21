<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


    <style>
        html,
        body {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(68, 98, 113, 1) 50%, rgba(43, 23, 29, 1) 100%);

            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center align-items-center" style="height: 100%;">

            <div class="col-md-6">
                <h2 class="text-center text-white mb-4">Login to PLP Social Media</h2>
                {{-- INVALID AUTH --}}
                @if (Session::has('isUserValid'))

                    @if (Session::get('isUserValid') == 'yes')
                        <p id="" class="text-danger">Invalid credential eiter the email or
                            password is wrong</p>
                    @endif

                @endif
                <form action="/login" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="text-white">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-info ">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-dark">Login</button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                        data-target="#createAccountModal">Create Account</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Create Account Modal -->
    <div class="modal fade" id="createAccountModal" tabindex="-1" role="dialog"
        aria-labelledby="createAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAccountModalLabel">Create Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/account" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="createEmail">Email address</label>
                            <input type="email" class="form-control" id="createEmail"
                                aria-describedby="createEmailHelp" placeholder="Enter email" name="email" required>
                            <small id="createEmailHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="createPassword">Password</label>
                            <input type="password" class="form-control" id="createPassword" name="password"
                                placeholder="Password" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Confirm Password">
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
