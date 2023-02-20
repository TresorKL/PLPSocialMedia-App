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
            background: rgb(231, 196, 254);
            background: linear-gradient(90deg, rgba(231, 196, 254, 1) 0%, rgba(119, 202, 244, 1) 50%, rgba(86, 196, 159, 1) 100%);
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
                <h2 class="text-center text-primary mb-4">WELCOME TO PLP SOCIAL MEDIA</h2>
                <h2 class="text-center text-white mb-4">Login</h2>
                <form>
                    <div class="form-group">
                        <label for="email" class="">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted ">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password text-white ">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-link" data-toggle="modal"
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
                    <form>
                        <div class="form-group">
                            <label for="createEmail">Email address</label>
                            <input type="email" class="form-control" id="createEmail"
                                aria-describedby="createEmailHelp" placeholder="Enter email">
                            <small id="createEmailHelp" class="form-text text-muted">We'll never share your email with
                                anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="createPassword">Password</label>
                            <input type="password" class="form-control" id="createPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
