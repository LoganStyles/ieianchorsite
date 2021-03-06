<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * show administrators & other users
     */
    public function index() {
        $users = DB::table('users')
                ->leftjoin('userimages', 'users.id', '=', 'userimages.itemid')
                ->leftjoin('roles', 'users.role', '=', 'roles.id')
                ->select('users.*', 'roles.title as role_title', 'userimages.filename', 'userimages.itemid as imageid', 'userimages.alt', 'userimages.caption', 'userimages.main')
                ->where('users.role', '>', 1)
                ->orderBy('users.id', 'asc')
                ->get();
        $arrays = [];
        foreach ($users as $object) {
            $arrays[] = (array) $object;
        }
        return view('/templates/users', ['users' => $arrays, 'page_name' => 'personnel']);
    }

    public function showUserGroups() {
        $usergroups = DB::table('roles')
                ->where('id', '>', 1)
                ->orderBy('id', 'asc')
                ->get();
        $arrays = [];
        foreach ($usergroups as $object) {
            $arrays[] = (array) $object;
        }
        return view('/templates/roles', ['usergroups' => $arrays, 'page_name' => 'role']);
    }

    public function processUserGroups(Request $request) {

        if ($request['id'] > 0) {

            Role::where('id', $request['id'])->update([
                'title' => $request['title'],
                'description' => trim($request['description']),
                'users' => $request['users'],
                'roles' => $request['roles'],
                'management' => $request['management'],
                'board' => $request['board'],
                'newsitem' => $request['newsitem'],
                'testimonial' => $request['testimonial'],
                'service' => $request['service'],
                'about' => $request['about'],
                'reports' => $request['reports'],
                'delete_group' => $request['delete_group']
            ]);
        } else {
            $this->validate($request, [
                'title' => 'required|unique:roles'
            ]);
            //insert aboutitems
            $role = new Role();
            $role->title = $request['title'];
            $role->description = trim($request['description']);
            $role->users = $request['users'];
            $role->roles = $request['roles'];
            $role->management = $request['management'];
            $role->board = $request['board'];
            $role->newsitem = $request['newsitem'];
            $role->testimonial = $request['testimonial'];
            $role->service = $request['service'];
            $role->about = $request['about'];
            $role->reports = $request['reports']; 
            $role->delete_group = $request['delete_group'];
            $role->save();
        }
        return redirect()->route('show_usergroups');
    }

    /* create a user based on selected role */

    public function postCreateUser(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'firstname' => 'required|max:120',
            'lastname' => 'required|max:120',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->name = $request['firstname'] . " " . $request['lastname'];
        $user->password = bcrypt($request['password']);

        $user->save();

        return redirect()->route('show_users');
    }

    /* confirm that email & password exist,
     * get role for this user
     * store role data in session
     */

    public function postLoginUser(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['password' => $request['password']], ['email' => $request['email']])) {
            //get role & store in session
            $user = DB::table('users')
                    ->leftjoin('roles', 'users.role', '=', 'roles.id')
                    ->select('users.name', 'users.email', 'roles.*')
                    ->where('users.email', '=', $request['email'])
                    ->limit(1)
                    ->get();
            session(['users_fullname' => $user[0]->name]);
            session(['users_email' => $user[0]->email]);
            session(['users' => $user[0]->users]);
            session(['delete_group' => $user[0]->delete_group]);
            session(['roles' => $user[0]->roles]);
            session(['management' => $user[0]->management]);
            session(['board' => $user[0]->board]);
            session(['newsitem' => $user[0]->newsitem]);
            session(['testimonial' => $user[0]->testimonial]);
            session(['service' => $user[0]->service]);
            session(['about' => $user[0]->about]);
            session(['reports' => $user[0]->reports]);
            
            $arrays = [];
            foreach ($user as $object) {
                $arrays[] = (array) $object;
            }
            //GET unit prices
            $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
            
            return view('/templates/dashboard', 
                    ['userinfo' => $arrays,
                    'prices'=>$latest_prices,
                     'page_name' => 'dashboard'
                     ]);
        }
        return redirect()->back();
    }

    /* display the dashboard */

    public function getDashboard() {
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        //print_r($latest_prices);exit;
        return view('/templates/dashboard',['prices' => $latest_prices]);
    }
    
    /* display roles in create administrator page */

    public function createAdmin() {
        $users = DB::table('roles')
                ->select('*')
                ->where('id', '>', 1)
                ->orderBy('id', 'asc')
                ->get();
        $arrays = [];
        foreach ($users as $object) {
            $arrays[] = (array) $object;
        }
        return view('/create_user', ['roles' => $arrays]);
    }

    /* logout user & show login page */

    public function logoutUser(Request $request) {
        Auth::logout();
//        $request->session()->flush();
        return redirect()->route('login');
    }

}
