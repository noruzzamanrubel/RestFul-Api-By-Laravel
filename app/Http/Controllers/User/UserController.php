<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return $this->showAll( $user );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $validated = $request->validate( [
            'name'     => 'required|max:255',
            'email'    => 'required|unique:users|max:255',
            'password' => 'required|confirmed|max:255',
        ] );

        $data                       = $request->all();
        $data['name']               = $request->name;
        $data['email']              = $request->email;
        $data['password']           = Hash::make( $request->password );
        $data['varified']           = User::UNVARIFIED_USER;
        $data['varification_token'] = User::generateVerificationCode();
        $data['admin']              = User::REGULAR_USER;

        $user = User::create( $data );
        return $this->showOne( $user, 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( User $user )
    {
        return $this->showOne( $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {

        // $user = User::findOrFail( $id );

        // $validated = $request->validate( [
        //     'email'    => 'required|unique:users,email' . $user->id,
        //     'password' => 'required|confirmed|max:255',
        //     'admin'    => 'in:' . User::ADMIN_USER . User::REGULAR_USER,
        // ] );

        // if ( $request->has( 'name' ) ) {
        //     $user->name = $request->name;
        // }

        // if ( $request->has( 'email' ) && $user->email != $request->email ) {
        //     $user->varified           = User::UNVARIFIED_USER;
        //     $user->varification_token = User::generateVerificationCode();
        //     $user->email              = $request->email;
        // }

        // if ( $request->has( 'password' ) ) {
        //     $user->password = Hash::make( $request->password );
        // }

        // if ( $request->has( 'admin' ) ) {

        //     if ( ! $user->isVarified() ) {
        //         return response()->json( [
        //             'error' => 'Only Varified User can modify the admin field',
        //             'code'  => 409,
        //         ], 409 );
        //     }

        //     $user->admin = $request->admin;
        // }

        // if ( ! $user->isDirty() ) {
        //     return response()->json( [
        //         'error' => 'You need to specify a different value to update',
        //         'code'  => 422,
        //     ], 422 );
        // }

        // $user->save();

        // return response()->json( [
        //     'message' => 'Your data is successfully updated !',
        //     'data'    => $user,
        // ], 200 );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {

        $user = User::findOrFail( $id );
        $user->delete();
        return $this->showOne( $user );

    }

}
