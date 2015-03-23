# RagsnasWrapMyUrlBundle

Wraps URL's in symfony (Backend &amp; javascript) for integration in other systems (i.e. typo3).

It uses Information given via the Request to wrap Url's. This can be used to accomplish integration in other systems.

To use it, you'll have to overwrite some parameters in your config:

    parameters:
        router.request_context.class: Ragsnas\WrapMyUrlBundle\Service\ExtendedRequestContext
        router.options.generator_class: Ragsnas\WrapMyUrlBundle\Service\UrlGenerator
        router.options.generator_base_class: Ragsnas\WrapMyUrlBundle\Service\UrlGenerator

If you want to make use of the javascript overwrite as well (overwrites XHR Requests) you'll also have to include the overwrite.js.


Now, given the header Parameters (*X-WRAPMYURL_WRAP, X-WRAPMYURL_URLENCODE*) are given, the WRAP argument is used as a pattern to include the actual url.

So let's say you have 
/admin/users?id=5 
and your Wrap is 
http://othersystem.example.org/fooCMS?id=admin&sf2path=%s 
then you'll end up having
http://othersystem.example.org/fooCMS?id=admin&sf2path=%2Fadmin%2Fusers%3Fid%3D5
