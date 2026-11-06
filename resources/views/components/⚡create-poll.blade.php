<?php

use Livewire\Component;

new class extends Component
{
    public string $title;

    public array $options;

    /**
     * Initialize the component state.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->title = '';
        $this->options = [''];
    }

    /**
     * Append a new option row to the dynamic options list.
     *
     * @return void
     */
    public function addOption(): void
    {
        $this->options[] = '';
    }
};
?>

<div>
    <form class="my-4">
        <div class="mb-6">
            <label>Poll Title</label>
            <input type="text" wire:model.live="title"/>
        </div>

        <div class="mb-6">
            <span>Current title: {{ $title }}</span>
        </div>

        <div class="mb-6">
            <button class="btn" wire:click.prevent="addOption">
                <span>Add option</span>
            </button>
        </div>

        <div class="mb-6">
            @foreach($options as $index => $option)
                <div class="my-2">{{ $index }} - {{ $option }}</div>
            @endforeach
        </div>
    </form>
</div>
