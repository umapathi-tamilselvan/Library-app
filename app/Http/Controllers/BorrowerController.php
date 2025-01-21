<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        return view('borrower.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required|max:12',
        ]);

        $borrowers =new Borrower;
        $borrowers->name = $request->name;
        $borrowers->email = $request->email;
        $borrowers->mobile_no = $request->mobile_no;
        $borrowers->save();
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->delete();

        return redirect()->back();

    }


}
