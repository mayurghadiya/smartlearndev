<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1><?php echo $page_title?></h1>            
                        </div>
                    </div>                    
                    <div class="vd_content-section clearfix">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                               
                                    ?>
                                <form id="frmsurvey" name="frmsurvey" class="form-horizontal form-groups-bordered validate" accept-charset="UTF-8" enctype="multipart/form-data" method="post" novalidate="" action="<?=base_url()?>/index.php?student/participate/create">
                                    <ul>
                                        <li>
                                            <table class="table table-striped" id="data-tables_survey">
                                             <!--   <caption id="title1">As a student here: Please rate each of the following during your attendance, using a 1-5 scale where (1) means "Very dissatisfied" and (5) is "Very satisfied":</caption>-->
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <td>Yes</td>
                                                        <td>No</td>
                                                        <td>NO Opinion</td> 
                                                    </tr>
                                                </thead>                                                
                                                <tbody>
                                                <?php
                                               
                                                  $count = 1;
                                                 foreach($survey as $rows): ?>
                                                    <tr>
                                                        <th><label><?php echo $rows->question; ?> <span style="color:red">*</span></label></th>
                                                        <input  type="hidden" name="question_id<?php echo $count; ?>" value="<?php echo $rows->sq_id; ?>">
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field1_1" name="Field<?php echo $count; ?>" tabindex="1" value="1">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field1_2" name="Field<?php echo $count; ?>" tabindex="2" value="0">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field1_3" name="Field<?php echo $count; ?>" tabindex="3" value="2">
                                                            <label for="Field<?php echo $count; ?>" class="error">
                                                        </td>
                                                        <?php $count++; ?>
                                                    </tr>
                                                <?php  endforeach; ?>
                                                   
                                                </tbody>                                                
                                            </table>
                                        </li>                                                                                   
                                        <li class="buttons ">
                                             <label class="desc" ></label>
                                            <div><input type="submit" id="saveForm" name="saveForm" class="btn btn-info vd_bg-green" value="Add Survey"></div>
                                        </li>
                                    </ul>
                                </form>
                                <?php
                              
                                ?>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.validate.min.js"></script>
    
    
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function(form) {			
            form.submit();
        }
    });
    
    $().ready(function() {	
        
        jQuery.validator.addMethod("character", function(value, element) {
            return this.optional( element ) ||  /^[A-z]+$/.test( value );
        }, 'Please enter a valid character');
        
        $("#frmsurvey").validate({		
            
            rules: {
                <?php $countf = 1; foreach($survey as $counts): ?>
                Field<?php echo $countf; ?>: "required",
                <?php
$countf++;
                 endforeach; ?>
                strength: "required",
                weekness: "required",
            },
            messages: {
                <?php $counter = 1; foreach($survey as $countss): ?>
                Field<?php echo $counter; ?>: "Please select <?php  echo $countss->question; ?>",
                <?php $counter++; endforeach; ?> 
                strength: "Enter strength of our school",
                weekness: "Enter weekness of our school",				
            }
        });
    });
</script>
