<?php 
    if(isset($request)){
        DB::table('contacts')->insert([[ 'firstname' => $request->firstname,
                                        'lastname' => $request->lastname,
                                        'email' => $request->email,
                                        'message' => $request->message,
                                        'created_at' => now()]]);
        //echo "Database write is ready.";
    }
?>

@extends('layouts.app')
@section('content')

@include('inc.form')
@endsection