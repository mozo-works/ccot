<?php

function validateEmail($email, $domainCheck = true, $verify = true, $return_errors=true) {
    global $debug;
    if($debug) {echo "<pre>";}
    $errors = array();
    # Check syntax with regex
    if (preg_match('/^([a-zA-Z0-9\._\+-]+)\@((\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,7}|[0-9]{1,3})(\]?))$/', $email, $matches)) {
        $user = $matches[1];
        $domain = $matches[2];
        # Check availability of DNS MX records
        if ($domainCheck && function_exists('checkdnsrr')) {
            # Construct array of available mailservers
            if(getmxrr($domain, $mxhosts, $mxweight)) {
                for($i=0;$i<count($mxhosts);$i++){
                    $mxs[$mxhosts[$i]] = $mxweight[$i];
                }
                asort($mxs);
                $mailers = array_keys($mxs);
            } elseif(checkdnsrr($domain, 'A')) {
                $mailers[0] = gethostbyname($domain);
            } else {
                $mailers=array();
            }
            $total = count($mailers);
            # Query each mailserver
            if($total > 0 && $verify) {
                # Check if mailers accept mail
                for($n=0; $n < $total; $n++) {
                    # Check if socket can be opened
                    if($debug) { echo "Checking server $mailers[$n]...\n";}
                    $connect_timeout = 20;
                    $errno = 0;
                    $errstr = 0;
                    $probe_address = 'prod@visualtheater.net';
                    # Try to open up socket
                    if($sock = fsockopen($mailers[$n], 25, $errno , $errstr, $connect_timeout)) {
                        $response = fgets($sock);
                        if($debug) {echo "Opening up socket to $mailers[$n]... Succes!\n";}
                        stream_set_timeout($sock, 5);
                        $meta = stream_get_meta_data($sock);
                        if($debug) { echo "$mailers[$n] replied: $response\n";}
                        $cmds = array(
                            "HELO www.visualtheater.net",  # Be sure to set this correctly!
                            "MAIL FROM: <$probe_address>",
                            "RCPT TO: <$email>",
                            "QUIT",
                        );
                        # Hard error on connect -> break out
                        if(!$meta['timed_out'] && !preg_match('/^2\d\d[ -]/', $response)) {
                            $error = "Error: $mailers[$n] said: $response\n";
                            break;
                        }
                        foreach($cmds as $cmd) {
                            $before = microtime(true);
                            fputs($sock, "$cmd\r\n");
                            $response = fgets($sock, 4096);
                            $t = 1000*(microtime(true)-$before);
                            if($debug) {echo htmlentities("$cmd\n$response") . "(" . sprintf('%.2f', $t) . " ms)\n";}
                            if(!$meta['timed_out'] && preg_match('/^5\d\d[ -]/', $response)) {
                                $error = "Unverified address: $mailers[$n] said: $response";
                                break 2;
                            }
                        }
                        fclose($sock);
                        if($debug) { echo "Succesful communication with $mailers[$n], no hard errors, assuming OK";}
                        break;
                    } elseif($n == $total-1) {
                        $errors = "None of the mailservers listed for $domain could be contacted";
                    }
                }
            } else {
                $error = "No usable DNS records found for domain '$domain'";
            }
        }
    } else {
        $error = 'Address syntax not correct';
    }
    if($debug) { echo "</pre>";}
    #echo "</pre>";
    if($return_errors) {
        # Give back details about the error(s).
        # Return FALSE if there are no errors.
        # Keep this in mind when using it like:
        # if(checkEmail($addr)) {
        # Because of this strange behaviour this
        # is not default ;-)
		if(isset($error)) return htmlentities($error); else return false;
    } else {
        # 'Old' behaviour, simple to understand
        if(isset($error)) return false; else return "Á¤»ó";
    }
}
?>