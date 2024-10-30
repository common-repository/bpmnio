=== Plugin Name ===
Contributors: neville.lugton
Donate link: bpmn.io
Tags: bpmn, bpm, camunda, media-type, bpmn-io
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: bpmn-js license
License URI: http://bpmn.io/license

Adds support for .bpmn files within the Media Library.


== Description ==

[bpmn.io](http://bpmn.io/) is a BPMN 2.0 rendering toolkit and web modeler. It is powered by bpmn-js, a client-side only library that embeds BPMN 2.0 into the browser. It runs in modern browsers and requires no server backend.


== Installation ==

1. Clone or Unzip `bpmn.io` to the `/wp-content/plugins/` directory
2. Activate the `bpmn.io` through the 'Plugins' menu in WordPress

= Usage =
1. `Manage` and `Add` .bpmn files like any other media item.
2. The Shortcode accepts the width and height attributes (defaults shown)
e.g. [bpmn url="...../diagram.bpmn" height="100%" width="130px"]

== Frequently Asked Questions ==

= Where is my left sock? =
Have you looked under the couch?

= Where are the serious FAQs? 
Please check the bpmn.io forum at [https://forum.bpmn.io/](https://forum.bpmn.io/).


== Screenshots ==

1. .bpmn files displayed in the media library.
2. .bpmn media rendered in a post.


== Screenshots ==

1. `/assets/media_library.png`
2. `/assets/post.png`


== Changelog ==

= 1.0 =
* Register the "application/bpmn-xml" mime-type.
* Extend Media Library to allow .bpmn files.
* Display .bpmn files via [bpmn.io](http://bpmn.io/).


== Upgrade Notice ==

= 1.0 =
Initial release.
