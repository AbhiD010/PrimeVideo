<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    User Lists
                    <a href="./user-create.php" class="btn btn-primary float-end add-btn">Add Users</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr >
                            <th>ID</th>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody class="userdata" id="user-" name="userId">
                        <!-- <tr>
                            <td>2</td>
                            <td>name</td>
                            <td>email</td>
                            <td>phone</td>
                            <td>
                                <a href="user-edit.php" class="btn btn-success btn-sm">Edit</a>
                                <a href="user-delete.php" class="btn btn=danger btn-sm mx-2">Delete</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function () {
        // console.log('hello');
       getdata();

    //    $(document).on("click",".edit-btn" function () {
          
    //     $.ajax({
    //             type: "POST",
    //             url: "user-edit.php",
    //             data: {
    //                 'checking_view': true,
    //             },
    //             success: function (response) {
    //                 console.log(response);
    //             }
    //         });
    //    });

    $(document).on("click", ".delete-btn", function () {
            let userId = $(this).data("id");
            console.log("Deleting user with ID:", userId);

            if (confirm("Are you sure you want to delete this user?")) {
                $.ajax({
                    type: "POST",
                    url: "user-delete.php", // Server-side script to handle deletion
                    data: { id: userId },
                    success: function (response) {
                        console.log("Server Response:", response);
                        let res = JSON.parse(response);
                        if (res.status === "success") {
                            alert(res.message);
                            $("#user-" + userId).remove();
                        } else {
                            alert(res.message);
                        }
                    },
                    error: function () {
                        alert("An error occurred while deleting the user.");
                    },
                });
            }
        });
      
    });
    function getdata()
    {
        $.ajax({
            type: "GET",
            url: "ajax-crud/fetch.php",
            success: function (response) {  
                // console.log(response);
                $.each(response, function (key, value) { 
                     $('.userdata').append('<tr id="user-' + value['id'] + '">'+
                            '<td>'+value['id']+'</td>\
                            <td><img src="data:image/jpeg;base64,' + value['image'] + '" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;"></td>\
                            <td>'+value['name']+'</td>\
                            <td>'+value['email']+'</td>\
                            <td>'+value['mobile']+'</td>\
                            <td>'+value['password']+'</td>\
                            <td>'+value['role']+'</td>\
                            <td>\
                                <a href="user-edit.php?id='+value['id']+'" class="btn btn-success btn-sm edit-btn">Edit</a>\
                                <button data-id="'+value['id']+'" class="btn btn-danger btn-sm delete-btn">Delete</button>\
                            </td>\
                        </tr>');
                });
            },
            error: function () {
                alert("An error occurred while fetching user data.");
            },
        });
    }

    $(document).on("click", ".edit-btn", function () {
    let userId = $(this).data("id");
    $.ajax({
        type: "GET",
        url: "ajax-crud/fetch-single.php",
        data: { id: userId },
        success: function (response) {
            let user = JSON.parse(response);
            if (user) {
                // Redirect to the edit page with user ID as a query parameter
                window.location.href = "user-edit.php?id=" + user.id;
            }
        }
    });
});

</script>

    

<?php include('includes/footer.php'); ?>


