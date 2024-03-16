<!DOCTYPE html>
<html>
    <head> 
    @include('admin.css')

    <style>
        
        .table_center {
            text-align: center;
            margin: auto;
            border: 1px solid yellowgreen;
            margin-top: 50px;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size:20px;
            font-weight: bold;
            color: black;
        }

        .img_auther {
            width : 50px;
            border_radius: 50%;
        }

        .img_book {

            width: 150px;
            height: auto;

        }

    </style>
    </head>
  <body>
    @include('admin.header')  

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- body -->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div>

          <table class="table_center">

          <tr>
            <th>Book Title</th>
            <th>Auther Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Category</th>
            <th>Auther Image</th>
            <th>Book Image</th>
          </tr>

          @foreach($book as $book)
          <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->auther_name}}</td>
            <td>{{$book->price}}</td>
            <td>{{$book->quantity}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->category->cat_title}}</td>
            <td>
                <img class="img_auther" src="auther/{{$book->auther_img}}">
            </td>
            <td>
                <img class="img_book" src="book/{{$book->auther_img}}">
            </td>
          </tr>
          @endforeach

          </table>

          </div>

            </div>
        </div>
    </div>
      
       
      @include('admin.footer')

       
  </body>
</html>