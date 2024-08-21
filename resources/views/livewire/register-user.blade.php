<div>
    <form wire:submit.prevent="submit">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model="name">
            @error('name') <span class="error">{{$message}}</span> @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="text" id="password" wire:model="password">
            @error('password') <span class="error">{{$message}}</span> @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
