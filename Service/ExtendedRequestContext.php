<?php


namespace Ragsnas\RagsnasWrapMyUrlBundle\Service;

use Symfony\Component\HttpFoundation\Request;


class ExtendedRequestContext extends \Symfony\Component\Routing\RequestContext
{
    /**
     * @var string
     */
    protected $wrapMyUrlWrap;

    /**
     * @var bool
     */
    protected $wrapMyUrlUrlencode = false;

    /**
     * @param Request $request
     * @return $this
     */
    public function fromRequest(Request $request)
    {
        parent::fromRequest($request);
        $this->setWrapMyUrlWrap($request->server->has('X-WRAPMYURL_WRAP') ? $request->server->get('X-WRAPMYURL_WRAP') : null);
        $this->setWrapMyUrlUrlencode($request->server->has('X-WRAPMYURL_URLENCODE') ? true : false);

        return $this;
    }

    /**
     * @return string
     */
    public function getWrapMyUrlWrap()
    {
        return $this->wrapMyUrlWrap;
    }

    /**
     * @param string $wrapMyUrlWrap
     */
    public function setWrapMyUrlWrap($wrapMyUrlWrap)
    {
        $this->wrapMyUrlWrap = $wrapMyUrlWrap;
    }

    /**
     * @return boolean
     */
    public function isWrapMyUrlUrlencode()
    {
        return $this->wrapMyUrlUrlencode;
    }

    /**
     * @param boolean $wrapMyUrlUrlencode
     */
    public function setWrapMyUrlUrlencode($wrapMyUrlUrlencode)
    {
        $this->wrapMyUrlUrlencode = $wrapMyUrlUrlencode;
    }


}
