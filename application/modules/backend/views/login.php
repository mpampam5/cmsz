<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?=base_url()?>_template/backend/images/favicon.ico">

        <!-- App css -->
        <link href="<?=base_url()?>_template/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>_template/backend/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>_template/backend/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="<?=base_url()?>_template/backend/images/logo_dark.png" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <!-- <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4> -->
                        <!-- <p class="text-muted text-center">Login in to continue</p> -->

                        <form class="form-horizontal m-t-30" action="index.html" autocomplete="off">

                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-block w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <p>© <?=date('Y')?> <i class="mdi mdi-heart text-danger"></i> Idea.</p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>


        <!-- jQuery  -->
        <script src="<?=base_url()?>_template/backend/js/jquery.min.js"></script>
        <script src="<?=base_url()?>_template/backend/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>_template/backend/js/modernizr.min.js"></script>
        <script src="<?=base_url()?>_template/backend/js/waves.js"></script>
        <script src="<?=base_url()?>_template/backend/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url()?>_template/backend/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url()?>_template/backend/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?=base_url()?>_template/backend/js/app.js"></script>

    </body>
</html>
