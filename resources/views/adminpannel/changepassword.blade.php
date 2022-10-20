@if ($errors->any())
    <h4 style="color:red">{{ $errors->first() }}</h4>
@endif
@if (session()->has('message'))
    <h4 style="color:red">{{ session()->get('message') }}</h4>
@endif
@if (session()->has('user_session'))
    <html>

    <head>
        <?php include 'common/links.blade.php'; ?>
    </head>

    <body>
        <?php include 'common/header.blade.php'; ?>
        </div>
        <div class="col-md-12" style="background:#1C5978">
            <div class="container">
                <div class="col-md-3">
                    <p
                        style="color:white; font-weight:bold; font-family:arial; font-size:12px; margin:7px 0px; float:left; letter-spacing:1; word-spacing:3">
                        <?php echo date('d-m-y'); ?></p>
                </div>
            </div>
        </div>
        <aside>
            <div class="container ">
                <div class="col-md-2" style="padding:0px">
                    <div class="col-md-12" style="padding:0px">
                        <aside>
                            <?php include 'common/navigation.blade.php'; ?>
                        </aside>
                    </div>
                </div>
                <div class="col-md-10 main-section">
                    <h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">
                        Change
                        Password</h3>
                    <hr style="margin:0px; width:600px; margin-bottom:10px" />
                    <!--font: font-style font-variant font-weight font-size/line-height font-family -->
                    <div
                        style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">
                        Change password</div>
                    @if (!empty($id))
                        <form method="post" action="{{ url('createpass') }}">
                            {{ csrf_field() }}
                            <table border="1" width="100%" style="text-align: center;">
                                <tr>
                                    <td style="padding:8px;">
                                        Enter new password
                                        <input type="hidden" name="id" value="{{ $id }}" />
                                        <input type="text" name="newpass" />
                                        <input type="submit" value="Createpass" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    @else
                        <form method="post" action="{{ url('confirmoldpass') }}">
                            {{ csrf_field() }}
                            <table border="1" width="100%" style="text-align: center;">
                                <tr>
                                    <td style="padding:8px;">
                                        Enter old password
                                        <input type="text" name="oldpass" />
                                        <input type="submit" value="Verify" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    @endif
                </div>
        </aside>
        <div class="footer-line" style="margin-top:15px">
            <footer></footer>
        </div>

    </body>

    </html>
@else
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h4 style="color:red">You need to login first</h4>
        <a href="login">login</a>
    </body>

    </html>
@endif
