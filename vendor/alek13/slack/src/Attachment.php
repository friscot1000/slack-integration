<?php
namespace Maknz\Slack;

use InvalidArgumentException;

class Attachment extends Payload
{
    use FieldsTrait;

    /**
     * The fallback text to use for clients that don't support attachments.
     *
     * @var string
     */
    protected $fallback;

    /**
     * Optional text that should appear within the attachment.
     *
     * @var string
     */
    protected $text;

    /**
     * Optional image that should appear within the attachment.
     *
     * @var string
     */
    protected $image_url;

    /**
     * Optional thumbnail that should appear within the attachment.
     *
     * @var string
     */
    protected $thumb_url;

    /**
     * Optional text that should appear above the formatted data.
     *
     * @var string
     */
    protected $pretext;

    /**
     * Optional title for the attachment.
     *
     * @var string
     */
    protected $title;

    /**
     * Optional title link for the attachment.
     *
     * @var string
     */
    protected $title_link;

    /**
     * Optional author name for the attachment.
     *
     * @var string
     */
    protected $author_name;

    /**
     * Optional author link for the attachment.
     *
     * @var string
     */
    protected $author_link;

    /**
     * Optional author icon for the attachment.
     *
     * @var string
     */
    protected $author_icon;

    /**
     * Optional provide callback_id used to provide interactivity callback information on the request.
     *
     * @var string
     */
    protected $callback_id;

    /**
     * The color to use for the attachment.
     *
     * @var string
     */
    protected $color = 'good';

    /**
     * The text to use for the attachment footer.
     *
     * @var string
     */
    protected $footer;

    /**
     * The icon to use for the attachment footer.
     *
     * @var string
     */
    protected $footer_icon;

    /**
     * The timestamp to use for the attachment.
     *
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * The fields of the attachment that Slack should interpret
     * with its Markdown-like language.
     *
     * @var array
     */
    protected $markdown_fields = [];

    /**
     * A collection of actions (buttons) to include in the attachment.
     * A maximum of 5 actions may be provided.
     *
     * @var array
     */
    protected $actions = [];

    /**
     * Internal attribute to property map.
     *
     * @var array
     */
    protected static $availableAttributes = [
        'fallback'    => 'fallback',
        'text'        => 'text',
        'image_url'   => 'image_url',
        'thumb_url'   => 'thumb_url',
        'pretext'     => 'pretext',
        'color'       => 'color',
        'footer'      => 'footer',
        'footer_icon' => 'footer_icon',
        'timestamp'   => 'timestamp',
        'fields'      => 'fields',
        'mrkdwn_in'   => 'markdown_fields',
        'title'       => 'title',
        'title_link'  => 'title_link',
        'author_name' => 'author_name',
        'author_link' => 'author_link',
        'author_icon' => 'author_icon',
        'callback_id' => 'callback_id',
        'actions'     => 'actions',
    ];

    /**
     * Get the class name of valid fields.
     *
     * @return string
     */
    protected function getFieldClass()
    {
        return AttachmentField::class;
    }

    /**
     * Get the fallback text.
     *
     * @return string
     */
    public function getFallback()
    {
        return $this->fallback;
    }

