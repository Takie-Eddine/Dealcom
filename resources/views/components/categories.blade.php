<ul>
    @forelse ($categories as $category)
        <li>
            <x-categories-tree :category="$category" />
        </li>
    @empty
    @endforelse
</ul>
