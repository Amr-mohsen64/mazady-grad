$(function () {
    // insert record function 
    addNewMember();
    viewMembers();
    editMember();
    updateMember();
    deleteMember();
    activateMember();
});

// email function validaton
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

function addNewMember() {

    $(document).on('submit', '#addNewMember', function (e) {
        e.preventDefault();
    })
    $(document).on('click', '#addMemberBtn', function () {
        var userName = $('#user_name').val(),
            email = $('#user_mail').val(),
            fullName = $('#full_name').val(),
            password = $('#password').val();

        if (userName == '' || email == '' || fullName == ' ' || fullName == '' || password == '') {
            swal("please fill all inputs", " ", "error");
        } else if (userName.length < 3) {
            swal("user Name Must be more than 3 letters ", " ", "error");
        } else if ((IsEmail(email)) == false) {
            swal("enter valid email", " ", "error");
        } else {
            $.ajax({
                url: 'insertMembers.php',
                method: 'post',
                data: {
                    uName: userName,
                    uEmail: email,
                    uFullName: fullName,
                    uPassword: password
                },
                success: function (data) { // get data from the server
                    swal("1 Member added!", " ", "success");
                    $('#message').html(data);
                    $('#addNewMember').trigger("reset");
                    viewMembers()
                }
            });
        }
    });

    // $(document).on('click',function(e){
    //     $('#addNewMember').trigger("reset");
    // });  
    // $('#message').html('');

}

// display record

function viewMembers() {
    $.ajax({
        url: 'viewmembers.php',
        method: 'post',
        success: function (data) { // get data from the server
            $('#manage-table').html(data)
        }
    });
}

// edit Member function

function editMember() {
    $(document).on('click', '#editMember-btn', function () {
        var userID = $(this).attr('data-id');
        $.ajax({
            method: 'POST',
            url: 'editmember.php',
            data: {
                userid: userID
            },
            success: function (data) {
                var myObj = JSON.parse(data);
                $('#Up_UserName').val(myObj[0].userName);
                $('#Up_User_Email').val(myObj[0].email);
                $('#Up_User_FullName').val(myObj[0].fullName);
                $('#Up_User_ID').val(myObj[0].userID);
            }
        });
    });
}

// update memebr :

function updateMember() {

    $(document).on('click', '#btn-update', function () {
        var updateID = $('#Up_User_ID').val(),
            updateUser = $('#Up_UserName').val(),
            updateFull = $('#Up_User_FullName').val(),
            updateUserPass = $('#Up_User_Password').val(),
            upEmail = $('#Up_User_Email').val();

        if (updateUser == '' || upEmail == ' ' || updateFull == '' || updateUserPass == '') {
            swal("please fill all inputs", " ", "error");
        } else if (updateUser.length < 3) {
            swal("user Name Must be more than 3 letters ", " ", "error");
        } else if ((IsEmail(upEmail)) == false) {
            swal("enter valid email", " ", "error");
        } else {
            $.ajax({
                method: 'POST',
                url: 'updatemember.php',
                data: {
                    userid: updateID,
                    username: updateUser,
                    email: upEmail,
                    fullname: updateFull,
                    password: updateUserPass
                },
                success: function (data) {
                    viewMembers();
                    swal("1 Member Updated!", " ", "success");
                    $('#edit').modal('hide');
                }
            });
        }
    });
}


// function delete memeber 

function deleteMember() {
    $(document).on('click', '#delete-member-btn', function () {
        var userid = $(this).data('id');
        $(document).on('click', '#btn-delete', function () {
            $.ajax({
                method: 'post',
                url: 'deleteMember.php',
                data: {
                    userid: userid
                },
                success: function (data) {
                    viewMembers();
                    $('#delete').modal('hide');
                    swal("1 Member Deleted!", " ", "success");
                }
            });
        });
    });
}


// function activate member 

function activateMember() {
    $(document).on('click', '#activateMember-btn', function () {
        var userid = $(this).data('id');
        $.ajax({
            method: 'post',
            url: 'activateMember.php',
            data: {
                userid: userid
            },
            success: function (data) {
                swal("1 Member activated!", " ", "success");
                viewMembers();
            }
        });
    });
}