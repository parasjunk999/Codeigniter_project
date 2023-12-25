<div class="card">
    <div class="card-body">
    <form method="post" action="<?= base_url("register"); ?>" enctype="multipart/form-data">
            <h1>Register Here</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" required type="text" class="form-control" id="name" placeholder="Enter Your Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input name="email" required type="email" class="form-control" id="email" placeholder="Enter Your Mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" required type="password" class="form-control" id="password"
                    placeholder="Enter Your Password">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Profile Picture</label>
                <input name="image" type="file" class="form-control" id="image">
            </div>

            <div class="mb-3">
                <input type="submit" value="Register" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>