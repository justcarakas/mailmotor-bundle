# MailMotorBundle

This Symfony2 bundle loads in [MailMotor](https://github.com/mailmotor/mailmotor) as a service. So you can subscribe/unsubscribe members to any mailinglist managing API. F.e.: [MailChimp](https://github.com/mailmotor/mailmotor-mailchimp), CampaignMonitor, ...

## Installation

Open your **terminal** and type:
```
composer require mailmotor/mailmotor-bundle
composer require mailmotor/mailchimp-bundle
```

In **app/AppKernel.php**

```php
public function registerBundles()
{
    $bundles = array(
        // ...
        new MailMotor\Bundle\MailMotorBundle\MailMotorMailMotorBundle(),
        new MailMotor\Bundle\MailChimpBundle\MailMotorMailChimpBundle(),
    );
```

In **app/config/parameters.yml**

```yaml
    mailmotor.mail_engine:  "mailchimp" # enter the mail engine your are using here
    mailmotor.api_key:      xxx # enter your mailchimp api_key here
    mailmotor.list_id:      xxx # enter the default list_id here
```

In **app/config/config.yml**

```yaml
services:
    mailmotor.factory:
        class: Backend\Modules\MailMotor\Factory\MailMotorFactory
        arguments:
            - "@service_container"
            - "%mailmotor.mail_engine%"
    mailmotor:
        class: MailMotor\Bundle\MailMotorBundle\Component\MailMotor
        arguments:
            - "@=service('mailmotor.factory').getGateway()"
```

