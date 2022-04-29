

<?php
    /*
      Plugin Name: creForm
      Plugin URI: https://wordpress.com
      Description: Create contact forms with ease
      Version: 0.1
      Author: CreForm .inc
      Author URI: https://wordpress.com  
    */

// Settings page in admin dashboard
function test_plugin(){
    add_menu_page( 'CreForm Plugin', 'creform Plugin', 'manage_options', 'test-plugin','wp_creform' );
}

add_action('admin_menu', 'test_plugin');

// adding form in wordpress
function wp_creform(){
   // $content = get_option( 'wp_message_value' );
    
    echo '<form action="" method="POST">';
    
?>
<h2>CreForm settings page</h2> 
<form action='' method='POST'>
<input type="checkbox" name="name" <?php if (get_option("wp_contact_fullname")=="on") { echo"checked"; } ?>  >
<label id='label'>Full Name</label> <br>
<input id='input' type='checkbox' name='adress'<?php if (get_option("wp_contact_adress")=="on") { echo"checked"; } ?>>
<label>Adress</label> <br>
<input type='checkbox' name='phone'<?php if (get_option("wp_contact_phone")=="on") { echo"checked"; } ?> >
<label>Phone number</label> <br>
<br>
<input type='checkbox' name='email'<?php if (get_option("wp_contact_email")=="on") { echo"checked"; } ?> >
<label>Email</label>
<br>
<input type='checkbox' name='subject'<?php if (get_option("wp_contact_subject")=="on") { echo"checked"; } ?> >

<label>Subject</label>
<br>
<input type='checkbox' name='message'<?php if (get_option("wp_contact_message")=="on") { echo"checked"; } ?>>
<label>Message</label>
<br>
<input class='btn' type='submit' name='submit' >
</form>

  <?php

//options
$name_option = "wp_contact_fullname";
$adress_option = "wp_contact_adress";
$phone_option = "wp_contact_phone";
$email_option = "wp_contact_email";
$subject_option = "wp_contact_subject";
$message_option = "wp_contact_message";
//values
$name_value =  0;
$adress_value =  0;
$phone_value =  0;
$city_value =  0;
$email_value = 0;
$subject_value =  0;
$message_value =  0;

if (isset($_POST["submit"])) { 
     
    if (isset($_POST['fullname'])) {
       $name_value =  $_POST['firstname'];
   }
   if (isset($_POST['adress'])) {
    $adress_value =  $_POST['adress'];
   }  
    if (isset($_POST['phone'])) {
    $phone_value =  $_POST['phone'];
   }  
    if (isset($_POST['city'])) {
       $city_value =  $_POST['city'];
   }
    if (isset($_POST['email'])) {
       $email_value =  $_POST['email'];
   }  
    if (isset($_POST['subject'])) {
    $subject_value =  $_POST['subject'];
   }  
    if (isset($_POST['message'])) {
       $message_value =  $_POST['message'];
   }  
     update_option( $name_option,$name_value );
     update_option( $adress_option,$adress_value );
     update_option( $phone_option,$phone_value );
     update_option( $city_option,$city_value );
     update_option( $email_option,$email_value );
     update_option( $subject_option,$subject_value );
     update_option( $message_option,$message_value );
}  
        
add_shortcode('form', 'return_value');  


function myForm()
{
  function getShortcode(){

    if(get_option('wp_contact_firstname') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "first name">';
    }
    if(get_option('wp_contact_lastname') == 'on'){
        echo '<input type="text" style="margin-bottom: 20px;" placeholder="last name">';
    }
    if(get_option('wp_contact_adress') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "Adress">';
    }
    if(get_option('wp_contact_phone') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "phone">';
    }
    if(get_option('wp_contact_city') == 'on'){
        echo '<input type="text" style="margin-bottom: 20px;" placeholder = "city">';
    }
    if(get_option('wp_contact_email') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "email">';
    }
    if(get_option('wp_contact_subject') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "subject">';
    }
    if(get_option('wp_contact_message') == 'on'){
        echo ' <input type="text" style="margin-bottom: 20px;" placeholder = "message">';
    }
    echo'<button style="width:100%;">Submit</button>';
}

}
add_shortcode("form","MyForm");
       

}