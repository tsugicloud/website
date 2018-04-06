---
title: Sakai Integration
---

**Using TsugiCloud in Sakai**

There are several different use cases for using TsugiCloud in Sakai.  In all cases you will need a Key and Secret.

1. Go to the App Store and login with your Google Account

2. Go to the Settings and select "Manage LMS Access Keys".  Request an LTI 1.x key and wait for the email approving the key and giving your key and secret.  Keep these safe.

You can either install tools into Sakai one at a time, or install the entire TsugiCloud app store into Sakai in a single step.  Depending on your local configuration, you may or may not need to get your Sakai adminstrator to install these tools.

If you are a Sakai administrator, you can install either a single tool or the entire store for your users using these same URLs.   You only need one key and secret for an entire Sakai installation and the users never need to see their key and secret when the tools are installed by the Sakai adminstrator.

**Using a Single Tool in Sakai**

1. Go to the Tsugi App Store.  Find the application you want to install and go to the Details page.  If you click on "Tool URLs" you will be given an LTI 1.x launch url to copy that looks as follows:

    https://www.tsugicloud.org/mod/map/

2. Sakai supports several ways of installing external tools.  You can either go to Lessons / External Tools or Site Info / External tools and add an LTI 1.x tool.  Enter the key, secret, and launch URL and fill in the rest of the fields.


**Installing TsugiCloud as an App Store in Sakai**

Sakai 10 and later supports the IMS Content Item standard so you can install this site as an "App Store" / "Learning Object Repository" using this url and your key and secret:

    https://www.tsugicloud.org/tsugi/lti/store/

In Sakai, use the Lessons tool, select "External Tools" and install this as an LTI 1.x tool. Make sure to check the "Supports Content Item" option when installing this URL in Sakai and tick the boxes to allow both the title and url to be changed.

Then this "TsugiCloud store" will appear in Lessons as a new external tool, when you select the store you will be launched into the picker to choose tools and/or resources to be pulled into Lessons. The key and secret will be inherited from the store to each of the installed tools. In Sakai-12, once the app store is installed, the rerources from this site will also be avilable from within the rich text editor.


<a href="https://www.youtube.com/watch?v=au2_C_2PgIA" target="_blank">Video Demonstration</a>

