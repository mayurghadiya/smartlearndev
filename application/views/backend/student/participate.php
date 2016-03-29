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
                    <?php if($this->session->flashdata('flash_message')){ ?>
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h4><?php echo $this->session->flashdata('flash_message'); ?></h4>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="vd_content-section clearfix">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                if(!empty($survey))
                                {
                                   echo "<script>alert('Survey already added');</script>";
                                }
                                else
                                {
                                    ?>
                                <form id="frmsurvey" name="frmsurvey" class="form-horizontal form-groups-bordered validate" accept-charset="UTF-8" enctype="multipart/form-data" method="post" novalidate="" action="<?=base_url()?>/index.php?student/participate/create">
                                    <ul>
                                        <li>
                                            <table class="table table-striped" id="data-tables_survey">
                                             <!--   <caption id="title1">As a student here: Please rate each of the following during your attendance, using a 1-5 scale where (1) means "Very dissatisfied" and (5) is "Very satisfied":</caption>-->
                                                <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <td>Very Dissatisfied</td>
                                                        <td>Dissatisfied</td>
                                                        <td>Neutral</td>
                                                        <td>Satisfied</td>
                                                        <td>Very Satisfied</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th><label for="Field1">Academic quality</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field1_1" name="Field1" tabindex="1" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field1_2" name="Field1" tabindex="2" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field1_3" name="Field1" tabindex="3" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field1_4" name="Field1" tabindex="4" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field1_5" name="Field1" tabindex="5" value="Very Satisfied">
                                                            <label for="Field1" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field2">Co-curricular/ Extra-curricular life</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field2_1" name="Field2" tabindex="6" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field2_2" name="Field2" tabindex="7" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field2_3" name="Field2" tabindex="8" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field2_4" name="Field2" tabindex="9" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field2_5" name="Field2" tabindex="10" value="Very Satisfied">
                                                            <label for="Field2" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field3">College facilities</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field3_1" name="Field3" tabindex="11" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field3_2" name="Field3" tabindex="12" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field3_3" name="Field3" tabindex="13" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field3_4" name="Field3" tabindex="14" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field3_5" name="Field3" tabindex="15" value="Very Satisfied">
                                                            <label for="Field3" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field4">Value of a degree from here</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field4_1" name="Field4" tabindex="16" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field4_2" name="Field4" tabindex="17" value="Dissatisfied">
                                                           
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field4_3" name="Field4" tabindex="18" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field4_4" name="Field4" tabindex="19" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field4_5" name="Field4" tabindex="20" value="Very Satisfied">
 <label for="Field4" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field5">Faculty caliber</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field5_1" name="Field5" tabindex="21" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field5_2" name="Field5" tabindex="22" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field5_3" name="Field5" tabindex="23" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field5_4" name="Field5" tabindex="24" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field5_5" name="Field5" tabindex="25" value="Very Satisfied">
                                                            <label for="Field5" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field6">Student ability/motivation</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field6_1" name="Field6" tabindex="26" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field6_2" name="Field6" tabindex="27" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field6_3" name="Field6" tabindex="28" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field6_4" name="Field6" tabindex="29" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field6_5" name="Field6" tabindex="30" value="Very Satisfied">
                                                            <label for="Field6" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field7">Student body diversity</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field7_1" name="Field7" tabindex="31" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field7_2" name="Field7" tabindex="32" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field7_3" name="Field7" tabindex="33" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field7_4" name="Field7" tabindex="34" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field7_5" name="Field7" tabindex="35" value="Very Satisfied">
                                                            <label for="Field7" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field8">Cost to attend here</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field8_1" name="Field8" tabindex="36" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field8_2" name="Field8" tabindex="37" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field8_3" name="Field8" tabindex="38" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field8_4" name="Field8" tabindex="39" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field8_5" name="Field8" tabindex="40" value="Very Satisfied">
                                                            <label for="Field8" class="error"></label>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <th><label for="Field9">Reputation of the college</label></th>
                                                        <td title="Very Dissatisfied">
                                                            <input type="radio" id="Field9_1" name="Field9" tabindex="41" value="Very Dissatisfied">
                                                        </td>
                                                        <td title="Dissatisfied">
                                                            <input type="radio" id="Field9_2" name="Field9" tabindex="42" value="Dissatisfied">
                                                        </td>
                                                        <td title="Neutral">
                                                            <input type="radio" id="Field9_3" name="Field9" tabindex="43" value="Neutral">
                                                        </td>
                                                        <td title="Satisfied">
                                                            <input type="radio" id="Field9_4" name="Field9" tabindex="44" value="Satisfied">
                                                        </td>
                                                        <td title="Very Satisfied">
                                                            <input type="radio" id="Field9_5" name="Field9" tabindex="45" value="Very Satisfied">
 <label for="Field9" class="error"></label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li >
                                            <label class="desc" >What are the greatest strengths of our school today?</label>
                                            <div>
                                                <textarea id="strength" name="strength" class="form-control" spellcheck="true" rows="10" cols="50" tabindex="46"></textarea>
                                            </div>
                                        </li>
                                        <li >
                                            <label class="desc" >What are the greatest weaknesses of our school today?</label>
                                            <div>
                                                <textarea id="weekness" name="weekness" class="form-control" spellcheck="true" rows="10" cols="50" tabindex="47"></textarea>
                                                    
                                            </div>
                                        </li>
                                            
                                        <li class="buttons ">
                                             <label class="desc" ></label>
                                            <div><input type="submit" id="saveForm" name="saveForm" class="btTxt submit" value="Add Survey"></div>
                                        </li>
                                    </ul>
                                </form>
                                <?php
                                }
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
                Field1: "required",
                Field2: "required",
                Field3: "required",
                Field4: "required",
                Field5: "required",
                Field6: "required",
                Field7: "required",
                Field8: "required",
                Field9: "required",
                strength: "required",
                weekness: "required",
            },
            messages: {
                Field1: "Please select academic quality",
                Field2: "Please select co-curricular/ extra-curricular life",
                Field3: "Please select college facilities",
                Field4: "Please select value of a degree from here",
                Field5: "Please select faculty caliber",
                Field6: "Please select student ability/motivation",
                Field7: "Please select student body diversity",
                Field8: "Please select cost to attend here",
                Field9: "Please select reputation of the college",
                strength: "Enter strength of our school",
                weekness: "Enter weekness of our school",				
            }
        });
    });
</script>
