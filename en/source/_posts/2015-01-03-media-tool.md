---
title: Media extension - identify duplicate files!
tags:
    - media
    - typo3 cms
---


I am developing for some time already an [extension][media] for Media management for [TYPO3 CMS][cms], with a focus on advanced management of metadata and filtering.

I just added a new tool that allows to detect duplicate files. This allows for example to identify a file that has been inadvertently uploaded several times by a user and which is double in the storage. The tool produces a list that displays these duplicates, then you can select the files to be deleted.

This addition complements the list of existing tools. There was the possibility already identify missing or duplicate files to records in the database of businesses.


### With pictures

Open tools panel:

![](/images/2015-01-03/2015-01-03_1025.png)

Open the tool:

![](/images/2015-01-03/2015-01-03_1030.png)

Select duplicate files:

![](/images/2015-01-03/2015-01-03_1031.png)

### Installation

To test this feature, you must fetch the source from the [Git repository][git-media], before it get published on the [TER][ter]. You must also update the source of [Vidi][vidi] which is the underlying engine of Media.


    # Clone du master de Vidi
    cd typo3conf/ext
    git clone git://git.typo3.org/TYPO3CMS/Extensions/vidi.git

    # Clone du master de Media
    cd typo3conf/ext
    git clone git://git.typo3.org/TYPO3CMS/Extensions/media.git

### Sponsor

This feature was sponsored by [Visol][visol] which I warmly thank you.

This article [is available](/fr/blog/2015/01/03/media-tool) as French also.


[media]: https://forge.typo3.org/projects/extension-media/
[vidi]: https://forge.typo3.org/projects/extension-vidi/
[cms]:http://demo.typo3.org/
[ter]:http://typo3.org/extensions/repository/
[git-media]: https://git.typo3.org/TYPO3CMS/Extensions/media.git
[visol]:http://www.visol.ch/