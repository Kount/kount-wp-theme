jQuery(document).ready(function($) {
  admin.init();
});

let admin = {
  init() {
    this.setEventListeners();
  },
  setEventListeners() {
    jQuery('#copy-to-events-button').click(admin.copyDataToEvents);
    jQuery('#copy-to-webinars-button').click(admin.copyDataToWebinars);
  },
  copyDataToEvents() {
    jQuery('#copy-to-events-button').prop('disabled', true);
    let $nonce = copy_data_params.nonce;
    let $webinarId = copy_data_params.post_id;
    let $ajaxURL = copy_data_params.ajax_url;
    // let $postType = copy_data_params.post_type;
    // alert($webinarId);
    jQuery.ajax({
      type : "post",
      dataType : "json",
      url : $ajaxURL,
      data : {action: "copy_webinar_data_to_events", webinar_id : $webinarId, nonce: $nonce},
      success: function(response) {

        if(response.ID) {
          // jQuery("#like_counter").html(response.like_count);
          // echo JSON.stringify(response);
          // console.log(response);
          jQuery('#copy-to-events-button-container').append('<p><strong>Event Successfully Created!</strong> <a href="/wp-admin/post.php?post=' + response.ID + '&action=edit">View Event ID: ' + response.ID + '</a></p>');
        }
        else {
          alert("The Event could not be added.");
        }
      }
    });
  },
  copyDataToWebinars() {
    jQuery('#copy-to-webinars-button').prop('disabled', true);
    let $nonce = copy_data_params.nonce;
    let $eventId = copy_data_params.post_id;
    let $ajaxURL = copy_data_params.ajax_url;
    // let $postType = copy_data_params.post_type;
    // alert($webinarId);
    jQuery.ajax({
      type : "post",
      dataType : "json",
      url : $ajaxURL,
      data : {action: "copy_event_data_to_webinars", event_id : $eventId, nonce: $nonce},
      success: function(response) {

        if(response.ID) {
          // jQuery("#like_counter").html(response.like_count);
          // echo JSON.stringify(response);
          // console.log(response);
          jQuery('#copy-to-webinars-button-container').append('<p><strong>Webinar Successfully Created!</strong> <a href="/wp-admin/post.php?post=' + response.ID + '&action=edit">View Webinar ID: ' + response.ID + '</a></p>');
        }
        else {
          alert("The Webinar could not be added.");
        }
      }
    });
  },
}
