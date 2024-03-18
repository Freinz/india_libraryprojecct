<!DOCTYPE html>
<html>
    <head> 
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
            border-radius: 50px;
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

          @if(session()->has('message'))

          <div class="alert alert-success">
            
          <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>

            {{session()->get('message')}}
            
          </div>

          @endif

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
            <th>Delete</th>
            <th>Update</th>
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
                <img class="img_book" src="book/{{$book->book_img}}">
            </td>

            <td>
              <a onclick="confirmation(event)" href="{{url('book_delete', $book->id)}}" class="btn btn-danger">Delete</a>
            </td>
           
            <td>
              <a href="{{url('book_read', $book->id)}}" class="btn btn-info">Update</a>
            </td>

          </tr>
          @endforeach

          </table>

          </div>

            </div>
        </div>
    </div>
      
       
      @include('admin.footer')

      <script type="text/javascript">

    function confirmation(ev) {

          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);

          swal ({
            title: "Are you sure to Delete This",
            text : "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })

          .then((willCancel) => {
            if (willCancel) {
              window.location.href = urlToRedirect;
            }

          });
        }

      </script>

       
  </body>
</html>