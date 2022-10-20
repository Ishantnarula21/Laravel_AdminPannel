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
                    <section>
                        <h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">
                            Page
                            Manager</h3>
                        <hr style="margin:0px; width:600px; margin-bottom:10px" />
                        <div
                            style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">
                            Add Page</div>
                        <div>
                            @if (isset($data))
                                <form action="{{ url('productupdate/' . $data[0]->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <table class="addpage-table">
                                        <tr>
                                            <td style="width:250px; text-align:right">Name<span
                                                    style="color:red">*</span>
                                            </td>
                                            <td>
                                                <input type="text" name="name" style="width:200px"
                                                    value="{{ isset($data[0]->name) ? $data[0]->name : '' }}"
                                                    required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Content</td>
                                            <td>
                                                <textarea class="tinymce" name="content" style="height:150px;width:200px;" required>{{ isset($data[0]->content) ? $data[0]->content : '' }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Status</td>
                                            <td>
                                                @if (!empty($data))
                                                    @if ($data[0]->status == 0)
                                                        <input type="checkbox" name="status"
                                                            style="margin-right:20px" />
                                                    @else
                                                        <input type="checkbox" name="status" style="margin-right:20px"
                                                            checked />
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div style="padding-left:25%"><input type="submit" class="savebtn"
                                                        name="update" value="Update" />
                                                    &nbsp;&nbsp;
                                                    <a href="#" class="cnclbtn">Cancel</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            @else
                                <form action="{{ url('form_insert') }}" method="post">
                                    {{ csrf_field() }}
                                    <table class="addpage-table">
                                        <tr>
                                            <td style="width:250px; text-align:right">Name<span
                                                    style="color:red">*</span>
                                            </td>
                                            <td>
                                                <input type="text" name="name" style="width:200px"
                                                    value="{{ isset($data[0]->name) ? $data[0]->name : '' }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Content</td>
                                            <td>
                                                <textarea name="content" style="height:150px;width:200px;">{{ isset($data[0]->content) ? $data[0]->content : '' }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Status</td>
                                            <td>
                                                <input type="checkbox" name="status" style="margin-right:20px" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div style="padding-left:25%"><input type="submit" class="savebtn"
                                                        name="save" value="Save" />
                                                    &nbsp;&nbsp;
                                                    <a href="#" class="cnclbtn">Cancel</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            @endif
                        </div>
                    </section>

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
