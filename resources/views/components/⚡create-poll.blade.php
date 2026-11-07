<?php

use App\Models\Poll;
use Livewire\Component;

new class extends Component
{
    public string $title = '';

    public array $options = [''];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255',
    ];

    // Replace raw array indices with user-friendly names in validation errors
    protected array $validationAttributes = [
        'options.*' => 'option',
    ];

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
     * Run after any property on the component is updated.
     *
     * @param  string  $propertyName
     * @return void
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Persist a new poll and its options to the database.
     *
     * @return void
     */
    public function createPoll(): void
    {
        $this->validate();

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
    <form class="mb-4 flex flex-col gap-6" wire:submit.prevent="createPoll">
        <div>
            <label class="mt-4">Poll title</label>
            <input type="text" wire:model.live="title"/>
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button class="btn" wire:click.prevent="addOption">
                <span>Add option</span>
            </button>
        </div>

        <ul class="flex flex-col gap-4">
            @foreach($options as $index => $option)
                <li>
                    <label>Option {{ $index + 1 }}</label>
                    <div class="flex flex-row gap-2">
                        <input type="text" wire:model.live="options.{{ $index }}" />
                        <button class="btn" wire:click.prevent="removeOption({{ $index }})">
                            <span>Remove</span>
                        </button>
                    </div>
                    @error("options.{$index}")
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </li>
            @endforeach
        </ul>

        @error('options')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div>
            <button type="submit" class="btn">
                <span>Create poll</span>
            </button>
        </div>
    </form>
</div>
