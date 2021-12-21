<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return redirect()->route('user.dashboard');
        }
        return view('welcome');
    }
    public function store(Request $request)
    {
        $data = array(
                 'fname'=>$request->fname,
                 'lname'=>$request->lname,
                 'email'=>$request->email,
                 'password'=> Hash::make($request->password),
                 'dob'=>$request->dob,
                 'gender'=>$request->gender,
                 'income'=>$request->income,
                 'occupation'=>$request->occupation,
                 'familytype'=>$request->familytype,
                 'manglik'=>$request->manglik,
                 'expectedincome'=>$request->expectedincome,
                 'occupation1'=>implode(',',$request->occupation1),
                 'familytype1'=>implode(',',$request->familytype1),
                 'manglik1'=>$request->manglik1,
             );
        $users = DB::table('users')->insert($data);
        return redirect()->route('welcome.index');
    }
    

    public function dashboard(Request $request){

        if(!Auth::user()){

            return redirect()->route('welcome.index');
        }
        else{
            if(Auth::user()->usertype=='admin'){
                return redirect()->route('admin.dashboard');
            }
        }

        $user_id = Auth::user()->id;
        $user_name = Auth::user()->fname.' '.Auth::user()->lname;

        $matched_users = User::select("*")->where('usertype','user')->where('gender','!=',Auth::user()->gender);
        
        if(Auth::user()->occupation1!=''){
            $occ_arr = explode(',', Auth::user()->occupation1);
            $matched_users = $matched_users->whereIn('occupation',$occ_arr);
        }

        if(Auth::user()->familytype1!=''){
            $fam_arr = explode(',', Auth::user()->familytype1);
            $matched_users = $matched_users->whereIn('familytype',$fam_arr);
        }

        if(Auth::user()->manglik1!=''){
            if(Auth::user()->manglik1!='Both'){
                $matched_users->where('manglik',Auth::user()->manglik1);
            }
        }


        if (Auth::user()->expectedincome!='') {
            $expected_income_arr = explode(" - ",Auth::user()->expectedincome);
            $min_expected_income = ltrim($expected_income_arr[0], '$');
            $max_expected_income = ltrim($expected_income_arr[1], '$');
            $matched_users = $matched_users->whereBetween('income', [$min_expected_income, $max_expected_income]);
        }

        $matched_user_count = $matched_users->count();
        $matched_users = $matched_users->get();

        return view('dashboard',[ 'user_id' => $user_id,'user_name'=>$user_name,'matched_users'=>$matched_users,'matched_user_count'=>$matched_user_count]);
    }

    public function adminDashboard(Request $request){

        if(!Auth::user()){
            return redirect()->route('welcome.index');
        }
        else{
            if(Auth::user()->usertype=='user'){
                return redirect()->route('user.dashboard');
            }
        }

        $user_id = Auth::user()->id;
        $user_name = Auth::user()->fname.' '.Auth::user()->lname;

        $data = $request->all();
        //print_r($data);
        
        $matched_users = User::select("*")->where('usertype','user');

        if ($request->has('gender')) {

            $matched_users = $matched_users->where('gender', $request->gender);

        }

        if ($request->has('age')) {

            $age_arr = explode(" - ",$request->has('age'));

        }

        if ($request->has('manglik')) {
            if(isset($request->manglik)){
                $matched_users = $matched_users->where('manglik1', $request->manglik);
            }
        }

        if ($request->has('familytype')) {

            $family_type_str = implode(',',$request->familytype);
            $matched_users = $matched_users->where('familytype1', 'LIKE', "%".$family_type_str."%");

        }

        if ($request->has('expectedincome')) {
            $expected_income_arr = explode(" - ",$request->expectedincome);
            $min_expected_income = ltrim($expected_income_arr[0], '$');
            $max_expected_income = ltrim($expected_income_arr[1], '$');
            $matched_users = $matched_users->whereBetween('income', [$min_expected_income, $max_expected_income]);
        }

        $matched_user_count = $matched_users->count();
        $matched_users = $matched_users->get();
        

        return view('admin_dashboard',[ 'user_id' => $user_id,'user_name'=>$user_name,'matched_users'=>$matched_users,'matched_user_count'=>$matched_user_count]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
