<!-- Footer Start -->
<footer id="footer"> 
    <div class="cs-footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-text">
                        <div class="widget-section-title"><h6 style="color:#fff !important">Contact us</h6></div>
                        <ul>
                            <li>
                                <i class="icon-light-bulb "></i>
                                <p>207, campus corner 2 , Opp. Prahladnagar Garden, Anandnagar road, Prahladnagar, Ahmedabad 380015</p>
                            </li>
                            <li>
                                <i class="icon-phone3"></i>
                                <p>079 40053399</p>
                            </li>
                            <li>
                                <i class="icon-mail"></i>
                                <p><a href="mailto:info@searchnative.in">info@searchnative.in</a></p>
                            </li>
                            <li>
                                <i class="icon-pin"></i>
                                <p>08:00 to 07:40</p>
                            </li>
                        </ul>	
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-categores">
                        <div class="widget-section-title"><h6 style="color:#fff !important">Programme & Courses</h6></div>
                        <ul>
                            <?php foreach ($courses as $course) { ?>
                                <li><a href="<?php echo base_url('course/' . $course->d_id); ?>"><?php echo $course->d_name; ?></a></li>
                            <?php } ?>
                        </ul>	
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-useful-links">
                        <div class="widget-section-title"><h6 style="color:#fff !important">Useful links</h6></div>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('about'); ?>">About</a></li>
                            <li><a href="<?php echo base_url('events'); ?>">Events</a></li>
                            <li><a href="<?php echo base_url('alumni'); ?>">Alumni</a></li>
                            <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                        </ul>	
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-news-letter">
                        <div class="widget-section-title"><h6 style="color:#fff !important">NewsLetter</h6></div>
                        <p>Subscribe to out newsletter. We do not spam. We promise</p>
                        <div class="cs-form">
                            <p class="hidden" id="subscribe-notification"></p>
                            <div class="input-holder">
                                <i class="icon-envelope3"></i>
                                <input id="email" type="email" required="" placeholder="example@email.com">
                                <label>
                                    <input id="subscribe" type="submit" value="Subscribe" class="cs-bgcolor">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="copyright-text">
                        <p>© 2016 Learning Management System. All Rights Reserved.<a class="cs-color" target="_blank" href="http://www.searchnative.in/"> Searchnative India Pvt. Ltd</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-social-media">
                        <ul>
                            <li><a href="https://www.facebook.com/SearchNativeIn" target="_blank"><i class="icon-facebook2"></i></a></li>
                            <li><a href="https://plus.google.com/+SearchnativeIndia" target="_blank"><i class="icon-google4"></i></a></li>
                            <li><a href="https://twitter.com/SearchNativeIn" target="_blank"><i class="icon-twitter2"></i></a></li>

                            <li><a href="https://www.linkedin.com/company/searchnative-india" target="_blank"><i class="icon-linkedin22"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>
<!-- Footer End --> 
</div>
</div>


<script>
    $(document).ready(function () {
        $('#subscribe').on('click', function () {
            var email_address = $('#email').val();
            if (email_address == '') {
                $('#subscribe-notification').attr('class', '');
                $('#subscribe-notification').html('Please enter email address');
            } else if (!isValidEmailAddress(email_address)) {
                $('#subscribe-notification').attr('class', '');
                $('#subscribe-notification').html('Please enter valid email address');
            } else {
                var form_data = {
                    email: email_address
                };
                $.ajax({
                    url: '<?php echo base_url(); ?>site/subscriber',
                    type: 'post',
                    data: form_data,
                    success: function (content) {
                        $('#subscribe-notification').attr('class', '');
                        $('#subscribe-notification').html(content);
                    }
                });
            }
        });

        function isValidEmailAddress(emailAddress) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return pattern.test(emailAddress);
        }
        ;
    })
</script>

<style>
    .cs-search-area{
        display: none;
    }
    .cs-menu-slide, .icon-search2{
        display: none;
    }
</style>

<script>eval(mod_pagespeed_n5auxpLi_K);</script> <!-- Slick Nav js --> 
<script src="<?php echo base_url(); ?>site_assets/scripts/chosen.select.js.pagespeed.jm.lPyT1rX_zq.js"></script> <!-- Chosen js --> 
<script src="<?php echo base_url(); ?>site_assets/scripts/slick.js.pagespeed.jm.l0TXLYnuWd.js"></script> <!-- Slick Slider js --> 
<script src="<?php echo base_url(); ?>site_assets/scripts/jquery.mCustomScrollbar.concat.min.js.pagespeed.jc.LFfyI898Qv.js">
</script>
<script>eval(mod_pagespeed_uCyK13KR_4);</script> 


<!-- Put all Functions in functions.js --> 
<script>eval(mod_pagespeed_NOO3SHeFLW);</script>


</body>

</html>