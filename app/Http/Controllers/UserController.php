<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('Users - access')) {
            abort(403);
        }
        return view('users.index');
    }

    public function list()
    {
        if (!auth()->user()->can('Users - access')) {
            abort(403);
        }
        $request = \Request::all();
        $start = $request['start'] ?? 0;
        $length = $request['length'] ?? 10;
        $draw = isset($request['draw']) ? intval($request['draw']) : 1;
        $users = User::filter(\Request::only('search'));
        $rf = $users->count();
        $data = $users->offset($start)
                    ->limit($length)
                    ->orderBy('name')
                    ->get()
                    ->map(function ($user){
                        if (auth()->user()->can('Users - edit')) {
                            $user->actions = '<a class="btn btn-primary btn-sm" href="'.route('users.edit',$user).'"><i class="fas fa-pencil-alt"></i></a>';
                        }else{
                            $user->actions = '';
                        }
                        $user->created = $user->created_at->diffForHumans();
                        return $user;
                    });
        $resp = [
            "draw"            => $draw,
            "recordsTotal"    => User::count(),
            "recordsFiltered" => $rf,
            "data"            => $data,
        ];

        return response()->json($resp,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!auth()->user()->can('Users - edit')) {
            abort(403);
        }
        return view('users.edit')
            ->with('user', $user)
            ->with('roles', Role::orderBy('name')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->syncRoles([$request->role]);
        $request->session()->flash('status','User modified successfully!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
