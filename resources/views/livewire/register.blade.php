<form wire:submit.prevent="register">
    <div>
        <Label for="name">Name</Label>
        <input type="text" id="name" wire:model="name">
        @error('name') <span class="error">{{$message}}</span>@enderror 
    </div>  

    <div>
        <Label for="email">Email</Label>
        <input type="text" id="email" wire:model="email">
        @error('email') <span class="error">{{$message}}</span>@enderror 
    </div> 
    <div>
        <Label for="password">Password</Label>
        <input type="password" id="password" wire:model="password">
        @error('password') <span class="error">{{$message}}</span>@enderror 
    </div>  
    <div>
        <Label for="password_confirmation">Confirm_Password</Label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation">
        @error('password_confirmation') <span class="error">{{$message}}</span>@enderror 
    </div>   
    
    <button type="submit">Register</button>
</form>
