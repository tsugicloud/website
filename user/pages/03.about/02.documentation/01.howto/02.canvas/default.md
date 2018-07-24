---
title: Canvas Integration
---

You can view, install, and use TsugiCloud in the EduAppCenter at:

    https://www.eduappcenter.com/apps/1010

**Using TsugiCloud in Canvas**

There are several different use cases for using TsugiCloud in Canvas.  In all cases you will need a Key and Secret.

1. Go to the App Store and login with your Google Account

2. Go to the Settings and select "Manage LMS Access Keys".  Request an LTI 1.x key and wait for the email approving the key and giving your key and secret.  Keep these safe.

You can either install tools into Canvas one at a time, or install the entire TsugiCloud app store into Canvas in a single step.  Depending on your local configuration, you may or may not need to get your Canvas adminstrator to install these tools.

If you are a Canvas administrator, you can install either a single tool or the entire store for your users using these same URLs.   You only need one key and secret for an entire Canvas installation and the users never need to see their key and secret when the tools are installed by the Canvas adminstrator.

**Using a Single Tool in Canvas**

1. Go to the Tsugi App Store.  Find the application you want to install and go to the Details page.  If you click on "Tool URLs" you will be given a Canvas configuration URL (ends with ".xml").  Copy the URL that looks as follows:

    https://www.tsugicloud.org/mod/map/canvas-config.xml

2. Go into a Canvas course, and select "Settings", "Apps", "View App Configurations", and "+ App".  Under Configuration Type, select "By URL".  Enter the configuration URL, Key, and Secret and give the tool a name and save the configuration.   This tool will now be avaialable as one of the "External Tools" thoughout the Canvas UI.

**Installing TsugiCloud as an App Store in Canvas**

You can install TsugiCloud as a searchable "Store" inside of Canvas with a single key and secret and then you can easily pull in any of the tools at various points in the Canvas UI.

1. Go to your Tsugi Settings and select "Manage LMS Keys" and then "Using Your Key" and then "Canvas".  You should copy the URL that looks like:

    https://www.tsugicloud.org/tsugi/lti/store/canvas-config.xml

2. Go into a Canvas course, and select "Settings", "Apps", "View App Configurations", and "+ App".  Under Configuration Type, select "By URL".  Enter the configuration URL, Key, and Secret and give the tool a name and save the configuration.   The tools in this site will now be avaialable as a searchable course in the the "External Tools" options in the Canvas UI.  

These tools will appear under Modules, Assignments, and even in the rich text editor when installed in this manner.



