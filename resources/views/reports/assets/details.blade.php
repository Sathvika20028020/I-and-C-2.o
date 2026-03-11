<div class="d-flex flex-column gap-3">
    <div class="d-flex row m-0">
        <div class="col-md-12 col-12 mb-3">
            <span class="d-flex flex-row gap-1" style="font-size:15px">
                <span><b>District Name:</b> </span>
                <span>{{$district->name}}</span>
            </span>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <span class="d-flex flex-row gap-1" style="font-size:15px">
                <span><b>Category:</b> </span>
                <span>{{$category->name}}</span>
            </span>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <span class="d-flex flex-row gap-1" style="font-size:15px">
                <span><b>Subcategory:</b> </span>
              <span>{{$subcategory->name}}</span>
            </span>
        </div>
    </div>
    <div class="d-flex flex-column gap-2">
      @foreach($inventories as $inventory)
        {{$loop->iteration}}) <table class="table table-bordered mb-0">
            <tbody>
              @foreach($inventory as $key => $item)
                @if(in_array($key, ['latitude','longitude']))
                <tr>
                    <th scope="row" style="width: 50%;background:#dadded">{{ucfirst($item->type)}}:</th>
                    <td>{{$item->answer}}</td>
                </tr>
                @elseif(in_array($key, ['images']))
                @foreach($item as $image)
                <tr>
                    <th scope="row" style="width: 50%;background:#dadded">{{ $image->type . ' ' . $loop->iteration }}:</th>
                    <td><img height="100" src="{{ asset('/uploads/assets/'.$image->answer) }}" alt=""></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th scope="row" style="width: 50%;background:#dadded">{{$item->question->question}}:</th>
                    <td>{{$item->answer}}</td>
                </tr>
                @endif
              @endforeach
            </tbody>
        </table>
      @endforeach
    </div>
</div>