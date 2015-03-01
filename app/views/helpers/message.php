<?php
// file: /app/views/helpers/mysession.php

//Call method :
// $this->Session->write('flash', array('Car details has been saved!','success'));
/*
 * Mysession Helper
 * extends the CakePHP session helper
 *
 */
class MessageHelper extends SessionHelper {
    // init
    var $__active = true;

    // constructor
    function __construct($base = null) {
        // copied from the parent SessionHelper
        if (!defined('AUTO_SESSION') || AUTO_SESSION === true) {
            parent::__construct($base, false);
        } else {
            $this->__active = false;
        }
    }

    /*
     * flash()
     * flashes a message on the screen with a coloured box indicating success, failure or normal
     */
    function flash() {
        // init
        $output = '';

        // get the flash msg array from the session
        $data = parent::read('flash');

        // data looks like this
        // $data = array('flash message', 'success');

        // delete the session variable
        parent::delete('flash');

        // if the flash message is not empty
        if(!empty($data[0])) {
        // switch depending on flash type
            switch($data[1]) {
                case 'success':
                    // print out a div with a success class
                    $output .= '<div id="message-green">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody><tr>
                                            <td class="green-left">'.$data[0].'</td>
                                            <td class="green-right"><a class="close-green"><img alt="" src="img/table/icon_close_green.gif"></a></td>
                                    </tr>
                                    </tbody></table>
                                    </div>';
                    break;
                case 'failure':
                    // print out a div with a failure class
                    $output .= '<div id="message-red">
				<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tbody><tr>
					<td class="red-left">'.$data[0].'</td>
					<td class="red-right"><a class="close-red"><img alt="" src="img/table/icon_close_red.gif"></a></td>
				</tr>
				</tbody></table>
				</div>';
                    break;
                     case 'notice' :
                         $output .= '<div id="message-yellow">
				<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tbody><tr>
					<td class="yellow-left">'.$data[0].'</td>
					<td class="yellow-right"><a class="close-yellow"><img alt="" src="img/table/icon_close_yellow.gif"></a></td>
				</tr>
				</tbody></table>
				</div>';
                    break;
                default:
                    // print out a default flash class
                    $output .= '<div class="flash">'.$data[0].'</div>';
                    break;
            }
        }
    return $output;
    }
}


?>
