<ul>
    @foreach($children as $child)
        <li>
            <a href="{{route('reports.caractor', $child->id)}}">
                {{ $child->name }}
            </a>
            @if(count($child->children))
                @include('partials.report.manage_child',['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>