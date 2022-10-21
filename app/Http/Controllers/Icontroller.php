<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminpannel;
use App\Models\pagesummary;
use App\Models\categorysummary;
use App\Models\productsummary;
use App\Models\login;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class Icontroller extends Controller
{
    ////////////////////login////////////////////
    public function sessionForm(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $data = adminpannel::select('*')
            ->where('username', $username)
            ->where('password', $password)
            ->count();
        if ($data > 0) {
            session()->put("user_session", $username);
            return redirect('productsummary');
        } else {
            return back()->withErrors(['Invalid Credentials login not successfull']);
        }
    }

    ////////////////////page////////////////////


    //pagesummary display
    public function pagesummary()
    {
        $data = pagesummary::all();
        return view('adminpannel/pagesummary', compact('data'));
    }

    //pagesummary delete
    public function deleteform($id)
    {
        $data = pagesummary::find($id);
        $data->delete();
        return redirect('pagesummary')->with('message', 'Deleted successfully');
    }

    //pagesummary edit display
    public function editdata($id)
    {
        $data = pagesummary::where('id', $id)->get();
        return view('adminpannel/pageadd', compact('data'));
    }

    //pagesummary update data
    public function updatedata(Request $request, $id)
    {
        $rules = ['name' => 'required', 'content' => 'required',];
        $customMessages = ['required' => 'The :attribute field is required.'];
        $this->validate($request, $rules, $customMessages);

        $data = pagesummary::find($id);
        if ($request->isMethod('post')) {
            $data->name = $request->get('name');
            $data->content = $request->get('content');
            if (!empty($request->get('status'))) {
                $data->status = 1;
            } else {
                $data->status = 0;
            }
            $data->save();
        }
        return redirect('pagesummary')->with('message', 'Updated successfully');
    }

    //pagesummary insert data
    public function insertdata(Request $request)
    {
        $rules = ['name' => 'required', 'content' => 'required',];
        $customMessages = ['required' => 'The :attribute field is required.'];
        $this->validate($request, $rules, $customMessages);

        $data = new pagesummary;
        if ($request->isMethod('post')) {
            $data->name = $request->get('name');
            $data->content = $request->get('content');
            if (!empty($request->get('status'))) {
                $data->status = 1;
            } else {
                $data->status = 0;
            }
            $data->save();
        }
        return redirect('pagesummary')->with('message', 'Inserted successfully');
    }

    //pagesummary search
    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $name = $request->get('search');
            $data = pagesummary::where('name', 'LIKE', '%' . $name . '%')->get();
        }
        return view('adminpannel/pagesummary', compact('data'));
    }

    ////////////////////category////////////////////

    //category summary
    public function categorysummary()
    {
        $data = categorysummary::all();
        return view('adminpannel/categorysummary', compact('data'));
    }

    //category delete
    public function categorydelete($id)
    {
        $data = categorysummary::find($id);
        $data->delete();
        return redirect('categorysummary')->with('message', 'Deleted successfully');
    }

    //category edit display
    public function categoryedisplay($id)
    {
        $data = categorysummary::where('id', $id)->get();
        return view('adminpannel/categoryadd', compact('data'));
    }

    //category update
    public function categoryupdate(Request $request, $id)
    {
        $rules = ['catname' => 'required',];
        $customMessages = ['required' => 'Category name is required.'];
        $this->validate($request, $rules, $customMessages);

        $data = categorysummary::find($id);
        if ($request->isMethod('post')) {
            $data->categoryname = $request->get('catname');
            $data->save();
        }
        return redirect('categorysummary')->with('message', 'updated successfully');
    }

    //category search
    public function categorysearch(Request $request)
    {
        $name = $request->get('search');
        if ($request->isMethod('post')) {
            $data = categorysummary::where('categoryname', 'LIKE', '%' . $name . '%')->get();
        }
        return view('adminpannel/categorysummary', compact('data'));
    }

    //category add
    public function categoryinsert(Request $request)
    {
        $rules = ['catname' => 'required',];
        $customMessages = ['required' => 'Category name is required.'];
        $this->validate($request, $rules, $customMessages);

        if ($request->isMethod('post')) {
            $data = new categorysummary;
            $data->categoryname = $request->get('catname');
            $data->save();
        }
        return redirect('categorysummary')->with('message', 'Inserted successfully');
    }

    ////////////////////product////////////////////

    //product summary
    public function productsummary()
    {
        $data = productsummary::all();
        return view('adminpannel/productsummary', compact('data'));
    }
    // //product delete
    public function productdelete($id)
    {
        $data = productsummary::find($id);
        $image = productsummary::find($id);
        $image = $image->pimage;
        $filepath = "upload/" . $image;
        if (File::exists(public_path($filepath))) {
            File::delete(public_path($filepath));
            $data->delete();
        }
        return redirect('productsummary')->with('message', 'Deleted successfully');
    }

    //product search
    public function productsearch(Request $request)
    {
        if ($request->isMethod('post')) {
            $name = $request->get('search');
            $data = productsummary::where('pname', 'LIKE', '%' . $name . '%')->get();
        }
        return view('adminpannel/productsummary', compact('data'));
    }

    public function categorydisplayproduct()
    {
        $cdata = categorysummary::all();
        return view('adminpannel/productadd', compact('cdata'));
    }

    //product insert
    public function productinsert(Request $request)
    {
        $rules = ['catname' => 'required', 'pname' => 'required', 'pdescription' => 'required', 'pprice' => 'required', 'pimage' => 'required',];
        $customMessages = ['required' => 'All fields are required.'];
        $this->validate($request, $rules, $customMessages);

        $data = new productsummary;
        if ($request->isMethod('post')) {
            $data->category_id = $request->get('catname');
            $data->pname = $request->get('pname');
            $data->pdescription = $request->get('pdescription');
            $data->pprice = $request->get('pprice');

            if (!empty($request->file('pimage'))) {
                $file = $request->file('pimage');
                $current = uniqid(Carbon::now()->format('YmdHs'));
                $file->getClientOriginalName();
                $file->getClientOriginalExtension();
                $fullfilename = $current . "." . $file->getClientOriginalExtension();
                $filepath = public_path('upload');
                $file->move($filepath, $fullfilename);
                $data->pimage = $fullfilename;
            }
            $data->save();
        }
        return redirect('productsummary')->with('message', 'Inserted successfully');
    }

    //product update
    public function productupdate(Request $request, $id)
    {
        $rules = ['catname' => 'required', 'pname' => 'required', 'pdescription' => 'required', 'pprice' => 'required',];
        $customMessages = ['required' => 'All the fields are required.'];
        $this->validate($request, $rules, $customMessages);

        $data = productsummary::find($id);
        $image = $data->pimage;
        $filepath = "upload/" . $image;
        if (File::exists(public_path($filepath))) {
            File::delete(public_path($filepath));
            $data->delete();
            if ($request->isMethod('post')) {
                $data->category_id = $request->get('catname');
                $data->pname = $request->get('pname');
                $data->pdescription = $request->get('pdescription');
                $data->pprice = $request->get('pprice');

                if (!empty($request->file('pimage'))) {
                    $file = $request->file('pimage');
                    $current = uniqid(Carbon::now()->format('YmdHs'));
                    $file->getClientOriginalName();
                    $file->getClientOriginalExtension();
                    $fullfilename = $current . "." . $file->getClientOriginalExtension();
                    $filepath = public_path('upload');
                    $file->move($filepath, $fullfilename);
                    $data->pimage = $fullfilename;
                }
                $data->save();
            }
        }
        return redirect('productsummary')->with('message', 'Inserted successfully');
    }

    //product edit display
    public function productedit($id)
    {
        $cdata = categorysummary::all();
        $data = productsummary::where('id', $id)->get();
        return view('adminpannel/productadd', compact('data', 'cdata'));
    }

    //confirm old pass
    public function cop(Request $request)
    {
        $rules = ['oldpass' => 'required',];
        $customMessages = ['required' => 'Old Password is required. It cant be empty or null'];
        $this->validate($request, $rules, $customMessages);

        if ($request->isMethod('post')) {
            $username = $request->session()->get('user_session');
            $password = $request->get('oldpass');
            $data = login::select('*')
                ->where('username', $username)
                ->where('password', $password)
                ->first();
            $count = login::select('*')
                ->where('username', $username)
                ->where('password', $password)
                ->count();
            if ($count > 0) {
                $id = $data->id;
                return view('adminpannel/changepassword', compact('id'));
            } else {
                return back()->withErrors(['Password does not match']);
            }
        }
    }

    //create new pass
    public function cnp(Request $request)
    {
        $rules = ['newpass' => 'required',];
        $customMessages = ['required' => 'New password is required. It cant be empty or null.'];
        $this->validate($request, $rules, $customMessages);

        if ($request->isMethod('post')) {
            $id = $request->get('id');
            $data = login::find($id);
            $data->password = $request->get('newpass');
            $data->save();
        }
        return redirect('login')->withErrors('Password changed successfully');
    }
    public function index()
    {
        return view('adminpannel/index');
    }
}
