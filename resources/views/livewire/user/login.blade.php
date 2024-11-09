<form wire:submit.prevent="login">
    <div>
        <Label for="name">Name</Label>
        <input type="text" id="name" wire:model="name">
        @error('name') <span class="error">{{$message}}</span>@enderror 
    </div>  
    <div>
        <Label for="password">Password</Label>
        <input type="password" id="password" wire:model="password">
        @error('password') <span class="error">{{$message}}</span>@enderror 
    </div> 
    <button type="submit">Login</button>
</form>
