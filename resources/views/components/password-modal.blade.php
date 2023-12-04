<!-- The Modal -->
<div class="modal" id="myModalPassword">
  <div class="modal-dialog">
    <div class="modal-content" style="padding:20px">

      <!-- Modal Header -->
      <form action="{{route('change_password')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Enter your new password</label>
          <input type="password" class="form-control" name='new_password' placeholder="enter your new password">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Confirm your new password</label>
          <input type="password" class="form-control" name='confirm_password' placeholder="confirm your new password">
        </div>


        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Enter your old password</label>
          <input type="password" class="form-control" name='password' id="exampleInputPassword1" placeholder="enter your old password">
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