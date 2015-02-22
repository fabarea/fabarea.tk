---
title: Automatic TER release from Github
tags:
    - ter
    - github
---

As the maintainer of [several extensions][extensions] for TYPO3 CMS, I have always found the release process to the [TER][ter] a little bit tedious. In fact, the operation is more complicated than it seems. We must be very carful about every detail: Git tags, commit message, update the correct version number, etc... To help in this task, I have a checklist that I follow step by step. But still! And if all goes well, the procedure takes arourd 10 to 15 minutes per extension.

I had on the radar several attempts to automate the upload of the TER via Webhooks available in Github. There was, among others, the approach of [Kay Strobach] [Kay] with this [proof of concept][POV].

The underlying idea was to trigger the upload via the creation of a Git tag. Having discussed the matter with [my colleague Adrien] [colleague], we followed the approach explained in detail in [this article] [article] written by [Claus Due] [Claus]. The verbosity of the article can let thing about something complexd to set up. It is not so! The implementation can be summarized in a few steps.

### Preparatory tasks

* Create a subdomain, eg http://release.example.com
* Clone extension [https://github.com/Ecodev/fluidtypo3-gizzle](https://github.com/Ecodev/fluidtypo3-gizzle), the "web" folder to be the root of the document root.
* Add a webhook for the project on GitHub
 * URL: http://release.example.com/?settings=settings/ExtensionRelease.yml
 * Secret: 12356
* Transfer the key extension to a member "release" on [typo3.org](typo3.org). This step is optional but recommended.

### Release task

* Update the version number in the file `ext_emconf.php` and `composer.json`.
* Create a tag and push this tag with the command `git push --tags`, the extension is uploaded to TER with a generic message that points to the log on Github. Very convenient!

### A few screenshots

![](/images/2015-02-20/2015-02-20_2202.png)

The setup of the Webhook

----------

![](/images/2015-02-20/2015-02-20_2203.png)

Analysis of paylod to verify what has been sent to Webhook.

----------

![](/images/2015-02-20/2015-02-20_2204.png)

The return of the Webhook actually corresponding to the message sent by the TER.

This article is [available](/fr/blog/2015/02/20/automatic-ter-release) in French also.

[extensions]:/en/blog/2015/02/10/github-migration/
[article]:https://github.com/Ecodev/fluidtypo3-gizzle.
[kay]:http://blog.kay-strobach.de/
[colleague]:https://plus.google.com/+AdrienCrivelli/posts
[pov]:https://github.com/kaystrobach/TYPO3TerHook/
[claus]:https://twitter.com/namelesscoder
[ter]:http://typo3.org/extensions/repository/
