@extends('layouts.adm')

@section('title','TYPES PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('message.category')}}</th>
                        <th scope="col">{{__('message.type')}}</th>
                        <th scope="col">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i<count($types); $i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>
                                @foreach($category as $cat)
                                @if($types[$i]->category_id == $cat->id )
                                    {{$cat->category}}
                                @endif
                                @endforeach
                            </td>
                            <td>{{$types[$i]->type}}</td>
                            <td>
                                <form action="{{route('adm.types.destroy',$types[$i]->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">{{__('message.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>

                <form action="{{route('adm.types.store')}}" method="post">
                    @csrf
                    {{__('message.category')}}:
                    <select  class="form-control @error('category_id')is-invalid @enderror " id="selectInput" name="category_id">
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="type" placeholder="Input new type" class="form-control">
                    <button type="submit" class="btn btn-primary">{{__('message.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
