$(document).ready(function() { 
    // swal("Success" + "!",  "!gfhfghf", "success");
});

$("#empSigninForm").validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        email: {
            required: "Please enter your email address",
            email: "Please enter valid email address",
        },
        password: {
            required: "Please enter your password",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    setTimeout(function () { window.location = BASE_URL + '/employee/leaves'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});

$("#empSignupForm").validate({
    rules: {        
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
        },
        teamlead: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Please enter your name",
        },
        email: {
            required: "Please enter your email address",
            email: "Please enter valid email address",
        },
        password: {
            required: "Please enter your password",
        },
        teamlead: {
            required: "Please select your teamlead",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    setTimeout(function () { window.location = BASE_URL + '/employee/signin'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});


$("#empAddLeaveForm").validate({
    rules: {        
        reason: {
            required: true,
        },
        start_date: {
            required: true,
        },
        end_date: {
            required: true,
        },
    },
    messages: {
        reason: {
            required: "Please enter your reason",
        },
        start_date: {
            required: "Please select start_date",
        },
        end_date: {
            required: "Please select end_date",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    
                    setTimeout(function () { window.location = BASE_URL + '/employee/leaves'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});


$("#tlSigninForm").validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        email: {
            required: "Please enter your email address",
            email: "Please enter valid email address",
        },
        password: {
            required: "Please enter your password",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    setTimeout(function () { window.location = BASE_URL + '/team-lead/leaves'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});

$("#tlSignupForm").validate({
    rules: {        
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Please enter your name",
        },
        email: {
            required: "Please enter your email address",
            email: "Please enter valid email address",
        },
        password: {
            required: "Please enter your password",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    setTimeout(function () { window.location = BASE_URL + '/team-lead/signin'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});

$("#tlAddLeaveForm").validate({
    rules: {        
        reason: {
            required: true,
        },
        start_date: {
            required: true,
        },
        end_date: {
            required: true,
        },
    },
    messages: {
        reason: {
            required: "Please enter your reason",
        },
        start_date: {
            required: "Please select start_date",
        },
        end_date: {
            required: "Please select end_date",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    
                    setTimeout(function () { window.location = BASE_URL + '/team-lead/leaves'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});


$("#hrSigninForm").validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        email: {
            required: "Please enter your email address",
            email: "Please enter valid email address",
        },
        password: {
            required: "Please enter your password",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    setTimeout(function () { window.location = BASE_URL + '/hr/leaves'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});

$("#hrSignupForm").validate({
    rules: {        
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Please enter your name",
        },
        email: {
            required: "Please enter your email address",
            email: "Please enter valid email address",
        },
        password: {
            required: "Please enter your password",
        },
    },
    submitHandler: function (form) {
        //$(form).submit();
        $.ajax({
            url: form.action,
            type: "POST",
            data: $(form).serialize(),
            success: function (res) {
                var result = $.parseJSON(res);
                if (result.success == true) {
                    swal("Success" + "!", result.message + "!", "success");
                    
                    setTimeout(function () { window.location = BASE_URL + '/hr/signin'; }, 1000);
                } else {
                    swal("Failed" + "!", result.message + "!", "error");
                }
            }
        });
    }
});

