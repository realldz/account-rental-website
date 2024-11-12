<div class="header-vertical-menu__fly-out has-shadow">
    <div class="row row-full-width" id="row-897309601">
        <div id="col-1741329540" class="col medium-4 small-12 large-12">
            <div class="col-inner">
                <div id="text-1245290196" class="text menu-title">
                    <p>Danh mục</p>
                </div>
                <div class="row padding-bot" id="row-1675380231">
                    @php
                        $categories = \App\Models\Category::whereStatus(1)->take(36)->get();
                    @endphp
                    @foreach ($categories as $category)
                        @if ($loop->first || $loop->index % 6 === 0)
                            <div id="col-1598733659" class="col medium-5 small-12 large-2">
                                <div class="col-inner">
                                    <ul>
                        @endif
                        <li><a href="{{ route('search', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                        @if (($loop->index + 1) % 6 === 0 || $loop->last)
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
        </div>
        </div>
        </div>
    </div>
</div>
