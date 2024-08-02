@extends('layouts.admin')
@section('content')



         <form action="{{ route('admin.events.store') }}" method="POST" id="event_form" enctype="multipart/form-data">
         @csrf
            <div class="row">
               <div class="col-md-12">
                  
                  <div class="card">
   
                     <div class="card-body">
                        <div class="row mt-4 ">
                           <div class="col-md-5">
                              <label for="Event_title" class="float-right">Event Title:</label>
                           </div>
                           <div class="col-md-5">
                              <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Enter Event Title...">
                           </div>
                        </div> <!--div end--> 
                        <div class="row mt-4 ">
                           <div class="col-md-5">
                              <label for="Event_status" class="float-right">Event Status:</label>
                           </div>
                           <div class="col-md-5">
                           <select class="form-control" name="status" id="status">
                                 <option value="1" selected="selected">Active</option>
                                 <option value="0">Inactive</option>
                           </select>
                           </div>
                        </div> <!--div end--> 
                        <div class="row mt-4 ">
                           <div class="col-md-5">
                              <label for="slug" class="float-right">Slug:</label>
                           </div>
                           <div class="col-md-5">
                              <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug...">
                           </div>
                        </div> <!--div end--> 
                        <div class="row mt-4 ">
                           <div class="col-md-5">
                              <label for="Hero_image" class="float-right">Hero Image:</label>
                           </div>
                           <div class="col-md-5">
                              <input type="file" id="hero_image" name="hero_image" value="hero_image">
                           </div>
                        </div> <!--div end--> 
         
                        <div class="row mt-4">
                           <div class="col-md-5">
                              <label for="event_description" class="float-right">Event Description:</label>
                           </div>
                           <div class="col-md-5">
                               <textarea rows="4" cols="80" id="event_description" name="event_description"></textarea>
                           </div>
                       </div>  <!--div end-->                       
                        
                        <div class="row align-items-center mt-3">
                           <div class="col-md-6">
                           </div>
                           <div class="col-md-4">
                            <button class="form-control bg-primary text-white btn-sm" id="save_btn" name="save_btn">Save</button>   
                        </div>
                           
                        </div> <!--div end-->
                        
                     </div>
   
                  </div>
   
               </div> <!--end of col-md-8-->
               
            </div><!--end of row-->
         </form>

         
@endsection

@section('scripts')
@parent

<script>

ClassicEditor.create( document.querySelector( '#event_description' ) )
   .catch( error => {
      console.error( error );
   } );


   $(document).on('keyup','#event_title',function(){
      let val = $(this).val();
      $('#slug').val(val.replace(/\s+/g, '-').toLowerCase());

   });
</script>


@endsection

