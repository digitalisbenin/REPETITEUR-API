<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        @if ($type == 'demande')
            <i class="far fa-file-alt text-gray-400"></i>
        @elseif ($type == 'message')
            <i class="fas fa-envelope text-gray-400"></i>
        @elseif ($type == 'repetiteur')
            <i class="fas fa-chalkboard-teacher text-gray-400"></i>
        @elseif ($type == 'payer')
            <i class="fas fa-dollar-sign text-gray-400"></i>
        @endif

        @if ($count > 0)
        <span>{{ $count }}</span>
    @else
        <span>0</span>
    @endif
    </div>
</div>
