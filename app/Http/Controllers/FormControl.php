<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Recenzja;
use App\Models\Comment;
use Symfony\Component\VarDumper\VarDumper;

class FormControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategorie');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review = new Recenzja;
        return view('formularz',['review' => $review]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'message' => 'required|min:10|max:255',
        ]);

        if( Auth::user() == null){
            return view('welcome');
        }

        $pomocnicza = Recenzja::whereHas('user', function ($query) use($request) { $query->where('title', 'like', '%'.$request->title.'%');})->get();
        foreach($pomocnicza as $object)
        {
        if($object->user_id == Auth::user()->id){
            return redirect()->back()->with('alert', 'Dziękujemy za twój entuzjazm ale już dodałeś recenzję tego filmu!');
        }
        }
        $review = new Recenzja();
        $review->user_id = Auth::user()->id;
        $review->message = $request->message;
        $review->title = $request->title;
        $review->grade = $request->grade;
        if($review->save())
        {
            return redirect('category');
        }
        return view('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Recenzja::find($id);
        if(Auth::user()->id != $review->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger','message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        return view('formularzEdit', ['review'=>$review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Recenzja::find($id);
        if(Auth::user()->id != $review->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger','message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        $pomocnicza = Recenzja::whereHas('user', function ($query) use($request) { $query->where('user_id', Auth::user()->id );})->get();

        foreach($pomocnicza as $object)
        {
            if($object->title != $review->title && $object->title == $request->title){
                return redirect()->back()->with('alert', 'Dziękujemy za twój entuzjazm ale już dodałeś recenzję tego filmu!');
             }
        }
        $review->message = $request->message;
        $review->title = $request->title;
        $review->grade = $request->grade; 
        if($review->save())
        {
            return redirect()->route('category');
        }
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Recenzja::find($id);
        if(Auth::user()->id != $review->user_id)
        {
            return back();
        }
        if($review->delete()){

            return back();
        }
        else return back();
    }

    public function show_category($id_title)
    {
        $reviews = Recenzja::whereHas('user', function ($query) use($id_title) { $query->where('title', 'like', '%'.$id_title.'%');})->get();
        return view('recenzje', ['reviews'=>$reviews]);
    }

    public function profil()
    {
        return view('profil');
    }

    public function password_form()
    {
        return view('hasloEdit');
    }

    public function password_change(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if(!(Hash::check($request->get('current_password'),$user->password)))
        {
            return redirect()->back()->with("error","Twoje obecne hasło nie pasuje do hasła podanego w formularzu.");
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with("error","Nowe i stare hasło są takie same.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        $user->password = bcrypt($request->get('new_password'));
        if($user->save())
        {
            return redirect()->route('profil')->with("success","Hasło zostało zmienione");
        }
    }
}
