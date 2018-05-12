<?php
$mailSent= false;
$suspect = false;
$pattern = '/Content-type:|Bcc:|Cc:/i';

function isSuspect($value, $pattern, &$suspect){
    if (is_array($value)){
        foreach($value as $item){
            isSuspect($item, $pattern, $suspect) ;
        }
    }else {
        if (preg_match($pattern, $value)) {
            $suspect = true;
        }
    }
}

isSuspect($_POST,$pattern, $suspect);

if (!$suspect) :
    foreach ($_POST as $key =>$value) {
    $value = isarray($value) ?$value :trim($value);
    if (empty($value)&& in_array($key,$required)){
        $missing[] = $key;
        $$key='';
    } elseif(in_array($key,$expected)){
        $$key=$value;
    }
}
//Validate email
    if (!missing && !empty($email)) :
    $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($validemail){
        $headers[] = "Reply-to: $validemail";
    } else {
        $errors['email'] = true;
    }

    endif;
    //if no error create header and message body
    if(!$errors && !$missing) :
        $headers = implode("\r\n", $headers);
        //Initialize mess
    $message ='';
    foreach($expected as $field):
        if (isset($$field)&&!empty($$field)){
           $val = $$field;  
        }else{
            $val = 'Not selected';
        }
    //   if and array expand to comma-separated string
        if(is_array($val)) {
            $val = implode(',',$val);
        }
        
    //Replace underscore in the field
        $field = str_replace('_',' ', $field);
        $message .= ucfirst($field).": $val\r\n\r\n";
    endforeach;
    $message = wordrap($message, 70);
    $mailSent = mail($to, $subject, $message, $headers, $authorized);
    if(!$mailsent) {
        $errors['mailfail']=true;
    }
    endif;
endif;