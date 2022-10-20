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
                            product Manager</h3>
                        <hr style="margin:0px; width:600px; margin-bottom:10px" />
                        <div
                            style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">
                            Add product</div>
                        <div>
                            @if (!empty($data))
                                <form method="post" enctype="multipart/form-data"
                                    action="{{ url('productupdate/' . $data[0]->id) }}">
                                    {{ csrf_field() }}
                                    <table class="addpage-table">
                                        <tr>
                                            <td style="width:250px; text-align:right">Select category<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <select name="catname">
                                                    <option value="select category">Select Category</option>
                                                    @foreach ($cdata as $cdata)
                                                        <option value="{{ $cdata->id }}">{{ $cdata->categoryname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product Name<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <input type="text" name="pname" style="width:200px"
                                                    value="{{ $data[0]->pname }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product description</td>
                                            <td>
                                                <textarea name="pdescription" style="height:200px;width:200px;">{{ $data[0]->pdescription }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product Price<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <input type="text" name="pprice" style="width:200px"
                                                    value="{{ $data[0]->pprice }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product Image<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <input type="file" name="pimage" style="width:200px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div style="padding-left:25%">
                                                    <input type="submit" class="savebtn" name="save"
                                                        value="Update" />
                                                    <a href="productadd.php" class="cnclbtn">Cancel</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            @else
                                <form method="post" enctype="multipart/form-data" action="{{ url('pinsert') }}">
                                    {{ csrf_field() }}
                                    <table class="addpage-table">
                                        <tr>
                                            <td style="width:250px; text-align:right">Select category<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <select name="catname">
                                                    <option value="select category">Select Category</option>
                                                    @foreach ($cdata as $cdata)
                                                        <option value="{{ $cdata->id }}">{{ $cdata->categoryname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product Name<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <input type="text" name="pname" style="width:200px" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product description</td>
                                            <td>
                                                <textarea name="pdescription" style="height:200px;width:200px;"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product Price<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <input type="text" name="pprice" style="width:200px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:250px; text-align:right">Product Image<span
                                                    style="color:red">*</span></td>
                                            <td>
                                                <input type="file" name="pimage" style="width:200px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div style="padding-left:25%">
                                                    <input type="submit" class="savebtn" name="save"
                                                        value="Save" />
                                                    <a href="productadd.php" class="cnclbtn">Cancel</a>
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
