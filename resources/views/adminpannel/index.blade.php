@if ($errors->any())
    <h4 style="color:red">{{ $errors->first() }}</h4>
@endif
@if (session()->has('message'))
    <h4 style="color:red">{{ session()->get('message') }}</h4>
@endif
@if (session()->has('user_session'))
    <?php
    session()->flush();
    ?>
@endif
<html>

<head>
    <?php include 'common/links.blade.php'; ?>
</head>

<body>
    <?php include 'common/header.blade.php'; ?>
    <div class="col-md-12" style="background:#1C5978">
        <div class="container">
            <div class="col-md-3">
                <p
                    style="color:white; font-weight:bold; font-family:arial; font-size:12px; margin:7px 0px; float:left; letter-spacing:1; word-spacing:3">
                    <?php echo date('d-m-y'); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="height:70%; min-height:200px">
        <div class="container">
            <form method="post" action="{{ url('sessionForm') }}">
                {{ csrf_field() }}
                <table class="table" style="width:150px; margin:40px auto">
                    <tr>
                        <td></td>
                        <td style="color:#1C5978; font-weight:bold; text-align:center">Login</td>
                    </tr>
                    <tr>
                        <td class="login-table-text">Username</td>
                        <td><input type="text" class="login-table-input" name="username" required></td>
                    </tr>
                    <tr style="border:none">
                        <td class="login-table-text">Password</td>
                        <td><input type="password" class="login-table-input" name="password"
                                style="font-size:30px;height:25px" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Login" name="save"
                                style="margin-left:60px; padding:2px 15px" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <footer style="clear:both">
        <div class="footer-line col-md-12"></div>
    </footer>
</body>

</html>
