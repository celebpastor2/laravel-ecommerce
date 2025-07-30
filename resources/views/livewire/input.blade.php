<div>
    <style>
        .btn {
            background:#333;
            padding:5px;
            color: #ddd;
        }
        .btn.disabled {
            background:#3333;
            color: #ccd;
            cursor: not-allowed;
        }
    </style>
    <form wire:submit.prevent="oninput">
        <div>
        <label>Enter a Value</label>
        <input wire:model.live.debounce.500ms="firstName" type="text" />
        @error('firstName') <span class="error">{{$message}}</span>@enderror
    </div>

     <div>
        <label>Enter your last Name</label>
        <input wire:model.live.debounce.500ms="lastName" type="text" />
          @error('lastName') <span class="error">{{$message}}</span>@enderror
    </div>
    
    <div>
        <label>Email</label>
        <input type="email" wire:model.live.debounce.500ms="email">
        @error('email') <span class="error">{{$message}}</span>@enderror
    </div>

     <div>
        <label>Password</label>
        <input type="password" wire:model.live.debounce.500ms="password">
        @error('password') <span class="error">{{$message}}</span>@enderror
    </div>
    
    <div>
        <label>Phone</label>
        <input type="tel" wire:model.live.debounce.500ms="phone">
        <small>Format: 123-456-7890</small>
        @error('phone') <span class="error">{{$message}}</span> @enderror
    </div>
    
    <div>
        <button wire:click="oninput" class="{{ $class }}" 
                wire:loading.attr="disabled">
           <span wire:loading.remove>Submit</span>
           <span wire:loading >Submitting</span>
        </button>
    </div>
    </form>
    

    <div>Current Input: {{ $input }}</div>
</div>