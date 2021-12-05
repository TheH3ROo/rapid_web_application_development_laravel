<div class="formcontainer">
    <form method="post" action="contact">
        @csrf
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if ($errors->has('firstname'))<strong>{{ $errors->first('firstname') }}</strong><br>@endif
        <label for="firstname">First Name</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="Your first name.." required>
    
        @if ($errors->has('lastname'))<strong>{{ $errors->first('lastname') }}</strong><br>@endif
        <label for="lastname">Last Name</label><br>
        <input type="text" id="lastname" name="lastname" placeholder="Your last name.." required>
    
        @if ($errors->has('email'))<strong>{{ $errors->first('email') }}</strong><br>@endif
        <label for="email">Email address</label><br>
        <input type="email" id="email" name="email" placeholder="Your email address.." required>
    
        <label for="message">Message</label><br>
        <textarea id="message" name="message" placeholder="Write your message here.." style="height:200px" required></textarea>
    
        <input type="submit" value="Submit">
    </form>
</div>