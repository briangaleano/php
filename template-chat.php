<?php 
global $image_current_brand;
global $image_pet;

if (isset($_GET['influencer'])) {
  $user_brand_assignment = get_field('id_user_creator_brand', $_GET['id_assigment']);
  $user_influencer_assignment = get_field('id_influencer_assign', $_GET['id_assigment']);
  $image_pet = get_field('profile_image_pet_',$user_influencer_assignment);
  $image_current_brand = get_field('image_brand_user', 'user_'.$user_brand_assignment);;
  $temp = $image_pet;
  $temp2 = $image_current_brand;
  $image_current_brand = $temp;
  $image_pet = $temp2;

}
if (isset($_GET['id_pet'])) {
  //I AM BRAND-----------------------------------------------------
  $user_brand_assignment = get_current_user_id();
  $phone_twilio = get_field('phone_twilio', 'user_'.get_current_user_id());
  $phone_influencer = str_replace(" ", "",get_field('phone_number_influencer', 'user_'.$_GET['id_pet']));
  $phone_influencer = str_replace("(", "",$phone_influencer);
  $phone_influencer = str_replace(")", "",$phone_influencer);
  $phone_influencer = "+1".$phone_influencer;
  $phone_recevied_message = $phone_influencer;
  $id_pets = get_field('pets_id', 'user_'.$_GET['id_pet']);
  $array_pets = explode(",",$id_pets);
  $pet_id =  $array_pets[0] ;
  $user_influencer_assignment = $pet_id;
  $image_pet = get_field('profile_image_pet_',$user_influencer_assignment);
  $image_current_brand = get_field('image_brand_user', 'user_'.$user_brand_assignment);

}
if (isset($_GET['id_brand'])) {
  //I AM MUTTEL-----------------------------------------------------
  $phone_twilio = get_field('phone_number_influencer_twilio', 'user_'.get_current_user_id());
  $phone_brand = str_replace(" ", "",get_field('phone', 'user_'.$_GET['id_brand']));
  $phone_brand = str_replace("(", "",$phone_brand);
  $phone_brand = str_replace(")", "",$phone_brand);
  $phone_brand = "+1".$phone_brand;
  $phone_recevied_message = $phone_brand;
  $id_pets = get_field('pets_id', 'user_'.get_current_user_id());
  $array_pets = explode(",",$id_pets);
  $pet_id =  $array_pets[0] ;
  $user_influencer_assignment = $pet_id;
  $image_pet = get_field('profile_image_pet_',$user_influencer_assignment);
  $image_current_brand = get_field('image_brand_user', 'user_'.$_GET['id_brand']);;
  $temp = $image_pet;
  $temp2 = $image_current_brand;
  $image_current_brand = $temp;
  $image_pet = $temp2;
}
if (isset($_GET['id_conversation'])) {
  $id_conversation = $_GET['id_conversation'];
}
?>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase-database.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase-analytics.js"></script>
<!-- Latest compiled and minified CSS 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<script src="https://www.gstatic.com/firebasejs/7.10.0/firebase-storage.js"></script>
<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAZJjdBQBNT_VH3PiUcPiv6T8O90MBhgR8",
    authDomain: "muttelpet-e168e.firebaseapp.com",
    databaseURL: "https://muttelpet-e168e.firebaseio.com",
    projectId: "muttelpet-e168e",
    storageBucket: "muttelpet-e168e.appspot.com",
    messagingSenderId: "373998306065",
    appId: "1:373998306065:web:b370c84384994c7c7982b0",
    measurementId: "G-9VP01NDSXJ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

