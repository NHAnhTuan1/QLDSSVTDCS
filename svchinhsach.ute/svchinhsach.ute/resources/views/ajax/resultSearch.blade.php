@foreach ($loaichinhsach as $item)
    
    <div class="col-md-6">
        <div class="card mb-3" >
            <div class="text-center">
                <i style="font-size: 150px" class="fas fa-graduation-cap"></i>
            </div>
            <div class="card-body">
                <h4 class="card-title" style="font-size: 20px;font-weight: 600;">{{ $item->dt_ten }}</h4>
                <a target="_blank" href="{{ route('get.detail.dt', [Str::slug($item->dt_ten),$item->id]) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
    </div>
    <!--End col4-->
@endforeach