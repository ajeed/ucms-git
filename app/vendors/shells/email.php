<?php 
class EmailShell extends Shell {
  /**
   * Load Tasks used by the shell
   * 
   * @access public
   */
  public $tasks = array('Mail');
 
  /**
   * Welcome message
   * 
   * @access public
   */
  public function _welcome() {}
 
  /**
   * Default shell process
   * This is called if no task is specified
   * 
   * @access public
   */
  public function main() {
    $this->out('Use the command: cake foo sendTestMail');
  }
 
  /**
   * Send an email message using the Mail task
   * 
   * @access public
   */
  public function sendTestMail() {
    $recipient = 'hafidzi@gmail.com';
    $subject = 'This is test from cron';
    $from = 'admin@silverspeed.com';
    $template = 'test';
 
    /* Get the address to send to */
    while($recipient == '') {
      $recipient = $this->in('Please enter the recipient address: ');
    }
 
    /* Get the subject */
    while($subject == '') {
      $subject = $this->in('Please enter a subject line for the message: ');
    }
 
    /* Get the sender address */
    while($from == '') {
      $from = $this->in('Please enter your (sender) email address: ');
    }
 
    /* Get the template to use */
    $this->out('The email template you specify below must already exist in the /views/elements/email/html and /views/elements/email/text directories.');
    $this->out('Enter the template name without the .ctp extension.');
    while($template == '') {
      $template = $this->in('Please enter the name of the template to use: ', null, 'default');
    }
 
    /**
     * If you want to use SMTP; uncomment the lines below and provide your SMTP server information.
     * Leave commented to use the PHP mail feature to send the email.
     */
    
    $smtpOptions = array(
        'port'=>'26', 
        'host' => 'mail.silverspeed.com.my',
        'username' => 'admin@silverspeed.com.my',
        'password' => '~J}zZ~Mn$Xs7',
        'timeout'=>'15', // SMTP server timeout in seconds. This key is optional. Default is 15.
        );
    
    $this->Mail->setSmtpOptions($smtpOptions);
    
 
    /**
     * Send the email
     */
    $sent = $this->Mail->sendMail($recipient, $subject, $from, $template);
  }

  public function sendMail() {
    $smtpOptions = array(
        'port'=>'26', 
        'host' => 'mail.silverspeed.com.my',
        'username' => 'admin@silverspeed.com.my',
        'password' => '~J}zZ~Mn$Xs7',
        'timeout'=>'15', // SMTP server timeout in seconds. This key is optional. Default is 15.
        );

    $recipient = '';
    $subject = '';
    $from = '';
    $template = '';
  }
}