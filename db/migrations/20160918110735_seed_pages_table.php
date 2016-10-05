<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into pages (title, content, slug)
            values
            ('About Cycling', '<h1>About Cycling</h1><p>All about this company.</p>', 'about_cycling')
        ");
        $this->execute("
            insert into pages (title, content, slug)
            values
            ('Registration successful', '<p class=\"error\">IMPORTANT: a verification email has been sent to your email address. Please click on the link in that email to activate your new account.<br/><br/>
            (if it appears that you have not received the activation email, please check for it in any *spam* folder which you, or your email service provider, may have setup)</p>', 'registration_successful')
        ");
        $this->execute("
            insert into pages (title, content, slug)
            values
            ('Contact Us', '<h1>Contact Us</h1><p class=\"error\">+44 7733 227500</p><p class=\"error\">stratonet@fastmail.net</p>', 'contact_us')
        ");
        $this->execute("
            insert into pages (title, content, slug)
            values
            ('Account activated', '<h1>Account is activated...</h1><p class=\"error\">Thank you: your Cycling for Everyone account is now active, you can login when you are ready.</p>', 'account_activated')
        ");
        $this->execute("
            insert into pages (title, content, slug)
            values
            ('Testimonial saved', '<h1>Testimonial saved...</h1><p class=\"error\">Thank you: your testimonial is valuable to Cycling for Everyone and can now be viewed by all members.</p>', 'testimonial_saved')
        ");
    }

    public function down()
    {
      // not used in this context, however phinx requires its presence
    }
}
