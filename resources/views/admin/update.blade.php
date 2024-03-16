<!DOCTYPE html>
<html>
    <head> 
    @include('admin.css')

    <style text="text/css">

        .div_desain {
            text-align: center;
            margin: auto;
        }

        .title_desain {
            color: white;
            padding: 20px;
            font-size: 25px;
            font_weight: bold;
        }

    </style>

    </head>
  <body>
    @include('admin.header')  
    
    
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Body Session-->
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
             
          <div class="div_desain">
            <h2 class="title_desain">Update Category</h2>  

            <form action="{{url('cat_update', $data->id)}}" method="Post">

            @csrf

                <label for="">Category Name</label>
                <input type="text" name="cat_name" value="{{$data->cat_title}}">
                <input type="submit" class="btn btn-info" value="Update">
            </form>
          </div>

       
      @include('admin.footer')

          </div> 
       </div> 
    </div> 
       
  </body>
</html>
    
