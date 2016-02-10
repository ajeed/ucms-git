<?php
/* load a Controller for use by the Email component */
App::import('Core', 'Controller');
/* load the Email component */
App::import('Component', 'Email');
 
class MailTask extends Shell {
  /**
   * Controller used to access the view for sending mail
   * 
   * @access private
   */
  private $Controller = null;
 
  /**
   * CakePHP Email component
   * 
   * @access private
   */
  private $Email = null;
 
  /**
   * Default SMTP server options
   * 
   * @access private
   */
  private $smtpDefaults = array(
        'port'=>'26', 
        'timeout'=>'15',
        'host' => 'mail.silverspeed.com.my',
        'username' => 'admin@silverspeed.com.my',
        'password' => '~J}zZ~Mn$Xs7',
    	'messageId' => true
    );
 
  /**
   * User defined SMTP options
   * Associative array of options for smtp mailer (port, host, timeout, username, password)
   * 
   * @access public
   */
  public $smtpOptions = array();
 
  /**
   * Mail sending errors
   * 
   * @access public
   */
  public $errors = null;
 
  /**
   * Constructor
   * Setup an empty Controller and the Email component
   * 
   * @access public
   * @param object $dispatch Instance of the ShellDispatcher object that loaded this script.  This is passed automatically by CakePHP.
   * @return void
   */
  public function __construct(&$dispatch) {
    $this->Controller =& new Controller();
        $this->Email =& new EmailComponent(null);
        $this->Email->Controller = $this->Controller;
        parent::__construct($dispatch);
    }
 
  /**
   * Main task function. Shells will call this method to start the task logic
   *
   * @access public
   */
  public function execute() {}
 
  /**
   * Set the user defined SMTP server options
   * 
   * @param array $options Array of SMTP server information
   * @return void
   */
  public function setSmtpOptions($options = array()) {
    $this->smtpOptions = array_merge($this->smtpDefaults, $options);
  }
 
  /**
   * Send an email message
   * 
   * @param string $to Email address(es) to send the message to.  Use comma separated list to send to multiple addresses.
   * @param string $subject Subject of the email message.
   * @param string $from Email address of the message sender.
   * @param string $template CakePHP email template to use for the message.
   * @param mixed $msgData Optional data to be passed to the email message template.  Available in the template as $msgData;
   * @param string $sendAs Format to send the message as (text, html, both).  Default is "both".
   * @param array $cc Optional array of email addresses to CC the message to.
   * @param array $bcc Optional array of email addresses to BCC the message to.
   * @param string $replyTo Email address to use as the "reply to" address. Default is the $from address.
   * @param string $return Optional email address to send bounce messages/errors to.  Default is the $from address.
   * @param string $charset Character set to use when sending the email.  Default is 'UTF8'.
   * @return bool True if the message is successfully sent, False if not
   */
  public function sendmail($to, $subject, $from, $template, $msgData = null, $sendAs = 'both', $cc = null, $bcc = null, $replyTo = null, $return = null, $charset = 'UTF8') {
    /* reset the Email component */
    $this->Email->reset();
 
        $this->Email->to = $to;
        $this->Email->subject = $subject;
        $this->Email->from = $from;
        $this->Email->template = $template;
        $this->Email->sendAs = $sendAs;
    if(!empty($bcc)) {
      $this->Email->bcc = (is_array($bcc)) ? $bcc:array($bcc);
    }
    if(!empty($cc)) {
          $this->Email->cc = (is_array($cc)) ? $cc:array($cc);
    }
    $this->Email->replyTo = (empty($replyTo)) ? $from:$replyTo;
    $this->Email->return = (empty($return)) ? $from:$return;
        $this->Email->charset = $charset;
 
    /* If there is a host/username/password set use SMTP else use Mail */
    if(count($this->smtpOptions) > 0 && !empty($this->smtpOptions['host']) && !empty($this->smtpOptions['username']) && !empty($this->smtpOptions['password'])) {
      $this->Email->smtpOptions = $this->smtpOptions;
      $this->Email->delivery = 'smtp';
    } else {
      $this->Email->delivery = 'mail';
    }
 
        /* Set the message data in the controller to make it available to the template */
    if(isset($msgData) && !empty($msgData)) { $this->Controller->set(compact('msgData')); }
 
    /* send the email */
        $sent = $this->Email->send();
 
    /* Store sending errors if using SMTP */
    if($this->Email->delivery == 'smtp' && !empty($this->Email->smtpError)) {
      $this->errors = $this->Email->smtpError;
    }
 
        return $sent;
    }
}
