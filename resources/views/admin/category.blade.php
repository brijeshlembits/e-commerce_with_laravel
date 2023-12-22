<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dark Bootstrap Admin </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  
  @include('admin.css')
  
</head>

<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sliderbar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Category</h2>
        </div>
      </div>
      <!-- @if($mess=session()->has('massage'))
      <div class="alert alert-success">
        {{$mess}}
      </div>
      @endif -->
      <div class="col-lg-6">
        <div class="block">
          <div class="title"><strong class="d-block">Category Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
          <div class="block-body">

            <form id="myForm" action="{{route('admin/add_category')}}" method="post">
              <div class="form-group">
                @csrf
                <label class="form-control-label">Category Name</label>
                <input type="text" name="name" placeholder="Enter a Category Name" id="category" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="block margin-bottom-sm local">
              <div class="title"><strong>Category Table</strong></div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1 ?>
                    @foreach($model as $models)
                    <tr>
                      <th scope="row">{{$count++}}</th>
                      <td>{{$models->category_name}}</td>
                      <td><a href="{{route('admin/delete',$models->id)}}" class="btn btn-primary">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- JavaScript files-->
      @include('admin.script')
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
  // Example SweetAlert code
  document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevents the default form submission


        // Perform AJAX request
        $.ajax({
          type: 'post',
          url: '{{Route("admin/add_category")}}',
          next: 'refresh',
          data: {
            _token: '{{ csrf_token() }}',
            category_name: $('#category').val()
          },

          success: function(response) {
            if (response.status === 1) {
              swal("Success!", response.message, "success").then(() => {
                // Refresh the current page
                location.reload();
              });
            } else {
              // Handle errors
              swal("Error!", response.message, "error");
            }
          },

          // Show SweetAlert success message
        });
  });
</script>