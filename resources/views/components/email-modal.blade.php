<!-- The Modal -->
<div class="modal" id="myModalEmail">
  <div class="modal-dialog">
    <div class="modal-content" style="padding:20px">

      <!-- Modal Header -->
      <form action="{{route('change_email')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Enter your new email</label>
          <input type="text" class="form-control" name='email' placeholder="enter your new email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name='password' id="exampleInputPassword1" placeholder="enter your password">
        </div>
        
        
      
      
      <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>