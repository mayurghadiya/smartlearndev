// JavaScript Document
jQuery(document).ready(function ($) {
    //Put Your Custom Jquery or Javascript Code Here
    // $( ".checkbox-switch-animate" ).click(function() {
    // 				$( ".bootstrap-switch.bootstrap-switch-yellow" ).toggleClass( " bootstrap-switch-off", " bootstrap-switch-on " );
    // });

});

//custom datatable filtering
$(document).ready(function () {
    
    $('.sfilter-rows').on('change', function () {
        var data_type = $(this).attr('data-type');
        var data_id = $('option:selected', this).attr('data-id');
alert(data_type);
        switch (data_type) {
            case 'course':
                //find branch of courses
                all_data2();
                $.ajax({
                    url: base_url + 'index.php?admin/course_list_from_degree/' + data_id,
                    type: 'get',
                    success: function (content) {
                        //get the course elemt id and append course list
                        $('.sfilter-rows').each(function (index) {
                            var custom_data_type = $(this).attr('data-type');
                            
                            if (custom_data_type == 'branch') {
                                //$('#batch').append('<option value="">Select</option>');
                                var branch_id = $(this).attr('id');
                                $('#' + branch_id).find('option').remove().end();
                                $('#' + branch_id).append('<option value="">All</option>');
                                var branch = jQuery.parseJSON(content);
                                $.each(branch, function (key, value) {
                                    $('#' + branch_id).append('<option data-id=' + value.course_id + ' value=' + value.c_name + '>' + value.c_name + '</option>');
                                });
                            }
                        });
                    }
                });
                break;
            case 'branch':
                var course_id = '';
                var branch_id = '';
                $('.sfilter-rows').each(function (index) {
                    var custom_data_type = $(this).attr('data-type');
                    if (custom_data_type == 'course') {
                        course_id = $('option:selected', this).attr('data-id');
                    } else if (custom_data_type == 'branch') {
                        branch_id = $('option:selected', this).attr('data-id');
                    }
                })
                $.ajax({
                    url: base_url + 'index.php?admin/batch_list_from_degree_and_course/' + course_id + '/' + branch_id,
                    type: 'get',
                    success: function (content) {
                        //get the course elemt id and append course list
                        $('.sfilter-rows').each(function (index) {
                            var custom_data_type = $(this).attr('data-type');
                            if (custom_data_type == 'batch') {
                                //$('#batch').append('<option value="">Select</option>');
                                var batch = $(this).attr('id');
                                var batch_id = '#' + batch;
                                $(batch_id).find('option').remove().end();
                                $(batch_id).append('<option value="">All</option>');
                                var batch = jQuery.parseJSON(content);
                                $.each(batch, function (key, value) {
                                    $(batch_id).append('<option data-id=' + value.b_id + ' value=' + value.b_name + '>' + value.b_name + '</option>');
                                });
                            }
                        });
                    }
                    //get_semesters_of_branch(branch_id);
                });
                get_semesters_of_branch2(branch_id);
                break;
        }
    });

    function get_semesters_of_branch2(branch_id) {
        $.ajax({
            url: base_url + 'index.php?admin/get_semesters_of_branch/' + branch_id,
            type: 'get',
            success: function (content) {
                $('.sfilter-rows').each(function (index) {
                    var custom_data_type = $(this).attr('data-type');
                    if (custom_data_type == 'semester') {
                        //$('#batch').append('<option value="">Select</option>');
                        var semester = $(this).attr('id');
                        var semester_id = '#' + semester;
                        $(semester_id).find('option').remove().end();
                        $(semester_id).append('<option value="">All</option>');
                        var semester = jQuery.parseJSON(content);
                        $.each(semester, function (key, value) {
                            alert('semid'+semester_id);
                            $(semester_id).append('<option data-id=' + value.s_id + ' value=' + value.s_name + '>' + value.s_name + '</option>');
                        });
                    }
                });
            }
        });
    }  

    function all_data2() {
        $('.sfilter-rows').each(function (index) {
            var custom_data_type = $(this).attr('data-type');
            if (custom_data_type == 'course')
                var course_id = '#' + $(this).attr('id');
            else if (custom_data_type == 'branch')
                var branch_id = '#' + $(this).attr('id');
            else if (custom_data_type == 'batch')
                var batch_id = '#' + $(this).attr('id');
            else if (custom_data_type == 'semester')
                var semester_id = '#' + $(this).attr('id');
            alert($(course_id).val());
            if($(course_id).val() == '') {
                location.reload();
            }
        });
    }
});

