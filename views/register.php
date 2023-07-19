<?php ?>
<h1>Register an account</h1>
<form action="" method="post">
  <div class="row">
    <div class="col">
      <label for="first_name" class="form-label">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name">
    </div>
    <div class="col">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name">
    </div>
  </div>
  <div class="mb-3">
    <label>Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label>Password confirmation</label>
    <input type="password" class="form-control" id="password_conf" name="password_conf">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>