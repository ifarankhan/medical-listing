@if ($rating)
    <span>
        @for ($i = 0; $i < 5; $i++)
            @if ($i < $rating)
                <i class="fas fa-star text-warning"></i>
            @else
                <i class="fas fa-star text-secondary"></i>
            @endif
        @endfor
        @if ($isListingsPage)
            <span class="bold">({{ $rating }})</span>
        @endif
    </span>
@endif
