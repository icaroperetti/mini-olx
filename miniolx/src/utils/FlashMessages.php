<?php

    namespace App\utils;
    
    class FlashMessages{

        public static function setMessage($messages,$type = 'info'){
            $session_messages = (isset($_SESSION['messages'][$type])) ? $_SESSION['messages'][$type] : [];

            if(is_array($messages)){
                $session_messages = array_merge($session_messages,$messages);
            }else{
                $session_messages[] = $messages;
            }
            $_SESSION['messages'][$type] = $session_messages;
        }

        public static function getMessages($type = 'info'){
            $messages = null;
            if(isset($_SESSION['messages'][$type])){
                $messages =  $_SESSION['messages'][$type];
                unset($_SESSION['messages'][$type]);
            }
            return $messages;
        }
    }

?>