<?php

include_once 'vendor/Rmail/Rmail.php';

class IwebsEmail extends CComponent
{
    public $defaultRecipients;
    public $redirectTo = null;
    public $fromName;
    public $fromAddress;
    public $charset = 'utf-8';
    public $sendingMethod = 'mail';
    public $smtp;
    public $bccAddress;
    public $disableSending = false;

    /**
     * @var Rmail
     */
    protected $_rmail = null;

    protected $_html = null;
    protected $_text = null;

    /**
     * Init.
     */
    public function init()
    {
        $this->_rmail = new Rmail();

        if ($this->sendingMethod == 'smtp') {
            $this->_rmail->setSMTPParams($this->smtp['host'], null, null, $this->smtp['useAuth'], $this->smtp['user'], $this->smtp['pass']);
        }

        $this->_rmail->setFrom($this->fromName.' <'.$this->fromAddress.'>');
        $this->_rmail->setReturnPath($this->fromAddress);
        $this->_rmail->setHeadCharset($this->charset);
        $this->_rmail->setHTMLCharset($this->charset);
        $this->_rmail->setTextCharset($this->charset);

        $this->_html = null;
        $this->_text = null;
    }

    public function setSubject($subject)
    {
        $this->_rmail->setSubject($subject);
        return $this;
    }

    public function setText($text)
    {
        $this->_rmail->setText($text);
        $this->_text = $text;
        return $this;
    }

    public function setHtml($html, $imagesDir = null)
    {
        $this->_rmail->setHTML($html, $imagesDir);
        $this->_html = $html;
        return $this;
    }

    public function addAttachment($filePath, $mimeType = 'application/octet-stream', $fileName = null, $encoding = null)
    {
        $this->_rmail->addAttachment(new fileAttachment($filePath, $mimeType, $encoding, $fileName));
        return $this;
    }

    public function send($recipients)
    {
        if (true === $this->disableSending) {
            return true;
        }

        if (!is_array($recipients)) {
            $recipients = array($recipients);
        }

        if ($this->redirectTo !== null) {
            if ($this->_html !== null) {
                $this->appendHtml("\n\nEredeti Címzettek: ".implode(', ',$recipients));
            } else {
                $this->appendText("\n\nEredeti Címzettek: ".implode(', ',$recipients));
            }

            $recipients = $this->redirectTo;
        } elseif (count($recipients) == 0) {
            $recipients = $this->defaultRecipients;
        }

        $result = $this->_rmail->send($recipients, $this->sendingMethod);
        $this->init();

        return $result;
    }

    public function appendHtml($html)
    {
        $this->_html .= $html;
        $this->_rmail->setHTML($this->_html);
    }

    public function appendText($text)
    {
        $this->_text .= $text;
        $this->_rmail->setText($this->_text);
    }
}
