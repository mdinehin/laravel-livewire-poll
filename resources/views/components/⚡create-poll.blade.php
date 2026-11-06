<?php

use App\Models\Poll;
use Livewire\Component;

new class extends Component
{
    public string $title = '';

    public array $options = [''];

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

    /**
     * Persist a new poll and its options to the database.
     *
     * @return void
     */
    public function createPoll(): void
    {
        Poll::create([
            'title' => $this->title,
        ])
            ->options()
            ->createMany(
                collect($this->options)
                    ->map(fn ($optionName) => [
                        'name' => $optionName,
                    ])
                    ->all()
            );

        $this->reset([
            'title',
            'options',
        ]);

        // Add an empty option row after resetting the options list
        $this->options = [''];
    }
};
?>

<div>
    <form class="my-4" wire:submit.prevent="createPoll">
        <div class="mb-6">
            <label>Poll Title</label>
            <input type="text" wire:model.live="title"/>
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

        <button type="submit" class="btn">
            <span>Create poll</span>
        </button>
    </form>
</div>