<div id="frame">
  <div class="upload-image" style="display:none"><h2>Uploading Image <span class="percentage">0%</span></h2></div>
	<div class="template-chat">
		<div class="messages" id="chatBox">
			<ul>
				
			</ul>
    </div>
    <?php if(isset($_GET['enable'])){ ?>
      <div class="message-input">
        <p class="text-suspend-chat">Temporarily suspended, you cannot reply.</p>
        <input type="file" value="upload" id="fileButton" style="display:none" accept="application/msword, application/vnd.ms-excel,text/plain, application/pdf, image/*,zip,application/zip,application/x-zip,application/x-zip-compressed,.psd,.rar,.csv,.php,.html,.css,application/octet-stream">
      </div>
    <?php }else{ ?>
      <div class="message-input">
        <div class="wrap container-message-to-send">
        <input type="text" class="text-send-" placeholder="Write your message..." />
        <div class="submit btn-send-message"><img src="<?php echo wp_upload_dir()['baseurl']?>/2020/03/send.png">
        <img class="attach-btn" src="<?php echo wp_upload_dir()['baseurl']?>/2020/05/attach.png"></div>
        <input type="file" value="upload" id="fileButton" style="display:none" accept="application/msword, application/vnd.ms-excel,text/plain, application/pdf, image/*,zip,application/zip,application/x-zip,application/x-zip-compressed,.psd,.rar,.csv,.php,.html,.css,application/octet-stream">
        </div>
      </div>
    <?php } ?>
	</div>
</div>


<script>
jQuery(document).ready(function(){
   //ref attch button to input
    jQuery(".attach-btn").click(function(){
        jQuery("#fileButton").click();
    });

    var fileButton = document.getElementById('fileButton');

    fileButton.addEventListener('change',function(e){
        //get file
        var file = e.target.files[0];
        var ext = e.target.files[0].type;
       
        var metadata = {
            contentType: ext
        };

        // Upload file and metadata to the object 'extension'
        //var uploadTask = storageRef.child('chat_images/' + file.name).put(file, metadata);
        var storageRef = firebase.storage().ref('chat_all_files/' + file.name).put(file, metadata);

        // Listen for state changes, errors, and completion of the upload.
        storageRef.on(firebase.storage.TaskEvent.STATE_CHANGED, // or 'state_changed'
        function(snapshot) {
            jQuery(".upload-image").css('display','block');
            // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            jQuery(".upload-image .percentage").text(progress.toFixed(2) + '% done');
            console.log('Upload is ' + progress + '% done');
            switch (snapshot.state) {
            case firebase.storage.TaskState.PAUSED: // or 'paused'
                console.log('Upload is paused');
                break;
            case firebase.storage.TaskState.RUNNING: // or 'running'
                console.log('Upload is running');
                break;
            }
        }, function(error) {
        // A full list of error codes is available at
        // https://firebase.google.com/docs/storage/web/handle-errors
        switch (error.code) {
            case 'storage/unauthorized':
            // User doesn't have permission to access the object
            break;
            case 'storage/canceled':
            // User canceled the upload
            break;
            case 'storage/unknown':
            // Unknown error occurred, inspect error.serverResponse
            break;
        }
        }, function() {
            // Upload completed successfully, now we can get the download URL
            storageRef.snapshot.ref.getDownloadURL().then(function(downloadURL) {
            SendFileChat(downloadURL,ext,file.name);
            jQuery(".upload-image").css('display','none');
        });
        });

    });
});
  jQuery(".messages").animate({ scrollTop: jQuery(document).height() }, "fast");
  var user_id = <?php echo get_current_user_id();?>;

  function newMessage() {
    
    message = jQuery(".message-input input").val();
    if(jQuery.trim(message) == '') {
      return false;
    }
    writeUserData(message);
  };

  jQuery('.submit').click(function() {
    newMessage();
  });

  jQuery(window).on('keydown', function(e) {
    if (e.which == 13) {
      newMessage();
      return false;
    }
  });
</script>

