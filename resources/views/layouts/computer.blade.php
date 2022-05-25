<div class="mt-4 container-md" id="search-module">
    {{--  search operation      --}}
    <div class="row">
        <form method="GET" action="{{route('index.rental')}}">
            <div class="input-group">
                <input name="brand" type="search" class="form-control rounded" placeholder="Computer Band, like: Apple"
                       value='{{request()->input('brand')}}' aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div>
        </form>
    </div>

    <div class="row row-cols-3 text-center">
        {{-- show in stock computers   --}}
        @foreach($computers as $pc)
            <div class="col gy-3">
                <div class="card">
                    <img src = "{{$pc->picture}}"
                         class="card-img-top" alt = "{{$pc->name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$pc->name}}</h5>
                        <p class="card-text">{{$pc->name}}.{{$pc->os}}.{{$pc->DISP_size}}</p>
                        <p class="card-text">{{$pc->rent}} / hour</p>
                        <a href="{{route('detail.rental').'?ID='.$pc->id}}" class="btn btn-dark stretched-link">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
