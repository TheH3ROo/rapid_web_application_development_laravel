@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="https://www.musicislandonline.com/wp-content/uploads/2015/06/Music-Island-985x430.jpg" alt="">
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container text-center" href="https://zenesziget.hu/">
                        <h1>
                            <a href="https://zenesziget.hu/">Official page of Zenesziget</a>
                        </h1>
                    </div>
                    <p>
                        We offer the following lessons:
                        <ul>
                            <li>Guitar</li>
                            <li>Bass guitar</li>
                            <li>Piano</li>
                            <li>Drums</li>
                            <li>Singing</li>
                            <li>Flute</li>
                            <li>Music preparation for preschoolers from the age of 4</li>
                        </ul>
                    </p>
                    <p style="text-align:center">
                        <img src="https://zenesziget.hu/images/stories/mariann/kzs%20kp.jpg">
                    </p>
                    <p>
                        Mobile:
                        <ul>
                            <li><b>Mics Mariann:</b> 06-20-558-69-51</li>
                            <li><b>Mics Mihály:</b> 06-20-350-59-50</li>
                        </ul>
                    </p>
                    <p>                        
                        Email address: zenesziget@zenesziget.hu
                    </p>
                    <p>
                        Address: 2310 Szigetszentmiklós, Tölgyfa u. 20.                    
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container mx-auto p-4 text-center">
        <p>&copy Péter Rab | Rapid web application development</p>
    </div>
</footer>
@endsection
