<x-slot name="header">
    <h2 class="text-center font-semibold text-sm text-gray-800 leading-tight">Mail Trap</h2>
    
</x-slot>

        <form action="/sendNotification" method="post">
            @csrf
            <br> 
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div>
            <label>email</label><br>
            <input class="form-control" name="email"></div>
            <br>
            <div>
                <label>your name</label><br>
                <input class="form-control" name="username"></div><br>
                
            <div>
                <label>to</label><br>
                <input class="form-control" name="name"></div><br>
            
            <div>
                    <label>subject</label><br>
                    <input class="form-control" name="subject"></div><br>
            
            <div>
                <label>message</label><br>
                <textarea class="form-control" name="msg"></textarea></div><br>
            <div><button class="btn btn-success" type="submit">send</button></div>
         </form> 