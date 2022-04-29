

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
    
    ?>
<h2>CreForm settings page</h2> 
<form action='' method='POST'>
    <input type="checkbox" name="name" >
    <label id='label'>Full Name</label> <br>
    <input id='input' type='checkbox' name='adress'>
    <label>Adress</label> <br>
    <input type='checkbox' name='phone'>
    <label>Phone number</label> <br>
    <br>
    <input type='checkbox' name='email'>
    <label>Email</label>
    <br>
    <input type='checkbox' name='subject'>
    <label>Subject</label>
    <br>
    <input type='checkbox' name='message'>
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
add_option('checker', 0);
//values
$name_value =  0;
$adress_value =  0;
$phone_value =  0;
$email_value = 0;
$subject_value =  0;
$message_value =  0;

if (isset($_POST["submit"])) { 
    if (isset($_POST['name'])) {
        $name_value =  $_POST['name'];
        echo '<script>console.log('.$name_value.');</script>';
    }
   if (isset($_POST['adress'])) {
    $adress_value =  $_POST['adress'];
   }  
    if (isset($_POST['phone'])) {
        $phone_value =  $_POST['phone'];
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
          update_option( $email_option,$email_value );
          update_option( $subject_option,$subject_value );
          update_option( $message_option,$message_value );

        
    }  
    
}
function myForm()
{
    $c = '';
    $c.='<h1 class="text-center">Contact Us</h1>';
    $c.='<form id= "contact" method="post">';
    if(get_option("wp_contact_fullname") == "on"){
        $c.='<label for="name">Name</label>';
        $c.= '<input type="text" name="name" placeholder="name" class="form-control"/>';
    }
    
    if(get_option("wp_contact_email") == "on")
    {
        $c.='<label for="email">Email</label>';
        $c.= '<input type="text" name ="email" placeholder="email" class="form-control"/>';
    }
    if(get_option("wp_contact_phone") == "on")
    {
        $c.='<label for="Phone">Phone Number</label>';
        $c.= '<input type="text" name="Phone" class="form-control" placeholder="Phone Number"/>';
    }
    if(get_option("wp_contact_adress") == "on")
    {
        $c.='<label for="adress">adress</label>';
        $c.='<input type="text" name="adress" class="form-control" placeholder="Enter your adress"/>';
    }
    if(get_option("wp_contact_subject") == "on")
    {
        $c.='<label for="subject">Subject</label>';
        $c.='<input type="text" name="subject" class="form-control" placeholder="Enter your subject"/>';
    }
    if(get_option("wp_contact_message") == "on")
    {
        $c.='<label for="message">Message</label>';
        $c.='<input type="text" name="message" class="form-control" placeholder="Enter your message"/>';
    }
    
    $c.= '</br><input id="btnsubmit" type="submit" name="form-submit" value="Send Information" class="btn btn-primary">';
    $c.='</form>';
    return $c;
}
add_shortcode("form","myForm");

?>

<style>
    #contact{
        display: flex;
        flex-direction: column;
    }
    
    #btnsubmit{
        width: 50%;
    }
</style>