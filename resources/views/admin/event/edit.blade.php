@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.update", [$events->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{$events->title}}" required>
            </div>
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control" name="status" id="status" >
                                 <option value="1" selected="selected">Active</option>
                                 <option value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label class="required" for="slug">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" value="{{$events->slug}}">
            </div>
            <div class="form-group">
                <label class="required" for="hero_image">Hero Image</label>
                <a href="{{asset($events->image)}}" target="_blank"><img src="{{asset($events->image)}}" width="30px" height="30px"/></a>
                <br><br>
                <input type="file" id="hero_image" name="hero_image">
            </div>
            <div class="form-group">
                <label for="event_description" class="float-left required">Event Description:</label><br><br>
                <textarea class="form-control" id="event_description" name="event_description"><?php echo $events['description']  ?></textarea>
          </div>  <!--div end-->     
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@parent

<script>

ClassicEditor.create( document.querySelector( '#event_description' ) )
   .catch( error => {
      console.error( error );
   } );


   $(document).on('keyup','#title',function(){
      let val = $(this).val();
      $('#slug').val(val.replace(/\s+/g, '-').toLowerCase());

   });
</script>


@endsection
