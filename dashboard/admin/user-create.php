<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Users
                    <a href="user.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form id="userForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="error-msg"></div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Upload Image</label>
                                <input type="file" id="image" name="image" class="form-control image" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Mobile No.</label>
                                <input type="text" id="mobile" name="mobile" class="form-control mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label>Select Role</label>
                                <select name="role" class="form-select role">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <button type="submit" name="saveuser" class="btn btn-primary save-btn">Save</button>
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#userForm').on('submit', function (e) {
            e.preventDefault();
            
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "user-store.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (response.includes("Successfully Stored")) {
                        alert("User added successfully!");
                        location.reload();
                    } else {
                        alert("Failed to add user: " + response);
                    }
                },
                error: function () {
                    alert("An error occurred while saving the user.");
                }
            });
        });
    });
</script>

<?php include('includes/footer.php'); ?>
