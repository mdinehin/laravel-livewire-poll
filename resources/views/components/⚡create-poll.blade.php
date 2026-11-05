<?php

use Livewire\Component;

new class extends Component
{
    public string $title = '';
};
?>

<div>
    <form>
        <label>Poll Title</label>
        <br />
        <input type="text" wire:model.live="title"/>
        <br /><br />
        Current title: {{ $title }}
    </form>
</div>
