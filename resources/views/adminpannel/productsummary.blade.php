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
                        Friday, 8th June 2012</p>
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
                        <p class="text-left">This section displays the list of products.</p>
                        <p class="bordered text-center" style="padding:3px"><a href="#"
                                style="text-decoration:underline; color:blue; font-size:12px">Click here</a>
                            to create
                            <a href="#" style="text-decoration:underline; color:blue; font-size:12px">New
                                product</a>
                        </p>
                        <form action="{{ url('productsearch') }}" method="post">
                            {{ csrf_field() }}
                            <table class="table1">
                                <tr class="table-1-head">
                                    <td colspan="2"
                                        style="padding:8px 15px 8px 15px; background:#EBEBEB;border-bottom:1px solid">
                                        Search
                                    </td>
                                </tr>
                                <tr class="table-1-row">
                                    <td style="padding:8px 15px 8px 15px">Search By product Name</td>
                                    <td style="padding:8px 15px 8px 15px">
                                        <input type="text" name="search" placeholder="Search here..." />
                                        <input type="submit" value="Search" name="searchbtn" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <p style="padding-top:20px">product 1 of 2, showing 10 records out of 13 total, starting on
                            record
                            1, ending on 10</p>
                        <table class="table2">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>product Name</th>
                                    <th>product Description</th>
                                    <th>product price</th>
                                    <th>product image</th>
                                    <th>Edit</th>
                                    <th style="width:100px">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                ?>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $data->pname }}</td>
                                        <td>{{ $data->pdescription }}</td>
                                        <td>{{ $data->pprice }}</td>
                                        <td><img src="upload/{{ $data->pimage }}" style="width: 100px" /></td>
                                        <td><a href="{{ 'productadd/' . $data->id }}">Edit</a></td>
                                        <td><a href="{{ 'productdelete/' . $data->id }}">Delete</a></td>
                                    </tr>
                                    <?php
                                    $count++;
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </section>

                </div>
        </aside>
        <div class="footer-line">
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
