<?php ?>
<h1>Login</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject">
  </div>

  <div class="mb-3">
    <label>Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="body">Message body</label>
    <textarea class="form-control" id="body" name="body"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>