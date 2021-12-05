<?php
if (!Auth::check()) echo "Not logged in";
else{
    echo "Logged in<br>";
    echo "ID: ".Auth::user()->id."<br>";
    echo "Name: ".Auth::user()->name."<br>";
    echo "Email: ".Auth::user()->email."<br>";
}
