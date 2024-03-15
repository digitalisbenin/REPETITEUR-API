<div class="flex items-center">
    <a href="{{ route('show-demandes') }}" class="mx-2" title="Nouvelle demande"  wire:click="resetCount('demande')">
        @livewire('notification-counter', ['type' => 'demande'])
    </a>
    <a href="{{ route('show-message') }}" class="mx-2" title="Nouveau message"  wire:click="resetCount('message')">
        @livewire('notification-counter', ['type' => 'message'])
    </a>
    <a href="{{ route('show-repetiteurs') }}" class="mx-2" title="Nouveau répétiteur enregistré"  wire:click="resetCount('repetiteur')">
        @livewire('notification-counter', ['type' => 'repetiteur'])
    </a>
    <a href="{{ route('show-payements') }}" class="mx-2" title="Notification de paiement"  wire:click="resetCount('payer')">
        @livewire('notification-counter', ['type' => 'payer'])
    </a>
    {{--  <a href="{{ route('show-demandes') }}" class="mx-2" title="Nouvelle demande">  --}}

        {{--  @if($notificationCount > 0)
            <span class="badge badge-danger">{{ $notificationCount }} </span>
            @else
            <span class="badge badge-danger">0</span>
        @endif  --}}
        {{--  <span>  @livewire('notification-counter', ['type' => 'demande'])</span>
    </a>
    <a href="{{ route('show-message') }}" class="mx-2" title="Nouveau message">
        <i class="fas fa-envelope text-gray-400 "></i>
        @if($notificationCount > 0)
            <span class="badge badge-danger">{{ $notificationCount }} </span>
            @else
            <span class="badge badge-danger">0</span>
        @endif
    </a>
    <a href="{{ route('show-repetiteurs') }}" class="mx-2" title="Nouveau répétiteur enrégistré">
        <i class="fas fa-chalkboard-teacher text-gray-400 "></i>
        @if($notificationCount > 0)
            <span class="badge badge-danger">{{ $notificationCount }}</span>
            @else
            <span class="badge badge-danger">0</span>
        @endif
    </a>
    <a href="{{ route('show-payements') }}" class="mx-2" title="Notification de paiement">
        <i class="fas fa-dollar-sign text-gray-400  "></i>
        @if($notificationCount > 0)
            <span class="badge badge-danger">{{ $notificationCount }}</span>
            @else
            <span class="badge badge-danger">0</span>
        @endif
    </a>  --}}
</div>

@push('scripts')
    <script>
        Livewire.on('enableRefresh', () => {
            @this.set('refresh', 60); // Définir le rafraîchissement à 60 secondes
            @this.set('refresh', 60); // Définir le rafraîchissement à 60 secondes
        });
    </script>
@endpush
