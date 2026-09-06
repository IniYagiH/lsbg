"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
              var username_value=document.querySelector('#username').value;
              var password_value=document.querySelector('#password').value;
              var base_url=document.querySelector('#base_url').value;
              $.ajax({
            			url : base_url,
            			type : "POST",
            			data : {username : username_value,
                          password : password_value},
            			success : function(data) {
                    var response = jQuery.parseJSON(data);
                    if(response.status=="TRUE"){
                      swal.fire({
            		                text: "Login berhasi, "+response.text,
            		                icon: "success",
            		                buttonsStyling: false,
            		                confirmButtonText: "Ok, got it!",
                                    customClass: {
                						confirmButton: "btn font-weight-bold btn-light-primary"
                					}
            		            }).then(function() {
            						KTUtil.scrollTop();
                        location.reload();
            					});


                    }else{
                      swal.fire({
            		                text: response.text,
            		                icon: "error",
            		                buttonsStyling: false,
            		                confirmButtonText: "Ok, got it!",
                                    customClass: {
                						confirmButton: "btn font-weight-bold btn-light-primary"
                					}
            		            }).then(function() {
            						KTUtil.scrollTop();
            					});
                    }

            				},
            				error: function(xhr, status, error) {
            					var err = eval("(" + xhr.responseText + ")");
            					alert(err.Message);
            				}
            		});


				} else {
					swal.fire({
		                text: "Username dan Password tidak bisa kosong!",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					fullname: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					email: {
                        validators: {
							notEmpty: {
								message: 'Email address is required'
							},
                            emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    ///////////
                    $(function () {
                      var uploadURI = $('#kt_login_signup_form').attr('action');
                      var progressBar = $('#progress-bar-1');


                                          submitCounter++;
                                            // provide the form data
                                            // that would be sent to sever through ajax
                                            var formData = new FormData();
                                            // now upload the file using $.ajax
                                            var email_value=document.querySelector('#email').value;
                                            var nib_value=document.querySelector('#nib').value;
                                            var nama_value=document.querySelector('#nama').value;
                                            var fileSelect =document.getElementById('file_nib');
                                            $.ajax({
                                              url: uploadURI,
                                              type: 'post',
                                              data: {nama:nama_value,
                                                    email:email_value,
                                                    nib:nib_value,
                                                    file_nib:fileSelect.files},
                                              processData: false,
                                              contentType: false,
                                              success: function (data) {
                                                console.log(data);
                                              },
                                              xhr: function () {
                                                var xhr = new XMLHttpRequest();
                                                xhr.upload.addEventListener("progress", function (event) {
                                                  if (event.lengthComputable) {
                                                    var percentComplete = Math.round((event.loaded / event.total) * 100);
                                                            // console.log(percentComplete);

                                                            $('.progress').show();
                                                            if(percentComplete >= 97)
                                                            {
                                                              progressBar.text('- Harap Tunggu -');
                                                            }
                                                            else {
                                                              progressBar.text(percentComplete + '%');
                                                            }
                                                            progressBar.css({width: percentComplete + "%"});
                                                        }
                                                        ;
                                                    }, false);
                                                return xhr;
                                              }
                                            });








                      $('body').on('change.bs.fileinput', function (e) {
                        $('.progress').hide();
                        progressBar.text("0%");
                        progressBar.css({width: "0%"});
                      });
                    });

                    ///////////
                    /*
                    swal.fire({
		                text: "All is cool! Now you submit this form",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});*/
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email address is required'
							},
                            emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Submit form
                    KTUtil.scrollTop();
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
            _handleForgotForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
