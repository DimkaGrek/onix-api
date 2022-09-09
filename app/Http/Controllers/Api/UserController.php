<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the Users with count of Posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function UsersWithPosts()
    {
        return User::addSelect(['count_posts' => Post::select(DB::raw('count(id) as posts'))
                ->whereColumn('user_id', 'users.id')
            ])->get();
    }

    public function profile(User $user)
    {
        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('startDate') and $request->has('endDate')) return User::where('created_at', '>', $request->startDate)
            ->where('created_at', '<', $request->endDate)
            ->paginate();
        elseif($request->has('keywords')) return User::where('email', 'LIKE', '%'.$request->keywords.'%')->get();
        else return User::orderBy('created_at')->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
           'name' => $request->name,
           'email' => rand(0, 10000)."@gmail.com",
           'password' => bcrypt('password'), //'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
        ]);

        /** @var Carbon $date */
        $date = $user->email_verified_at;
        dd($date->dayName);

        return $user->getAttributes();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): \Illuminate\Http\Response|User
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
