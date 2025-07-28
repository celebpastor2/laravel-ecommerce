<div>
    {{-- In work, do what you enjoy. --}}
    <style>

        .btn {
            background:#333;
            padding:5px;
            color: #ddd;
        }
        .btn.disabled {
            background:#3333;
            color: #ccd;
        }
    </style>
    <div>
        <label>Enter a Value</label>
        <input wire:model="input"  value="" />
        <div wire:model="data">{{$data}}</div>
    </div>
    <div>
    <button class="btn" wire:click="oninput" class="{{ $class }}">{{$submit}}</button>
    </div>

    <div>{{$input}}</div>
    
</div>
