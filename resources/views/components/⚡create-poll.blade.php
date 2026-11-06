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

    /**
     * Remove an option from the dynamic options list by its index.
     *
     * @param  int  $index
     * @return void
     */
    public function removeOption(int $index): void
    {
        unset($this->options[$index]);

        // Reindex array keys
        $this->options = array_values($this->options);
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
                <div class="mb-2">
                    <label>Option {{ $index + 1 }}</label>
                    <div class="mt-2 flex gap-2">
                        <input type="text" wire:model="options.{{ $index }}" />
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">
                            <span>Remove</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>
