<?php

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    /**
     * Get the list of latest polls with their options and votes.
     *
     * @return Collection<int, Poll>
     */
    #[Computed]
    #[On('poll-created')]
    public function polls(): Collection
    {
        return Poll::with('options.votes')
            ->latest()
            ->get();
    }

    /**
     * Cast a vote for the specified poll option.
     *
     * @param Option $option
     * @return void
     */
    public function castVote(Option $option): void
    {
        $option->votes()->create();
    }
};
?>

<div>
    <ul class="flex flex-col gap-6 divide-y divide-gray-200">
        @forelse($this->polls as $poll)
            <li>
                <h3 class="my-4 text-xl">&bull; {{ $poll->title }}</h3>

                <ul class="flex flex-col gap-4">
                    @foreach($poll->options as $option)
                        <li class="flex flex-row items-center gap-2">
                            <div>
                                <button class="btn"
                                    wire:click="castVote({{ $option }})"
                                >
                                    <span>Vote</span>
                                </button>
                            </div>
                            <div>{{ $option->name }}</div>
                            <div>({{ $option->votes->count() }})</div>
                        </li>
                    @endforeach
                </ul>
            </li>
        @empty
            <div class="mb-6 text-gray-500">No polls available.</div>
        @endforelse
    </ul>
</div>
