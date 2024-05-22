<script>
    $(document).on('click', '#purchase_plan', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");

        dataUrl = "{{ route('user.load.plan') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                // $("#purchase-qn-modal").click();
                // $('#purchase-qn-modal-body').html(data);
                var result = JSON.parse(data);

                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Ingredent');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage2(result['status'], result['message']);
                    setTimeout(function() {
                        window.location.href = "{{ route('user.login') }}"
                    }, 1000);
                } else if (result['code'] == '200') {
                    var url = result['data'];
                    setTimeout(function() {
                        window.location.href = url
                    }, 1000);
                }
            }
        })
    });

    $(document).on('click', '#check_plan_login', function(event) {
        event.preventDefault();
        dataUrl = "{{ route('user.check.plan.login') }}"
        $.ajax({
            url: dataUrl,
            success: function(data) {

                var result = JSON.parse(data);

                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Ingredent');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage(result['status'], result['message']);
                    setTimeout(function() {
                        window.location.href = "{{ route('user.login') }}"
                    }, 1000);
                } else if (result['code'] == '200') {
                    setTimeout(function() {
                        window.location.href = "{{ route('user.plan-details') }}"
                    }, 1000);
                }
            },
        })
    });

    function make_payment(stripe, token, c_name, c_email, user_id) {
        $(".make_payment").val('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');

        url = "{{ route('user.save.proceed-plan') }}";
        dataUrl = "?token=" + token + "&c_name=" + c_name + "&c_email=" + c_email + "&user_id=" + user_id;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Ingredent');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage(result['status'], result['message']);
                    setTimeout(function() {
                        window.location.href = "{{ route('user.purchase-plan') }}"
                    }, 2000);
                } else if (result['code'] == '200') {
                    jsonMessage(result['status'], result['message'], result['messageTitle']);
                    $(".make_payment").val('Confirm');
                    setTimeout(function() {
                        window.location.href = "{{ route('user.plan-details') }}"
                    }, 2000);
                }
            },
        })
    }

    function userPlans(user_id) {
        var url = "{{ route('user-plans-details.ajax') }}";
        var dataUrl = "?user_id=" + user_id;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                $('#user-plans').html(data);
            }
        })
    }

    $(document).on('click', '#edit-user-company', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        url = "{{ route('users.edit-user-company-modal.ajax') }}"
        var dataUrl = "?id=" + dataId;
        $.ajax({
            url: url + dataUrl,
            success: function(data) {
                $("#edit-user-company-modal").click();
                $('#edit-user-company-modal-body').html(data);
            }
        })
    });

    function updateCompanyModal(userData) {
        var urlLink = "{{ route('users.update-company-modal.ajax') }}";
        $("#update-customer").html('<i class="fa fa-spinner fa-spin"></i><i>please wait</i>');

        $.ajax({
            method: 'post',
            url: urlLink,
            data: userData,
            processData: false,
            contentType: false,
            async: false,
            success: function(data) {

                var result = JSON.parse(data);

                if (result['code'] == '302') {
                    jsonMessage2(result['status'], 'Required Field cannot be left empty')
                    $("#update-customer").html('Update Patient');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage(result['status'], result['message']);

                } else if (result['code'] == '200') {
                    $("#update-customer").html('Update Company');
                    var dataUrl = "{{ route('user.dashboard') }}";
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                    // jsonMessage(result['status'], result['message'], result['messageTitle']);
                    // jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    // $(".edit-user-company-modal .close").click();
                    // userPlans({{ session()->get('userId') }});
                }

            },

        });
    }

    $(document).on('click', '#trash-user-company', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        swal({
            title: 'Are you sure?',
            text: "You Won't be able to Revert This!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            dataUrl = "{{ route('users.delete-company.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage2('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);
                    } else if (result['code'] == '300') {
                        jsonMessage2(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var dataUrl = "{{ route('user.dashboard') }}";
                        setTimeout(function() {
                            window.location.href = dataUrl;
                        }, 500);

                    }
                }
            })
        }).catch(swal.noop);
    });

    function saveData() {
        data = {};
        $("#firstsection").find(".question").each(function() {
            var id = $(this).attr("data-id");
            var question = $(this).attr("data-qn");
            var cat = $(this).attr("data-cat");



            if (!data[cat]) {
                data[cat] = {}; // Initialize the category if it doesn't exist in data
            }


            if (!data[cat][id]) {
                data[cat][id] = {}; // Initialize the question if it doesn't exist in the category
            }


            data[cat][id]['question'] = question;
            if (id == 1) {
                if (!data[cat][id]['name'])
                    data[cat][id]['name'] = {};
                if (!data[cat][id]['address'])
                    data[cat][id]['address'] = {};
                if (!data[cat][id]['phone'])
                    data[cat][id]['phone'] = {};
                if (!data[cat][id]['email'])
                    data[cat][id]['email'] = {};

                data[cat][id]['name'] = $("#name").val();
                data[cat][id]['address'] = $("#address").val();
                data[cat][id]['phone'] = $("#phone").val();
                data[cat][id]['email'] = $("#email").val();

            } else
                data[cat][id]['answer'] = $('input[name="answer' + id + '"]:checked').val();
        });

        $("#secondsection").find(".question").each(function() {
            var id = $(this).attr("data-id");
            var question = $(this).attr("data-qn");
            var cat = $(this).attr("data-cat");

            if (!data[cat]) {
                data[cat] = {}; // Initialize the category if it doesn't exist in data
            }

            if (!data[cat][id]) {
                data[cat][id] = {}; // Initialize the question if it doesn't exist in the category
            }

            data[cat][id]['question'] = question;
            data[cat][id]['answer'] = $('input[name="answer' + id + '"]:checked').val();
        });
        // $("#thirdsection").find(".question").each(function() {
        //   var id = $(this).attr("data-id");
        //   var question = $(this).attr("data-qn");
        //   var cat = $(this).attr("data-cat");

        //   if (!data[cat]) {
        //     data[cat] = {};
        //   }

        //   if (!data[cat][id]) {
        //     data[cat][id] = {}; // Initialize the question if it doesn't exist in the category
        //   }

        //   data[cat][id]['question'] = question;
        //   data[cat][id]['answer'] = $('input[name="answer' + id + '"]:checked').val();
        // });
        // $("#fourthsection").find(".question").each(function() {
        //   var id = $(this).attr("data-id");
        //   var question = $(this).attr("data-qn");
        //   var cat = $(this).attr("data-cat");

        //   if (!data[cat]) {
        //     data[cat] = {}; // Initialize the category if it doesn't exist in data
        //   }

        //   if (!data[cat][id]) {
        //     data[cat][id] = {}; // Initialize the question if it doesn't exist in the category
        //   }

        //   data[cat][id]['question'] = question;
        //   data[cat][id]['answer'] = $('input[name="answer' + id + '"]:checked').val();
        // });
    }

    function checkSection(firstsection = false, secondsection = false, thirdsection = false, fourthsection = false) {
        var check = true;
        if (firstsection == true) {
            var answers = {};
            var loop = 0;
            $("#firstsection").find(".question").each(function() {
                var id = $(this).attr("data-id");
                var question = $(this).attr("data-qn");
                var cat = $(this).attr("data-cat");
                if (id == 1) {
                    answers[loop++] = $("#name").val();
                    answers[loop++] = $("#address").val();
                    answers[loop++] = $("#phone").val();
                    answers[loop++] = $("#email").val();
                    return;
                }
                var ans = $('input[name="answer' + id + '"]:checked').val();
                if (!ans)
                    ans = null;
                answers[loop++] = ans;
            });

            $.each(answers, function(index, item) {
                if (item == null || item == "") {
                    check = false;
                    return false;
                }

            });
            if (check == false)
                return false;
        }
        if (secondsection == true) {
            var answers = {};
            var loop = 0;
            var check = true;
            $("#secondsection").find(".question").each(function() {
                var id = $(this).attr("data-id");
                var question = $(this).attr("data-qn");
                var cat = $(this).attr("data-cat");

                var ans = $('input[name="answer' + id + '"]:checked').val();
                if (!ans)
                    ans = null;
                answers[loop++] = ans;
            });

            $.each(answers, function(index, item) {
                if (item == null || item == "") {
                    check = false;
                    return false;
                }

            });
            if (check == false)
                return false;
        }


    }

    function checkFirstRecord(section) {
        if (section == 'firstsection') {

        }
        var loop = 0;
        var answers = {};
        var check = true;
        $("#" + section).find(".question").each(function() {
            var id = $(this).attr("data-id");
            var question = $(this).attr("data-qn");
            var cat = $(this).attr("data-cat");
            if (id == 1) {
                answers[loop++] = $("#name").val();
                answers[loop++] = $("#address").val();
                answers[loop++] = $("#phone").val();
                answers[loop++] = $("#email").val();
                $.each(answers, function(index, item) {
                    if (item == null || item == "") {
                        check = false;
                        return false;
                    }
                });
            } else {
                var ans = $('input[name="answer' + id + '"]:checked').val();
                if (ans == null || ans == "") {
                    check = false;
                    return false;
                }
                return false;
            }

            if (check == false)
                return false;

        });
    }


    $(document).on('click', '#create-api-modal', function(event) {
        event.preventDefault();
        url = "{{ route('users.create-questionaire.ajax') }}"
        $.ajax({
            url: url,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    var dataUrl = "{{ route('user.dashboard') }}";
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                } else {
                    var result = (data);
                    $("#purchase-qn-modal").click();
                    $('#purchase-qn-modal-body').html(result);
                }
            }
        })
    });




    function CreateQuestionaireAPI(edit_user, url) {
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
                    $("#update-ingredent").html('Update Child');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Child');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    var dataUrl = "{{ route('user.dashboard') }}";
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                }
            },
        });
    }

    $(document).on('click', '#unsubscribe-user-package', function(event) {
        event.preventDefault();
        swal({
            title: 'Are you sure?',
            text: "You want to unsubscribe the package",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes, do it!'
        }).then(function() {
            dataUrl = "{{ route('user-unsub-package') }}";
            $("#unsubscribe-user-package").html("Please Wait...")
            $.ajax({
                url: dataUrl,
                success: function(data) {

                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage2('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);
                    } else if (result['code'] == '300') {
                        jsonMessage2(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var dataUrl = "{{ route('user.dashboard.settings') }}";
                        setTimeout(function() {
                            window.location.href = dataUrl;
                        }, 500);
                    }
                }
            })
        }).catch(swal.noop);
    });



    function saveQuestionaire() {
        var mainArray = [];
        var question = $("#Q-1").html();

        var questionAnswer = {
            question: question,
            answers: {}
        };
        $(".question1").find(".answer1").each(function() {
            var answerID = this.id;
            var answerValue = $(this).val();
            questionAnswer.answers[answerID] = answerValue;
        });
        mainArray.push(questionAnswer);

        question = $("#Q-2").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question2 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        question = $("#Q-3").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerArray = [];
        var answerName = "";
        $(".question3 input[type=checkbox]:checked").each(function() {

            var answerValue = $(this).val();
            answerName = $(this).attr("data-name");

            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 4
        question = $("#Q-4").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question4 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);



        question = $("#Q-5").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var check = false;
        $(".question5 input[type=radio]:checked").each(function() {

            var radioName = $(this).attr("name");
            if (radioName == "houseType") {
                var answerValue = $(this).val();
                var answerName = $(this).attr("name");
                if (answerValue == "House in HOA")
                    check = true;
                questionAnswer.answers["Choice"] = answerValue;
            }

        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        if (check == true) {
            question = $("#Q-6").html();
            questionAnswer = {
                question: question,
                answers: {}
            };
            $(".question6 input[type=radio]:checked").each(function() {

                var answerValue = $(this).val();
                var answerName = $(this).attr("name");
                questionAnswer.answers["Choice"] = answerValue;
            });
            if (Object.keys(questionAnswer.answers).length > 0)
                mainArray.push(questionAnswer);
        }
        check = false;


        //Question 7
        question = $("#Q-7").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question7 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 8
        question = $("#Q-8").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question8 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 9
        question = $("#Q-9").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question9 input[type=radio]:checked").each(function() {
            var answerName = "Choice";
            var answerValue = $(this).val();
            if (answerValue == "other")
                answerValue = $("#q-9-other").val();
            questionAnswer.answers["Choice"] = answerValue;

        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 10
        question = $("#Q-10").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        answerArray = [];
        var answerValue = "";
        $(".question10 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 11
        question = $("#Q-11").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        answerArray = [];
        var answerValue = "";
        $(".question11 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }


        //Question 12
        question = $("#Q-12").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        answerArray = [];
        var answerValue = "";
        $(".question12 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 13
        question = $("#Q-13").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question13 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 14
        question = $("#Q-14").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question14 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 15
        question = $("#Q-15").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question15 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }


        //Question 16
        question = $("#Q-16").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question16 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }


        //Question 17
        question = $("#Q-17").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question17 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }


        //Question 18
        question = $("#Q-18").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question18 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 19
        question = $("#Q-19").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question19 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);



        //Question 20
        question = $("#Q-20").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question20 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 21
        question = $("#Q-21").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var check = false;
        var answerArray = [];
        var dataId = "";
        var answerValue = "";
        $(".question21 input[type=radio]:checked").each(function() {

            answerValue = $(this).val();
            var answerName = $(this).attr("name");
            if (answerValue == "Pool" || answerValue == "Outdoor kitchens" || answerValue == "Fire place" ||
                answerValue == "Fire pit" || answerValue == "Seat Wall" || answerValue == "Retaining Wall"
            ) {
                questionAnswer.answers["Choice"] = answerValue;
            } else {
                dataId = $(this).attr("data-id");

                check = true;
            }

        });

        if (check == true && dataId != "") {
            $(".question21 ." + dataId + " input[type=checkbox]:checked").each(function() {
                var answerValue1 = $(this).val();
                answerArray.push(answerValue1);
            });
            var answerValue1 = answerArray.join(", ");
            if (answerArray.length > 0)
                questionAnswer.answers["Choice"] = answerValue + "( " + answerValue1 + " )";
            else
                questionAnswer.answers["Choice"] = answerValue;

            mainArray.push(questionAnswer);

        } else {
            if (Object.keys(questionAnswer.answers).length > 0)
                mainArray.push(questionAnswer);
        }


        //Question 22
        question = $("#Q-22").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question22 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 23
        question = $("#Q-23").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question23 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 24
        question = $("#Q-24").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question24 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 25
        question = $("#Q-25").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question25 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 26
        question = $("#Q-26").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        $(".question26 input[type=checkbox]:checked").each(function() {
            var answerValue = $(this).val();
            answerName = "Choice";
            answerArray.push(answerValue);
        });

        var answerValue = answerArray.join(", ")
        if (answerArray.length > 0) {
            questionAnswer.answers["Choice"] = answerValue;
            mainArray.push(questionAnswer);
        }

        //Question 27
        question = $("#Q-27").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var answerName = "";
        var answerValue = "";
        answerArray = [];
        var dataId = "";
        check = false;
        $(".question27 input[type=radio]:checked").each(function() {
            dataId = $(this).attr("data-id");
            answerValue = $(this).val();
            if (dataId == "27-a" || dataId == "27-d") {
                answerName = "Choice";
                questionAnswer.answers["Choice"] = answerValue;
            } else {
                check = true;
            }

        });
        if (check == true) {
            var aValue = $("." + dataId).val();
            answerName = "Choice";
            if (aValue != "")
                questionAnswer.answers["Choice"] = answerValue + " (  " + aValue + " )";
            else
                questionAnswer.answers["Choice"] = answerValue;
        }

        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);


        //Question 28
        question = $("#Q-28").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question28 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 29
        question = $("#Q-29").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question29 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 30
        question = $("#Q-30").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question30 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);


        //Question 31
        question = $("#Q-31").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question31 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 32
        question = $("#Q-32").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question32 input[type=radio]:checked").each(function() {

            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);



        //Question 33
        question = $("#Q-33").html();
        questionAnswer = {
            question: question,
            answers: {}
        };

        $(".question33 input[type=radio]:checked").each(function() {
            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            questionAnswer.answers["Choice"] = answerValue;
        });

        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        //Question 34
        question = $("#Q-34").html();
        questionAnswer = {
            question: question,
            answers: {}
        };
        var check = false;
        var dataId = "";

        $(".question34 input[type=radio]:checked").each(function() {
            var answerValue = $(this).val();
            var answerName = $(this).attr("name");
            if (answerValue == "specify the work") {
                var check = true;
                dataId = $(this).attr("Other-specify1")
            } else
                questionAnswer.answers["Choice"] = answerValue;
        });

        if (check == true) {
            var answer = $("." + dataId).val();
            questionAnswer.answers["Choice"] = answer;
        }
        if (Object.keys(questionAnswer.answers).length > 0)
            mainArray.push(questionAnswer);

        return mainArray;
    }

    function submitQuestionaire(mainArray) {

        var code = $("#questionaireCode").val();
        var jsonArray = JSON.stringify(mainArray);

        $.ajax({
            url: "{{ route('submit.questionaire.ajax') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                code: code,
                jsonArray: jsonArray
            },
            success: function(data) {

                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage2('error', 'Required Field cannot be left empty')
                    printErrorMsg(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage2(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    jsonMessage2(result['status'], result['message']);

                    var message =
                        "<h2 id='after-submit'>Thank You For Taking Our Client Questionnaire,With the information you provided we will pair you with a designer that best fits your needs. We look forward to getting into contact with you. </h2>";
                    $(".secion-qn-page").html(message)
                }
            }
        });
    }

    function manageCompany() {
        dataUrl = "{{ route('admin.manage-companies.ajax') }}"

        $.ajax({
            url: dataUrl,
            success: function(data) {
                $('#manage-company').html(data);
            }
        })
    }

    $(document).on('click', '#edit-company-admin', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('admin.manage-company.edit-modal.ajax') }}"
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
                    $("#edit-company-modal").click();
                    $("#edit-company-modal-body").html(result);
                }
            }
        })
    });

    function updateCompanyFormDataByAdmin(edit_user, url) {
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
                    $("#update-ingredent").html('Update Company');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Update Company');
                    jsonMessage(result['status'], result['message']);
                } else if (result['code'] == '200') {
                    $("#update-ingredent").html('Update Company');
                    jsonMessage2(result['status'], result['message'], result['messageTitle']);
                    $(".edit-company-modal .close").click();
                    manageCompany();
                }
            },
        });
    }

    $(document).on('click', '#delete-company-admin', function(event) {
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
            dataUrl = "{{ route('admin.delete-company-admin.ajax') }}";
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
                        manageCompany();
                    }
                }
            })
        }).catch(swal.noop);
    });

    $(document).on('click', '#create-meeting-request', function(event) {
        var dataId = $(this).attr("data-id");
        event.preventDefault();

        dataUrl = "{{ route('create-meeting-request-modal') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {
                if (isJSON(data)) {
                    var result = JSON.parse(data);
                    jsonMessage2(result['status'], result['message'], 'Error')

                } else {
                    //report the error
                    var result = (data);
                    $("#create-meeting-request-modal").click();
                    $("#create-meeting-request-modal-body").html(result);
                }
            }
        })
    });

    function addMeetingRequest(edit_user, url) {
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
                    $("#update-ingredent").html('Add Request');
                    $("#update-ingredent").attr("disabled", false)
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    $("#update-ingredent").html('Add Request');
                    $("#update-ingredent").attr("disabled", false)
                    var dataUrl = "{{ route('user.dashboard') }}";
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                } else if (result['code'] == '200') {
                    var dataUrl = "{{ route('user.dashboard') }}";
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                }
            },
        });
    }

    function countmeetings() {

        var badge = $("#meetingCountByAdmin");
        dataUrl = "{{ route('admin.count-meeting.ajax') }}"
        $.ajax({
            url: dataUrl,
            success: function(data) {
                if (data == 0) {
                    badge.css("display", "none");
                    badge.html(data);
                } else {
                    badge.css("display", "block");
                    badge.html(data);
                }
            }
        })
    }



    function manageActiveMeetings() {
        var url = "{{ route('admin.view.meetings-ajax') }}";

        $.ajax({
            url: url,
            success: function(data) {
                $('#manage-meetings').html(data);
            }
        })
    }


    $(document).on('click', '#admin-accept-meeting-request', function(event) {

        event.preventDefault();
        var dataId = $(this).attr("data-id");
        var dataType = $(this).attr("data-type");
        swal({
            title: 'Are You Sure?',
            text: "You are accepting this meeting request",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {

            dataUrl = "{{ route('admin.accept-meeting-request.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId + "&type=" + dataType,
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);
                    } else if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var dataUrl = result['data'];
                        setTimeout(function() {
                            window.location.href = dataUrl;
                        }, 500);
                    }
                }
            })
        }).catch(swal.noop);
    });

    $(document).on('click', '#admin-reject-meeting-request', function(event) {

        event.preventDefault();
        var dataId = $(this).attr("data-id");
        var dataType = $(this).attr("data-type");
        swal({
            title: 'Are You Sure?',
            text: "You are rejecting this meeting request",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {

            dataUrl = "{{ route('admin.reject-meeting-request.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId + "&type=" + dataType,
                success: function(data) {

                    if (isJSON(data)) {
                        var result = JSON.parse(data);
                        jsonMessage2(result['status'], result['message'], 'Error')

                    } else {
                        //report the error
                        var result = (data);
                        $("#reject-meeting-request-modal").click();
                        $("#reject-meeting-request-modal-body").html(result);
                    }
                }
            })
        }).catch(swal.noop);
    });

    function adminUpdateMeetingRequest(edit_user, url) {
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
                    $("#update-ingredent").html('Add Request');
                    $("#update-ingredent").attr("disabled", false)
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    var dataUrl = "{{ route('user.dashboard') }}";
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                    $("#update-ingredent").html('Add Request');
                    $("#update-ingredent").attr("disabled", false)
                } else if (result['code'] == '200') {
                    var dataUrl = result['data'];
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                }
            },
        });
    }


    $(document).on('click', '#accept-meeting-request', function(event) {

        event.preventDefault();
        var dataId = $(this).attr("data-id");
        var dataType = $(this).attr("data-type");
        swal({
            title: 'Are You Sure?',
            text: "You are accepting this meeting request",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {

            dataUrl = "{{ route('accept-meeting-request.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId + "&type=" + dataType,
                success: function(data) {
                    // console.log(data);
                    var result = JSON.parse(data);
                    if (result['code'] == '302') {
                        jsonMessage('error', 'Required Field cannot be left empty')
                        printErrorMsg(result['message']);

                    } else if (result['code'] == '300') {
                        jsonMessage(result['status'], result['message']);
                    } else if (result['code'] == '200') {
                        var dataUrl = result['data'];
                        setTimeout(function() {
                            window.location.href = dataUrl;
                        }, 500);
                    }
                }
            })
        }).catch(swal.noop);
    });

    $(document).on('click', '#reject-meeting-request', function(event) {

        event.preventDefault();
        var dataId = $(this).attr("data-id");
        var dataType = $(this).attr("data-type");
        swal({
            title: 'Are You Sure?',
            text: "You are rejecting this meeting request",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes,do it!'
        }).then(function() {

            dataUrl = "{{ route('reject-meeting-request.ajax') }}";
            $.ajax({
                url: dataUrl + "?id=" + dataId + "&type=" + dataType,
                success: function(data) {

                    if (isJSON(data)) {
                        var result = JSON.parse(data);
                        jsonMessage2(result['status'], result['message'], 'Error')

                    } else {
                        //report the error
                        var result = (data);
                        $("#reject-meeting-request-modal").click();
                        $("#reject-meeting-request-modal-body").html(result);
                    }
                }
            })
        }).catch(swal.noop);
    });

    function UpdateMeetingRequest(edit_user, url) {
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
                    $("#update-ingredent").html('Add Request');
                    $("#update-ingredent").attr("disabled", false)
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage2(result['status'], result['message']);

                } else if (result['code'] == '200') {
                    var dataUrl = result['data'];
                    setTimeout(function() {
                        window.location.href = dataUrl;
                    }, 500);
                }
            },
        });
    }

    $(document).on('click', '#ask-for-meeting-link', function(event) {
        event.preventDefault();
        var dataId = $(this).attr("data-id");
        $(this).html("Please Wait...");
        dataUrl = "{{ route('user.ask-for-meeting-link') }}"
        $.ajax({
            url: dataUrl + "?id=" + dataId,
            success: function(data) {

                var result = JSON.parse(data);
                if (result['code'] == '302') {
                    jsonMessage('error', 'Required Field cannot be left empty')
                    $("#update-ingredent").html('Update Ingredent');
                    printErrorMsg1(result['message']);
                } else if (result['code'] == '300') {
                    jsonMessage2(result['status'], result['message']);

                } else if (result['code'] == '200') {
                    var url = result['data'];
                    setTimeout(function() {
                        window.location.href = url
                    }, 1000);
                }
            }
        })
    });

</script>
