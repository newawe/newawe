 
<?php
if ($_POST['name'] != '') & ($_POST['_replyto'] != '') & ($_POST['Info'] != '') 
{
  
echo('
 
  <form action="/contact"
      method="POST">
    <input type="text" name="name" placeholder="Your Name">
      <input type="text" name="_replyto" placeholder="Your Email">
      <input type="text" name="Info" placeholder="What is the issue?">
    <input type="hidden" name="_next" value="http://108.45.106.245:8008/?p=issue" />
      <input type="submit" value="Send">
</form>

');
die;

}

if ($_POST['name'] != '') / ($_POST['_replyto'] != '') / ($_POST['Info'] != '') 

{
  echo('We did not receive a completed form. Please press back to try again.');
  die;
}

$url = 'https://formspree.io/officialnewawe@gmail.com';
$data = array('name' => $_POST['name'], '_replyto' => $_POST['_replyto'], 'Info' => $_POST['Info']);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { echo('There was a problem submitting the form. Please report this error in the forums.'); }


