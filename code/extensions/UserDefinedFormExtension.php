<?php
/**
 *
 * @package plato-userforms
 */
class UserDefinedFormExtension extends DataExtension
{
    /**
     * @config
     * @var Boolean
     */
    private static $recipients_warning = true;

    /**
     * @config
     * @var String
     */
    private static $recipients_warning_message = "Alert: There are 0 recipients configured for this form. Submissions may be missed.";

    /**
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        if($this->owner->EmailRecipients()->Count() == 0 && $this->owner->config()->recipients_warning) {
            $fields->addFieldToTab("Root.Main",
                new LiteralField(
                    "EmailRecipientsWarning",
                    "<p class=\"message error\">".$this->owner->config()->recipients_warning_message."</p>"
                ),
                "Title"
            );
        }
        return $fields;
    }
}
