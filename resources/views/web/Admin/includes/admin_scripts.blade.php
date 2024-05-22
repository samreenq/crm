<script>
    function manageCamps() {
        dataUrl = "{{ route('admin.manage-camps.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-camps').html(data);
            }
        })
    }

    function manageClasses() {
        dataUrl = "{{ route('admin.manage-classes.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-classes').html(data);
            }
        })
    }



    $(document).on('click', '#edit-camp', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-camp.edit-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-camp-modal").click();
                    $("#edit-camp-modal-body").html(result);
                }

            }
        })
    });

    $(document).on('click', '#edit-class', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-class.edit-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#edit-camp-modal").click();
                    $("#edit-camp-modal-body").html(result);
                }

            }
        })
    });

    function updateClassFormData(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                // console.log(data);
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Class');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Class');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Class');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-camp-modal .close").click();
                    manageClasses();
                }
            },
        });
    }

    function updateCampFormData(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Camp');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Camp');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Camp');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-camp-modal .close").click();
                    manageCamps();
                }

            },

        });
    }
    $(document).on('click', '#delete-class', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-class.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);
                    } else if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageClasses();
                    }
                }
            })

        }).catch(swal.noop);

    });
    $(document).on('click', '#delete-camp', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-camp.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);
                    } else if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageCamps();
                    }
                }
            })

        }).catch(swal.noop);

    });
    //Start manage Ages
    function manageAges() {
        dataUrl = "{{ route('admin.manage-ages.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-ages').html(data);
            }
        })
    }

    //End Manage ages

    //Start Manage Events
    function manageClassEvents() {
        dataUrl = "{{ route('admin.manage-classes-events.ajax') }}"
        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-class-events').html(data);
            }
        })
    }
    //End Manage Events

    //Start manage Sessions

    function manageSessions() {
        dataUrl = "{{ route('admin.manage-sessions.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-sessions').html(data);
            }
        })
    }

    $(document).on('click', '#edit-session', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-session.edit-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-session-modal").click();
                    $("#edit-session-modal-body").html(result);
                }

            }
        })
    });

    $(document).on('click', '#edit-age-category', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-age.edit-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-age-modal").click();
                    $("#edit-age-modal-body").html(result);
                }

            }
        })
    });

    function updateSessionFormData(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Session');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Session');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Session');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-session-modal .close").click();
                    manageSessions();
                }

            },

        });
    }

    function updateAgeCategoryFormData(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Age Category');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Age Category');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Age Category');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-age-modal .close").click();
                    manageAges();
                }
            },
        });
    }


    $(document).on('click', '#delete-age-category', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-age-category.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageAges();
                    }
                }
            })

        }).catch(swal.noop);

    });
    $(document).on('click', '#delete-session', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-session.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageSessions();
                    }
                }
            })

        }).catch(swal.noop);

    });


    //End manage Sessions 

    //Start Events
    function manageEvents() {
        dataUrl = "{{ route('admin.manage-events.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-events').html(data);
            }
        })
    }

    $(document).on('click', '#edit-event', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-event.edit-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-event-modal").click();
                    $("#edit-event-modal-body").html(result);
                }

            }
        })
    });
    $(document).on('click', '#edit-class-event', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-class-event.edit-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-event2-modal").click();
                    $("#edit-event2-modal-body").html(result);
                }

            }
        })
    });



    function updateEventFormData(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Event');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Event');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Event');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-event-modal .close").click();
                    manageEvents();
                }

            },

        });
    }


    function updateEvent2FormData(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Event');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Event');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Event');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-event2-modal .close").click();
                    manageClassEvents();
                }

            },

        });
    }

    $(document).on('click', '#delete-event', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-event.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageEvents();
                    }
                }
            })

        }).catch(swal.noop);

    });

    $(document).on('click', '#delete-class-event', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-class-event.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageClassEvents();
                    }
                }
            })
        }).catch(swal.noop);
    });

    //End Events
    //Start Manage Age Category Section

    function manageClassAgeCategory(classId) {
        var url = "{{ route('admin.manage-class-age-category.ajax') }}";
        var dataUrl = "?class_id=" + classId;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                $('#manage-class-age-category').html(data);
            }
        })
    }
    //End Manage Age Category Section
    //start Manage Camp Sessions

    function manageCampSessions(campId) {
        var url = "{{ route('admin.manage-camp-sessions.ajax') }}";
        var dataUrl = "?camp_id=" + campId;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                $('#manage-camp-sessions').html(data);
            }
        })
    }


    //Age Category To Class
    $(document).on('click', '#add-age-cat-to-class', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.add-cat-to-class.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#add_sessions_to_camps_modal").click();
                    $("#add_sessions_to_camps_modal_body").html(result);
                }

            }
        })
    });

    function saveAgeCatToClass(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {

                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Add Age Category');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Age Category');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var class_id = result['data'];
                    $("#update-ingredent").html('Add Age Category');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add_sessions_to_camps_modal .close").click();
                    manageClassAgeCategory(class_id);
                }
            },

        });
    }

    //end Age category To class

    $(document).on('click', '#add-session-to-camp', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.add-session-to-camp.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#add_sessions_to_camps_modal").click();
                    $("#add_sessions_to_camps_modal_body").html(result);
                }

            }
        })
    });



    function saveSessionToCamp(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                // console.log(data);
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Add Session');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Session');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var camp_id = result['data'];
                    $("#update-ingredent").html('Add Session');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add_sessions_to_camps_modal .close").click();
                    manageCampSessions(camp_id);
                }

            },

        });
    }

    $(document).on('click', '#edit-camp-session', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-camp.edit-session-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit_sessions_to_camps_modal").click();
                    $("#edit_sessions_to_camps_modal_body").html(result);
                }

            }
        })
    });

    $(document).on('click', '#edit-class-age-cat', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-class.edit-age-cat-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit_sessions_to_camps_modal").click();
                    $("#edit_sessions_to_camps_modal_body").html(result);
                }

            }
        })
    });

    function editSessionToCamp(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Session');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Session');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var camp_id = result['data'];
                    $("#update-ingredent").html('Update Session');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add_sessions_to_camps_modal .close").click();
                    manageCampSessions(camp_id);
                }

            },

        });
    }


    function editAgeCatToClass(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                // console.log(data);
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Session');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Session');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var class_id = result['data'];
                    $("#update-ingredent").html('Update Session');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit_sessions_to_camps_modal .close").click();
                    manageClassAgeCategory(class_id);
                }

            },

        });
    }

    $(document).on('click', '#delete-class-age-cat', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-age-cat-from-class.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var class_id = result['data'];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageClassAgeCategory(class_id);
                    }
                }
            })
        }).catch(swal.noop);
    });


    $(document).on('click', '#delete-camp-session', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-session-to-camp.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    //  
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var camp_id = result['data'];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        manageCampSessions(camp_id);
                    }
                }
            })

        }).catch(swal.noop);

    });
    //end Manage Camp Sessions

    //Start manage Event to Class

    function ManageEventsOfAgeCatClass(classId, ageCatId) {
        var url = "{{ route('admin.manage-events-age-cat-class.ajax') }}";
        var dataUrl = "?class_id=" + classId + "&age_id=" + ageCatId;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                $('#manage-class-age-cat-events').html(data);
            }
        })
    }
    $(document).on('click', '#add-event-to-age-cat-class', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.add.event-to-age-cat-class.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#add-event-to-session-camp-modal").click();
                    $("#add-event-to-session-camp-modal-body").html(result);
                }

            }
        })
    });

    function saveEventToClass(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                console.log(data);
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Add Event');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Event');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var camp_session_id = result['data'];
                    var camp_session_id1 = camp_session_id.split("/");
                    var class_id = camp_session_id1[0];
                    var age_cat_id = camp_session_id1[1];
                    $("#update-ingredent").html('Add Event');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add-event-to-session-camp-modal .close").click();
                    ManageEventsOfAgeCatClass(class_id, age_cat_id)
                }

            },

        });
    }

    $(document).on('click', '#delete-event-age-cat-class', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-event-age-cat-class.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var camp_session_id = result['data'];
                        var camp_session_id1 = camp_session_id.split("/");
                        var class_id = camp_session_id1[0];
                        var age_cat_id = camp_session_id1[1];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        ManageEventsOfAgeCatClass(class_id, age_cat_id)
                    }
                }
            })

        }).catch(swal.noop);

    });



    $(document).on('click', '#edit-event-age-cat-class-modal', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-class.edit-event-age-cat-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-event-to-session-camp-modal").click();
                    $("#edit-event-to-session-camp-modal-body").html(result);
                }

            }
        })
    });



    function updateEventEntryToAgeCatClassModal(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Event');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Event');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var data1 = result['data'];
                    var class_id = data1[0]['cl_id'];
                    var age_id = data1[0]['age_id'];
                    jsonMessage2(result['status'], result['message'], result[
                        'messageTitle']);
                    $(".edit-event-to-session-camp-modal .close").click();
                    ManageEventsOfAgeCatClass(class_id, age_id)
                }
            },
        });
    }

    $(document).on('click', '#delete-event-age-cat-class-modal', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-event-entry-age-cat-class-modal') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var data1 = result['data'];
                        var class_id = data1[0]['cl_id'];
                        var age_id = data1[0]['age_id'];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        ManageEventsOfAgeCatClass(class_id, age_id)
                    }
                }
            })

        }).catch(swal.noop);

    });


    //end Manage Event to Class

    //start manage Event to Camp
    $(document).on('click', '#add-event-to-session-camp', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.add.event-to-session-camp.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#add-event-to-session-camp-modal").click();
                    $("#add-event-to-session-camp-modal-body").html(result);
                }

            }
        })
    });

    function saveEventToCamp(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {

                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Add Event');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Event');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var camp_session_id = result['data'];
                    var camp_session_id1 = camp_session_id.split("/");
                    var camp_id = camp_session_id1[0];
                    var session_id = camp_session_id1[1];
                    $("#update-ingredent").html('Add Event');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add-event-to-session-camp-modal .close").click();
                    ManageEventsOfSessionCamp(camp_id, session_id)
                }

            },

        });
    }

    function ManageEventsOfSessionCamp(campId, sessionId) {
        var url = "{{ route('admin.manage-events-session-camp.ajax') }}";
        var dataUrl = "?camp_id=" + campId + "&session_id=" + sessionId;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                $('#manage-camp-sessions-events').html(data);
            }
        })
    }

    $(document).on('click', '#delete-event-session-camp', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-event-session-camp.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var camp_session_id = result['data'];
                        var camp_session_id1 = camp_session_id.split("/");
                        var camp_id = camp_session_id1[0];
                        var session_id = camp_session_id1[1];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        ManageEventsOfSessionCamp(camp_id, session_id)
                    }
                }
            })

        }).catch(swal.noop);

    });

    $(document).on('click', '#edit-event-session-camp-modal', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-camp.edit-event-session-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit-event-to-session-camp-modal").click();
                    $("#edit-event-to-session-camp-modal-body").html(result);
                }

            }
        })
    });

    function saveEventEntryToSessionCampModal(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Add Event');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Event');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var data1 = result['data'];
                    var camp_id = data1[0]['c_id'];
                    var session_id = data1[0]['s_id'];
                    $("#update-ingredent").html('Add Event');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-event-to-session-camp-modal .close").click();
                    ManageEventsOfSessionCamp(camp_id, session_id)
                }

            },

        });
    }

    $(document).on('click', '#delete-event-session-camp-modal', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-event-entry-session-camp-modal') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var data1 = result['data'];
                        var camp_id = data1[0]['c_id'];
                        var session_id = data1[0]['s_id'];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        ManageEventsOfSessionCamp(camp_id, session_id)
                    }
                }
            })

        }).catch(swal.noop);

    });

    //end manage Event to Camp

    //View All Camps
    function viewAllCamps() {
        dataUrl = "{{ route('admin.view-camps-page.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#view-all-camps').html(data);
            }
        })
    }

    function viewAllClasses() {
        dataUrl = "{{ route('admin.reports.view-class-page.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#view-all-camps').html(data);
            }
        })
    }
    $(document).on('change', '.select-event-report-class', function(event) {
        var dataId = $(this).val();


        selectClassEventReport(dataId);

    });

    $(document).on('change', '.select-event-report', function(event) {
        var dataId = $(this).val();


        selectEventReport(dataId);

    });

    function selectEventReport(dataId) {
        dataUrl = "{{ route('admin.select-event.ajax') }}";
        $.ajax({
            url: dataUrl + "?ids=" + dataId,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '300') {
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var eventView = result['data']['eventView'];
                    var eventSessions = result['data']['eventSessions'];
                    $("#fetch-event-detail-report").html(eventView);
                    $("#fetch-event-sessions-report").html(eventSessions);
                }

            }
        })
    }

    function selectClassEventReport(dataId) {
        dataUrl = "{{ route('admin.report.class.select-event.ajax') }}";
        $.ajax({
            url: dataUrl + "?ids=" + dataId,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '300') {
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var eventView = result['data']['eventView'];
                    var eventSessions = result['data']['eventAgeCat'];
                    $("#fetch-event-detail-report").html(eventView);
                    $("#fetch-event-sessions-report").html(eventSessions);
                }

            }
        })
    }

    function GenerateClassReport(class_id, age_id, event_id) {
        dataUrl = "{{ route('admin.report.class.generate-report-calendar.ajax') }}";
        $.ajax({
            url: dataUrl + "?cl_id=" + class_id + "&age_id=" + age_id + "&e2_id=" + event_id,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#fetch-camp-report-calendar").html(result);
                }

            }
        })
    }

    function GenerateCampReport(camp_id, session_id, event_id) {
        dataUrl = "{{ route('admin.generate-camp-report-calendar.ajax') }}";
        $.ajax({
            url: dataUrl + "?c_id=" + camp_id + "&s_id=" + session_id + "&e_id=" + event_id,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#fetch-camp-report-calendar").html(result);
                }
            }
        })
    }

    function calenderReportDatatable(id) {
        dataUrl = "{{ route('admin.report.camp.event-session-attendee') }}"
        $.ajax({
            url: dataUrl + "?id=" + id,
            success: function(data) {
                $('#calender-report-datatable').html(data);
            }
        })
    }

    function classCalenderReportDatatable(id) {
        dataUrl = "{{ route('admin.report.class.event-age-cat-attendee') }}"
        $.ajax({
            url: dataUrl + "?id=" + id,
            success: function(data) {
                $('#calender-report-datatable').html(data);
            }
        })
    }




    $(document).on('click', '#add-to-specific-eventday-session', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.add-to-specific-eventday-session-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#add_entry_to_specific_session_event_day_by_admin_modal").click();
                    $("#add_entry_to_specific_session_event_day_by_admin_modal_body").html(result);
                }

            }
        })
    });



    $(document).on('click', '#add-to-specific-eventday-age-cat', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.report.class.add-to-specific-eventday-age-cat-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#add_entry_to_specific_session_event_day_by_admin_modal").click();
                    $("#add_entry_to_specific_session_event_day_by_admin_modal_body").html(result);
                }

            }
        })
    });



    function adminSaveToSpecificEventDayByAdmin(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {

                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage(result['status'], result['message']);
                    $("#update-ingredent").html('Add ');
                    $(".add_entry_to_specific_session_event_day_by_admin_modal .close").click();

                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add ');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var data1 = result['data'];
                    var event_id = data1[0]['e_id'];
                    var camp_id = data1[0]['c_id'];
                    var session_id = data1[0]['s_id'];
                    var ced_id = data1[0]['ced_id'];
                    $("#update-ingredent").html('Add ');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add_entry_to_specific_session_event_day_by_admin_modal .close").click();
                    calenderReportDatatable(ced_id)
                    GenerateCampReport(camp_id, session_id, event_id)
                }

            },

        });
    }

    function classAdminSaveToSpecificEventDayByAdmin(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {

                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage(result['status'], result['message']);
                    $("#update-ingredent").html('Add ');
                    $(".add_entry_to_specific_session_event_day_by_admin_modal .close").click();

                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add ');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var data1 = result['data'];
                    var event_id = data1[0]['e2_id'];
                    var class_id = data1[0]['cl_id'];
                    var age_id = data1[0]['age_id'];
                    var cled_id = data1[0]['cled_id'];
                    $("#update-ingredent").html('Add ');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".add_entry_to_specific_session_event_day_by_admin_modal .close").click();
                    classCalenderReportDatatable(cled_id)
                    GenerateClassReport(class_id, age_id, event_id)
                }

            },

        });
    }


    $(document).on('click', '#delete-attendee-entry', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.delete-attendee-entry') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var data1 = result['data'];
                        var event_id = data1[0]['e_id'];
                        var camp_id = data1[0]['c_id'];
                        var session_id = data1[0]['s_id'];
                        var ced_id = data1[0]['ced_id'];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        calenderReportDatatable(ced_id)
                        GenerateCampReport(camp_id, session_id, event_id)
                    }
                }
            })

        }).catch(swal.noop);

    });

    $(document).on('click', '#class-delete-attendee-entry', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are You Sure?',
            text: "You want to delete it, You won't be able to revert it!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {
            dataUrl = "{{ route('admin.report.class.delete-attendee-entry') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {
                    //    / console.log(data);
                    var result = JSON.parse(data);
                    if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var data1 = result['data'];
                        var event_id = data1[0]['e2_id'];
                        var class_id = data1[0]['cl_id'];
                        var age_id = data1[0]['age_id'];
                        var cled_id = data1[0]['cled_id'];
                        jsonMessage2(result['status'], result['message'], result[
                            'messageTitle']);
                        classCalenderReportDatatable(cled_id)
                        GenerateClassReport(class_id, age_id, event_id)
                    }
                }
            })

        }).catch(swal.noop);

    });

    $(document).on('click', '#class-edit-attendee-entry', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.report.class.edit-to-specific-eventday-age-cat-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    // jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit_entry_to_specific_session_event_day_by_admin_modal").click();
                    $("#edit_entry_to_specific_session_event_day_by_admin_modal_body").html(result);
                }

            }
        })
    });



    $(document).on('click', '#edit-attendee-entry', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.edit-to-specific-eventday-session-modal.ajax') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                    // jsonMessage(result['status'], result['message'], 'Error')
                } else {
                    //report the error
                    var result = (data);
                    $("#edit_entry_to_specific_session_event_day_by_admin_modal").click();
                    $("#edit_entry_to_specific_session_event_day_by_admin_modal_body").html(result);
                }

            }
        })
    });
    $(document).on('change', '.classFetchEventForReport', function(event) {
        var dataId = $(this).val();
        event.preventDefault();
        dataUrl = "{{ route('admin.report.class.fetch-event-age-cat.ajax') }}"
        $.ajax({
            url: dataUrl + "?ids=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#fetch-session-for-report").html(result);
                }
            }
        })
    });

    $(document).on('change', '.fetchEventForReport', function(event) {
        var dataId = $(this).val();
        event.preventDefault();
        dataUrl = "{{ route('admin.fetch-event-sessions-for-report.ajax') }}"
        $.ajax({
            url: dataUrl + "?ids=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#fetch-session-for-report").html(result);
                }
            }
        })
    });

    $(document).on('change', '.classFetchDaysFromSessionForReport', function(event) {
        var dataId = $(this).val();
        event.preventDefault();
        dataUrl = "{{ route('admin.reports.class.fetch-event-age-cat-days-for-report.ajax') }}"
        $.ajax({
            url: dataUrl + "?ids=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#fetch-days-from-session-for-report").html(result);
                }
            }
        })
    });

    $(document).on('change', '.fetchDaysFromSessionForReport', function(event) {
        var dataId = $(this).val();
        event.preventDefault();
        dataUrl = "{{ route('admin.fetch-event-sessions-days-for-report.ajax') }}"
        $.ajax({
            url: dataUrl + "?ids=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')
                } else {
                    var result = (data);
                    $("#fetch-days-from-session-for-report").html(result);
                }
            }
        })
    });

    function adminUpdateToSpecificEventDayByAdmin(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage(result['status'], result['message']);
                    $("#update-ingredent").html('Update ');
                    $(".add_entry_to_specific_session_event_day_by_admin_modal .close").click();

                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update ');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var data1 = result['data'];
                    var event_id = data1[0]['e_id'];
                    var camp_id = data1[0]['c_id'];
                    var session_id = data1[0]['s_id'];
                    var ced_id = data1[0]['ced_id'];
                    var ids = camp_id + "/" + event_id;
                    $("#update-ingredent").html('Update ');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit_entry_to_specific_session_event_day_by_admin_modal .close").click();
                    calenderReportDatatable(ced_id)
                    GenerateCampReport(camp_id, session_id, event_id);
                    selectEventReport(ids);
                }

            },

        });
    }
    //End View All Camps


    function adminClassUpdateToSpecificEventDayByAdmin(edit_user, url) {
        $.ajax({
            method: 'post',
            url: url,
            data: edit_user,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage(result['status'], result['message']);
                    $("#update-ingredent").html('Update ');
                    $(".add_entry_to_specific_session_event_day_by_admin_modal .close").click();

                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update ');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var data1 = result['data'];
                    var event_id = data1[0]['e2_id'];
                    var class_id = data1[0]['cl_id'];
                    var age_id = data1[0]['age_id'];
                    var cled_id = data1[0]['cled_id'];
                    var ids = class_id + "/" + event_id;
                    $("#update-ingredent").html('Update ');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit_entry_to_specific_session_event_day_by_admin_modal .close").click();
                    classCalenderReportDatatable(cled_id)
                    GenerateClassReport(class_id, age_id, event_id)
                    selectClassEventReport(ids);
                }

            },

        });
    }
</script>