<script>
  
  // get firebase database reference...
  var db_ref = firebase.database().ref('/<?php echo $_GET['id_conversation']?>/');
  var date_temp = "";
  var hour_temp = "";
  var hour_temp2 = "";
  var count_hour = 0;
  date = new Date();
  var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
  currently_month = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1)));
  currently_day =  ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())); 
  var currently_time = date.getHours() + ":" + date.getMinutes();
  db_ref.on('child_added', function (data) {
    var type;
    if(data.val().user_id == user_id){
      type="replies";
    }
    else{
      type="sent";
    }
    
    if (data.val().type == 'automated_message'){
        jQuery('<li class="message-date"><p>'+data.val().date +' '+ data.val().hour +' (Automated Message)</p></li>').appendTo(jQuery('.messages ul'));
        jQuery('<div class="message-alert">'+data.val().message+'</div>').appendTo(jQuery('.messages ul'));
    }else if(data.val().type == 'complete_assignment'){
      jQuery('<li class="message-date"><p>'+data.val().date +' '+ data.val().hour +' (Automated Message)</p></li>').appendTo(jQuery('.messages ul'));
      jQuery('<div class="container_complete">'+data.val().message+'</div>').appendTo(jQuery('.messages ul'));
    }else{
      //print date-----------------------------------------------------------------------------------
      if (date_temp != data.val().date) {
        jQuery('<li class="message-date"><p>' + data.val().date +'</p></li>').appendTo(jQuery('.messages ul'));
        date_temp = data.val().date;
      }
      //print hour-----------------------------------------------------------------------------------
      if (hour_temp != data.val().hour) {
        if (count_hour == 0) {
          jQuery('<li class="message-date"><p>' + data.val().hour +'</p></li>').appendTo(jQuery('.messages ul'));
        }else{
          hour_temp2 = data.val().hour;
          if (hour_temp != undefined && hour_temp != "") {
            hour_temp = hour_temp.replace("AM","");
            hour_temp = hour_temp.replace("PM","");
            hour_temp2 = hour_temp2.replace("AM","");
            hour_temp2 = hour_temp2.replace("PM","");
            minutes_temp1 = hour_temp.split(":");
            minutes_temp2 = hour_temp2.split(":");
            calc_minutes =  (parseInt(minutes_temp2[1])) - (parseInt(minutes_temp1[1]));
            if (calc_minutes >= 5) {
              jQuery('<li class="message-date"><p>' + data.val().hour +'</p></li>').appendTo(jQuery('.messages ul'));
            }
          }
          hour_temp = hour_temp2;
        }
        count_hour++;
      }
    }


   
    //console.log(currently_time);
    //from sms -----------------------------------------------------------------------------------
    if (data.val().type == 'sms') {
      jQuery('<li class="message-date"><p>Via Mobile</p></li>').appendTo(jQuery('.messages ul'));
    }

    if (type == 'sent') {
      //print just now-------------------------------------------------------------------------------
      if ('<?php echo date("M d")?>' == data.val().date && '<?php echo date("h:i A")?>' == data.val().hour) {
        jQuery('<li class="message-date"><p>Just Now</p></li>').appendTo(jQuery('.messages ul'));
      }
      
      if (data.val().file_in_chat != undefined) {
        jQuery('<li class="'+type+' clear"><img src="<?php echo $image_pet?>"><p class="img_in_chat"><img src="' + data.val().file_in_chat + '"></p></li>').appendTo(jQuery('.messages ul'));
      }else if(data.val().type == undefined){
        jQuery('<li class="'+type+' clear"><img src="<?php echo $image_pet?>"><p>' + data.val().message + '</p></li>').appendTo(jQuery('.messages ul'));
      }
    }else if (type == 'replies'){
      //print just now----------------------------------------------------------------------------------------
      if ('<?php echo date("M d")?>' == data.val().date && '<?php echo date("h:i A")?>' == data.val().hour) {
        jQuery('<li class="message-date"><p>Just Now</p></li>').appendTo(jQuery('.messages ul'));
      }
      //------------------------------------------------------------------------------------------------------
      if (data.val().file_in_chat != undefined) {
        jQuery('<li class="'+type+' clear"><p class="img_in_chat"><img src="' + data.val().file_in_chat + '"></p><img src="<?php echo $image_current_brand?>"></li>').appendTo(jQuery('.messages ul'));
      }else if(data.val().type == undefined){
        jQuery('<li class="'+type+' clear"><p>' + data.val().message + '</p><img src="<?php echo $image_current_brand?>"></li>').appendTo(jQuery('.messages ul'));
      }
    } 

    jQuery('.message-input input').val(null);
    jQuery('.contact.active .preview').html('<span>You: </span>' + data.val().message);

    jQuery(".messages").animate({ scrollTop: jQuery(".messages")[0].scrollHeight }, 0);

    //waht is next------------------------------------------------------------------------------
    jQuery(".what-is-next").click(function(){
      jQuery(".notification-item.resend-assignment").css('display','block');
      jQuery(".notification-item.resend-assignment h6").text("What's Next?");
      jQuery(".notification-item.resend-assignment p").html("<p>It's time to equip Influencer with your Campign's products, service or promo content.</p>"
      + "<p>Some Pro Influencers may require payment before getting started. Please communicate with your Influencer directly.</p>"
      + "<p>Your Influencer’s delivery details and payment details (where applicable) are visible in this message string and your Assignments.</p>");
    });
    //counter offer---------------------------------------------------------------------------
    jQuery(".review-counter-offer").click(function(){
			jQuery(".notification-item.counter-offer-brand").css('display','block');
			var new_value_counter = jQuery(this).attr("new_value_counter");
			var name_pet = jQuery(this).attr("name_pet");
			var original_value_counter = jQuery(this).attr("original_value_counter");
			var id_assigment_counter = jQuery(this).attr("id_assigment");

			jQuery(".name_influencer_counter_").text(name_pet);
			jQuery(".payout_input").val(original_value_counter);
			jQuery(".counter_payout_input").val("$ "+new_value_counter);
			jQuery(".back.btn_counter_offer_brand").attr("id_assignment_counter", id_assigment_counter);
			jQuery(".submit.btn_counter_offer_brand").attr("id_assignment_counter", id_assigment_counter);
			
		});
  });

  function writeUserData(message) {

      db_ref.push({
            user_id: <?php echo get_current_user_id();?>,
            message: message,
            date: '<?php echo date("M d")?>',
            hour: '<?php echo date("h:i A")?>',
      });

      jQuery.ajax({
        type: 'post',
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data:{
            action: 'function_send_message_twilio',
            phone_twilio: '<?=$phone_twilio?>',
            phone_user_send: '<?=$phone_recevied_message?>',
            id_conversation: '<?php echo $_GET['id_conversation']?>',
            message_send: message
        },
        error: function(response){
            console.log(response);
        },
        success: function(response){
            console.log(response);
            
        }
      });
       jQuery(".messages").animate({ scrollTop: jQuery(".messages")[0].scrollHeight }, 0);
  }
  function SendFileChat(image,extension,name) {
        db_ref.push({
                user_id: <?php echo get_current_user_id();?>,
                date: '<?php echo date("M d")?>',
                hour: '<?php echo date("h:i A")?>',
                file_in_chat:image,
                name_document:name,
        });
        jQuery.ajax({
          type: 'post',
          url: "<?php echo admin_url('admin-ajax.php'); ?>",
          data:{
              action: 'function_send_message_mms_twilio',
              phone_twilio: '<?=$phone_twilio?>',
              phone_user_send: '<?=$phone_recevied_message?>',
              image_to_send: image,
              id_conversation: '<?php echo $_GET['id_conversation']?>'
          },
          error: function(response){
              console.log(response);
          },
          success: function(response){
              console.log(response);
          }
      });
       jQuery(".messages").animate({ scrollTop: jQuery(".messages")[0].scrollHeight }, 0);
    }

</script>