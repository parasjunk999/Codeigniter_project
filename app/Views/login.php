<div class="card">
    <div class="card-body">
        <form method="post" action="<?= base_url("login"); ?>">
        <h1>Login Here</h1>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email Address</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
        <input name="password" type="text" class="form-control" id="password" placeholder="eg:12345678">
        </div>
        <div class="mb-3"><input type = "submit" value="Login" class ="btn btn-primary"/></div>
</form>
</div>
</div>