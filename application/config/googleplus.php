<?php

$config['googleplus']['application_name'] = 'JapanWorks'; #Use must have to use same application name which you register with google. Using APIs & Auth->Consent Screen
$config['googleplus']['client_id'] = '714723005223-222sc8dk16q0kcud5pa0qkj4jieveci2.apps.googleusercontent.com';
$config['googleplus']['client_secret'] = 'kaTtXM-XOvH24rdPukHPrHF4';
$config['googleplus']['redirect_uri'] = 'http://staging.japan.vietnamworks.com/social/googlePlus'; #Add redirect url which you add in google console.
$config['googleplus']['api_key'] = 'AIzaSyCAp5ocudLRQuWdN3YNicid4DAF9uuKRmw'; #Add Browser Key
$config['googleplus']['scopes'] = Array('https://www.googleapis.com/auth/userinfo.email',
    'https://www.googleapis.com/auth/userinfo.profile');
$config['googleplus']['actions'] = Array('http://schemas.google.com/AddActivity');
