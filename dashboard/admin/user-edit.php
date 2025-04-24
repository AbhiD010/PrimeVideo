<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Users
                    <a href="user.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form id="editUserForm" enctype="multipart/form-data">
                    <input type="hidden" id="userId" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control user-img" accept="image/*">
                                <img id="currentImage" src="" alt="Current Image" class="mt-2" style="max-height: 100px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Mobile No.</label>
                                <input type="text" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label>Select Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="b-3">
                                <label>Ban User</label>
                                <br />
                                <input type="checkbox" id="is_ban" name="is_ban" style="width: 30px; height: 30px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <br />
                                <button type="submit" id="updateUserBtn" class="btn btn-primary">Update</button>
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
    // Get user ID from URL query parameter
    let params = new URLSearchParams(window.location.search);
    let userId = params.get("id");

    if (userId) {
        // Fetch user details and populate form
        $.ajax({
            type: "GET",
            url: "ajax-crud/fetch-single.php",
            data: { id: userId },
            success: function (response) {
                let user = JSON.parse(response);
                if (user) {
                    $('#userId').val(user.id);
                    $('#name').val(user.name);
                    $('#mobile').val(user.mobile);
                    $('#email').val(user.email);
                    $('#password').val(user.password);
                    $('#role').val(user.role);
                    $('#is_ban').prop('checked', user.is_ban === '1');
                    if (user.image) {
                        $('#currentImage').attr('src', 'data:image/jpeg;base64,' + user.image);
                    }
                }
            }
        });
    }

    // Update user data
    $('#editUserForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "ajax-crud/update.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                window.location.href = "user.php";
            }
        });
    });
});
</script>

<?php include('includes/footer.php'); ?>
