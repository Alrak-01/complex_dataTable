 <th scope="col" class="px-4 py-3" wire:click="sort('{{$name}}')">
    <span>
    {{$displayName}}
    @if($sortedBy == $name && $sortedOrder == "ASC")
        <i class="fa-solid fa-sort-up"></i>
    @elseif($sortedBy == $name && $sortedOrder != "ASC")
        <i class="fa-solid fa-sort-down"></i>
    @else
        <i class="fa-solid fa-sort"></i>
    @endif
    </span>
</th>