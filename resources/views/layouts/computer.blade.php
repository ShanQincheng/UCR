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
                <img src = "{{$pc->picture}}"
                     class="img-fluid img-detail" alt = "{{$pc->name}}">
                <h2>{{$pc->name}}</h2>
                <p class="small-gap">{{$pc->name}}.{{$pc->os}}.{{$pc->DISP_size}}</p>
                <p class="small-gap">{{$pc->rent}} / hour</p>
            </div>
        @endforeach
    </div>
</div>
</div>
