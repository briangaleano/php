<?php
/* Template Name: Assign Campaign */
get_header();


?>


<div class="containers">
    <div class="containers-wrap containers-wrap--960">
        <h1 class="h3"><?php the_title(); ?></h1>
        <div class="container-form--full">
            <div class="section-dashboard-3">
                <div id="dashboard-main-assign">
                    <ul>
                        <li id="select_campaign_campa" class="active-dash-assign">
                            <a href="#">Select Campaign</a>
                        </li>
                        <li id="Choose_Ambassadors_campa">
                            <a href="#">Choose Ambassadors</a>
                        </li>
                        <li id="Confirm_Assignment_campa">
                            <a href="#">Confirm Assignment</a>
                        </li>
                    </ul>
                </div>
                <div id="dashboard-content">
                    <div class="select_campaign">
                        <p>Select which Campaign to assign to Influencers.</p>
                        <?php echo do_shortcode('[campaing_select]');?>
                        <input type="text" style="display:none" id="id_campaign_to_assign">
                        <input type="text" style="display:none" id="cate_campaign_to_assign">
                        <input type="text" style="display:none" id="image_campaign_to_assign">
                        <input type="text" style="display:none" id="name_campaign_to_assign">
                        <input type="button" id="next_step_1" class="gform_next_button button next_step_assign" value="Continue" >
                    </div>
                    <div class="Choose_Ambassadors">
                        <div class="container-campaign-">
                            <p class="name_assign_step2"> You are assigning <span></span></p>
                            <?php echo do_shortcode('[search_assigns]');?>                        
                            <div class="filter-assignment">  <?php echo do_shortcode('[searchandfilter id="15362"]');?></div>
                            <?php echo '<p class="posts_found_assign"><span></span> Results | <a>Clear All Filters</a></p>';?>
                            <?php echo '<div class="container_pet_selected"></div>';?>
                            <div style="display:none" class="load-data-15362"><img src="<?=get_stylesheet_directory_uri()?>/images/loading.gif"></div>
                            <?php echo '<div style="display:none" class="container-search-15362">'.do_shortcode('[searchandfilter id="15362" show="results"]').'</div>'?>
                            <input type="text" id="id_assign_to_campaign" style="display:none">
                            <input type="button" id="prev_step_2" class="gform_next_button button next_step_assign" value="Back" >
                            <input type="button" id="next_step_2" class="gform_next_button button next_step_assign" value="Continue" >
                            <?php
                                if (isset($_GET['id_pet'])) {
                                    $pet_for_assing = $_GET['id_pet'];
                                    echo '<script></script>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="Confirm_Assignment clear">
                            <div class="assigment-summary">
                                <h3>Assignment Summary</h3>
                                <div class="assigment-summary__campaign">
                                    <p>Your Campaign</p>
                                    <div class="actual-campaing">
                                        <div class="actual-campaign__info">
                                            <img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/2491a89e83913fc801ca195272617a4e.png" alt="">
                                            <p><strong>iFetch Go</strong><span>Product</span></p>
                                        </div>
                                        <a class="actual-campaing__change">Change</a>
                                    </div>
                                </div>
                                <img src="../../wp-admin/images/wpspin_light-2x.gif" class="load_pets">
                                <div class="assigment-summary__assigments" style="display:none">
                                        <span></span>
                                        <div class="assigments__ambassador">
                                            <img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/49761594_222072135394437_269983997868638208_n.jpg" alt="">
                                            <p><strong>Ambassador FirstName</strong> <span><img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-8991.png" alt=""></span> <span><img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-8989.png" alt=""></span> <a href="#" class="assigments__ambassador-close"><span>X</span></a></p>
                                        </div>
                                        <div class="assigments__ambassador">
                                            <img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/49761594_222072135394437_269983997868638208_n.jpg" alt="">
                                            <p><strong>Ambassador FirstName</strong> <span><img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-8991.png" alt=""></span> <span><img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-8989.png" alt=""></span> <a href="#" class="assigments__ambassador-close"><span>X</span></a></p>
                                        </div>
                                        <div class="assigments__ambassador">
                                            <img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/49761594_222072135394437_269983997868638208_n.jpg" alt="">
                                            <p><strong>Ambassador FirstName</strong> <span><img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-8991.png" alt=""></span> <span><img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-8989.png" alt=""></span> <a href="#" class="assigments__ambassador-close"><span>X</span></a></p>
                                        </div>
                                        <div class="assigments__foot"><a href="#">Edit</a></div>
                                    </div>
                            </div>
                            <div class="assigment-summary-right">
                                <p>You are about to send <b></b></p>
                                <div class="check-test">
                                    <label class="container">
                                        <input type="checkbox">
                                        <span class="checkmark i_agree_to_muttel"></span> I agree to Muttel Pet <a href="/terms-and-conditions/" target="blank_">Terms and Conditions.</a>
                                    </label>
                                </div>
                                <img src="../../wp-admin/images/wpspin_light-2x.gif" class="load_assign_campaign">
                                <input class="assign_campaign_submit" type="button" value="Assign Campaign">
                                <p class="desciption_sec_assign_campaign">Social media influencers ultimately own their content. It is your responsibility to respect that right.</p>
                            </div>
                    </div>
                </div>
            </div>
            <?php //echo do_shortcode( '[gravityform id="10" title="false" description="false" ajax="true"]' ); ?>
        </div>
    </div>
    <!-- <a href="#" data-toggle="modal" data-target="#exampleModal">Modal</a> -->
</div>
<?php echo '<div class="script_heart"></div>';?>
<script>
jQuery(document).on("sf:init", ".searchandfilter", function(){
        console.log("S&F JS initialised");

        var pets_assign = "<?=$pet_for_assing?>";
        jQuery(".ambassadors__item-check").each(function(){
            var val_current = jQuery(" div label input",this).val();
            if (val_current == pets_assign) {
                jQuery(" div label span",this).click();
            }
        });
});
function hear_fav(obj){
    jQuery(obj).toggleClass("heart-active");
}
jQuery(document).ready(function($) {

    //pro influencer filter
    /*jQuery("input#price-filter").click(function(){
        if(jQuery(this).is(":checked")){
            jQuery('li.sf-field-taxonomy-pro-influencer label select.sf-input-select option[value="no"]').attr("selected", "selected")
            jQuery("li.sf-field-submit input").click();
        }else{
            jQuery('li.sf-field-taxonomy-pro-influencer label select.sf-input-select option[value=""]').attr("selected", "selected")
            jQuery("li.sf-field-submit input").click();
        }
    });*/

    //assign the influencer to the campaign--------------------------------------------------------------
    jQuery("input.assign_campaign_submit").click(function(){
        if (jQuery("#id_assign_to_campaign").val() != '') {
            var ids = jQuery("#id_assign_to_campaign").val();
            var id_camp = jQuery("#id_campaign_to_assign").val();
            var cat_camp = jQuery("#cate_campaign_to_assign").val();
            var name_camp = jQuery("#name_campaign_to_assign").val();
            jQuery.ajax({
                type: 'post',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data:{
                    action: 'create_assignment',
                    id_pets: ids,
                    id_campaign: id_camp,
                    name_campaign:name_camp,
                    category_campaign:cat_camp,
                },
                error: function(response){
                    console.log("error");
                },
                beforeSend: function() {
                    jQuery(".load_assign_campaign").css('display','block');
                    jQuery(".assign_campaign_submit").css({'opacity':'0.5','pointer-events':'none'});
                },
                success: function(response){
                    var user_brand_id = '<?php echo get_current_user_id();?>';
                    //console.log(response.all_name);
                    jQuery.each(response.html, function( index, value ) {
                       var db_ref = firebase2.database().ref('/'+user_brand_id+value+'/');
                        db_ref.push({
                                user_id: <?php echo get_current_user_id();?>,
                                message: '<img src="<?php echo wp_upload_dir()['baseurl']?>/2020/03/time.png" alt="time"><strong>'+response.all_name[index]+'</strong> has 48 hours to respond.',
                                date: '<?php echo date("M d")?>',
                                hour: '<?php echo date("h:i A")?>',
                                type: 'automated_message',
                        });
                    });

                    jQuery.ajax({
                        type: 'post',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data:{
                            action: 'function2_send_message_twilio',
                            all_influencer: JSON.stringify( response.html),
                            message: 'You have a new assignment',
                            message_brand: 'You made new assignments',
                        },
                        error: function(res){
                            console.log(res);
                        },
                        success: function(res){
                            //console.log(res);
                            window.location.href = response.redirect;
                        }
                    });

                    jQuery(".assign_campaign_submit").css({'opacity':'0.5','pointer-events':'none'});
                }
            });
        }
    });
    //-------------------------------------------------------------------------------------------------------
    jQuery("div#search_assign .search_assign").click(function(e){
        if (e.offsetX > e.target.offsetLeft) {
             jQuery("li.sf-field-submit input").click();
        }
    });
    jQuery(document).on("sf:ajaxfinish", ".searchandfilter", function(){

        var pets_ids = jQuery("#id_assign_to_campaign").val();
        var result_pets_ids = pets_ids.split(',');
        jQuery(".ambassadors__item-check").each(function(){
            var val_current = jQuery(" div label input",this).val();
            if (jQuery.inArray(val_current,result_pets_ids) != -1) {
                jQuery(" div label span",this).click();
            }
        });

        jQuery(".load-data-15362").css('display','none');
        jQuery(".container-search-15362").css('display','block');


        /*var active_fav = jQuery('.first_heart_assign [for="heart-favor-assign"]').hasClass('heart-active');
        if (active_fav) {
            jQuery(".ambassadors").each(function(){
                var fav_single = jQuery(" ul li div .ambassadors__item-heart .fav_heart_single_pet [for='heart']",this).hasClass('heart-active');
                if (!fav_single) {
                    jQuery(this).css("display","none");
                }
            });
        }*/

        /*jQuery(".checkmark").click(function(){
			var parent = jQuery(this).parent();

			setTimeout(function(){ 
				if(jQuery(" input",parent).is(":checked")){
					var id_pet_select = jQuery(" input",parent).val();
					console.log(jQuery(" input",parent).val());
					var info =  jQuery("input#id_assign_to_campaign").val();
					jQuery("input#id_assign_to_campaign").val(info + id_pet_select+",");
				}else{
					var id_pet_select = jQuery(" input",parent).val();
					var info =  jQuery("input#id_assign_to_campaign").val();
					var res = info.replace(id_pet_select+",", "");
					jQuery("input#id_assign_to_campaign").val(res);
				}
			},200);
		
		});*/

        jQuery(".fav_heart_single_pet label i").unbind('click').click(function(){
			setTimeout(() => {
				if(jQuery(this).parent().hasClass("heart-active"))
				{
					var pet = jQuery(this).parent().parent().attr("pet_id");
					jQuery.ajax({
						type: 'post',
						url: "<?php echo admin_url('admin-ajax.php'); ?>",
						data:{
							action: 'save_favorite_pet_user_bran',
							id_pet: pet,
						},
						error: function(response){
							console.log("error");
						},
						success: function(response){
							console.log(response);
						}
						
					});
				}else{
					var pet = jQuery(this).parent().parent().attr("pet_id");
					jQuery.ajax({
						type: 'post',
						url: "<?php echo admin_url('admin-ajax.php'); ?>",
						data:{
							action: 'delete_favorite_pet_user_bran',
							id_pet: pet,
						},
						error: function(response){
							console.log("error");
						},
						success: function(response){
							console.log(response);
						}
						
					});
				}
			}, 200);
		});
        console.log("ajax complete");
    });
});
</script>
<?php
 get_footer(); ?>