    /**
     * Set the fallback text.
     *
     * @param string $fallback
     *
     * @return $this
     */
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * Get the optional text to appear within the attachment.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the optional text to appear within the attachment.
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the optional image to appear within the attachment.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Set the optional image to appear within the attachment.
     *
     * @param string $image_url
     *
     * @return $this
     */
    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * Get the optional thumbnail to appear within the attachment.
     *
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->thumb_url;
    }

    /**
     * Set the optional thumbnail to appear within the attachment.
     *
     * @param string $thumb_url
     *
     * @return $this
     */
    public function setThumbUrl($thumb_url)
    {
        $this->thumb_url = $thumb_url;

        return $this;
    }

    /**
     * Get the text that should appear above the formatted data.
     *
     * @return string
     */
    public function getPretext()
    {
        return $this->pretext;
    }

    /**
     * Set the text that should appear above the formatted data.
     *
     * @param string $pretext
     *
     * @return $this
     */
    public function setPretext($pretext)
    {
        $this->pretext = $pretext;

        return $this;
    }

    /**
     * Get the color to use for the attachment.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the color to use for the attachment.
     *
     * @param string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the footer to use for the attachment.
     *
     * @return string
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * Set the footer text to use for the attachment.
     *
     * @param string $footer
     *
     * @return $this
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get the footer icon to use for the attachment.
     *
     * @return string
     */
    public function getFooterIcon()
    {
        return $this->footer_icon;
    }

    /**
     * Set the footer icon to use for the attachment.
     *
     * @param string $footerIcon
     *
     * @return $this
     */
    public function setFooterIcon($footerIcon)
    {
        $this->footer_icon = $footerIcon;

        return $this;
    }

    /**
     * Get the timestamp to use for the attachment.
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set the timestamp to use for the attachment.
     *
     * @param \DateTime $timestamp
     *
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get the title to use for the attachment.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title to use for the attachment.
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the title link to use for the attachment.
     *
     * @return string
     */
    public function getTitleLink()
    {
        return $this->title_link;
    }

    /**
     * Set the title link to use for the attachment.
     *
     * @param string $title_link
     *
     * @return $this
     */
    public function setTitleLink($title_link)
    {
        $this->title_link = $title_link;

        return $this;
    }

    /**
     * Get the author name to use for the attachment.
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->author_name;
    }

    /**
     * Set the author name to use for the attachment.
     *
     * @param string $author_name
     *
     * @return $this
     */
    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;

        return $this;
    }

    /**
     * Get the author link to use for the attachment.
     *
     * @return string
     */
    public function getAuthorLink()
    {
        return $this->author_link;
    }

    /**
     * Set the author link to use for the attachment.
     *
     * @param string $author_link
     *
     * @return $this
     */
    public function setAuthorLink($author_link)
    {
        $this->author_link = $author_link;

        return $this;
    }

    /**
     * Get the author icon to use for the attachment.
     *
     * @return string
     */
    public function getAuthorIcon()
    {
        return $this->author_icon;
    }

    /**
     * Set the author icon to use for the attachment.
     *
     * @param string $author_icon
     *
     * @return $this
     */
    public function setAuthorIcon($author_icon)
    {
        $this->author_icon = $author_icon;

        return $this;
    }

    /**
     * Get the callback id for use with interactivity.
     *
     * @return string
     */
    public function getCallbackId()
    {
        return $this->callback_id;
    }

    /**
     * Set the callback id to use with interactivity.
     *
     * @param string $callback_id
     *
     * @return $this
     */
    public function setCallbackId($callback_id)
    {
        $this->callback_id = $callback_id;

        return $this;
    }

    /**
     * Clear the actions for the attachment.
     *
     * @return $this
     */
    public function clearActions()
    {
        $this->actions = [];

        return $this;
    }

    /**
     * Get the fields Slack should interpret in its
     * Markdown-like language.
     *
     * @return array
     */
    public function getMarkdownFields()
    {
        return $this->markdown_fields;
    }

    /**
     * Set the fields Slack should interpret in its
     * Markdown-like language.
     *
     * @param array $fields
     *
     * @return $this
     */
    public function setMarkdownFields(array $fields)
    {
        $this->markdown_fields = $fields;

        return $this;
    }

    /**
     * Get the collection of actions (buttons) to include in the attachment.
     *
     * @return AttachmentAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Set the collection of actions (buttons) to include in the attachment.
     *
     * @param array $actions
     *
     * @return Attachment
     *
     * @throws \InvalidArgumentException
     */
    public function setActions($actions)
    {
        $this->clearActions();

        foreach ($actions as $action) {
            $this->addAction($action);
        }

        return $this;
    }

    /**
     * Add an action to the attachment.
     *
     * @param mixed $action
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function addAction($action)
    {
        if ($action instanceof AttachmentAction) {
            $this->actions[] = $action;

            return $this;
        } elseif (is_array($action)) {
            $this->actions[] = new AttachmentAction($action);

            return $this;
        }

        throw new InvalidArgumentException('The attachment action must be an instance of Maknz\Slack\AttachmentAction or a keyed array');
    }

    /**
     * Convert this attachment to its array representation.
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'fallback'    => $this->getFallback(),
            'text'        => $this->getText(),
            'pretext'     => $this->getPretext(),
            'color'       => $this->getColor(),
            'footer'      => $this->getFooter(),
            'footer_icon' => $this->getFooterIcon(),
            'ts'          => $this->getTimestamp() ? $this->getTimestamp()->getTimestamp() : null,
            'mrkdwn_in'   => $this->getMarkdownFields(),
            'image_url'   => $this->getImageUrl(),
            'thumb_url'   => $this->getThumbUrl(),
            'title'       => $this->getTitle(),
            'title_link'  => $this->getTitleLink(),
            'author_name' => $this->getAuthorName(),
            'author_link' => $this->getAuthorLink(),
            'author_icon' => $this->getAuthorIcon(),
            'callback_id' => $this->getCallbackId(),
        ];

        $data['fields'] = $this->getFieldsAsArrays();
        $data['actions'] = $this->getActionsAsArrays();

        return $data;
    }

    /**
     * Iterates over all actions in this attachment and returns
     * them in their array form.
     *
     * @return array
     */
    protected function getActionsAsArrays()
    {
        $actions = [];

        foreach ($this->getActions() as $action) {
            $actions[] = $action->toArray();
        }

        return $actions;
    }
}
