<div x-data="{test:false}">
    <h1>Livewire tests</h1>
    <hr/>
    <div>
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
    </div>


    <h1>Alpine tests</h1>
    <hr/>

    <div>


        <h2 x-text="'ABC: ' + test"></h2>

        <h2 x-show="test">Show y/n?</h2>

        <button class="btn btn-secondary" x-on:click="console.log('ABC TEST');">TEST Log</button>
        <br/>

        <button class="btn btn-primary" x-on:click="test=!test">Toggle Test</button>
        <br/>

    </div>

</div>
