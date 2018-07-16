---
title: Blackboard Learn
---

**Using TsugiCloud in Blackboard Learn**

There are several different use cases for using TsugiCloud in Learn.  In all cases you will need a Key and Secret.

1. Go to the App Store and login with your Google Account

2. Go to the Settings and select "Manage LMS Access Keys".  Request an LTI 1.x key and wait for the email approving the key and giving your key and secret.  Keep these safe.

You can either install tools into Sakai one at a time, or install the entire TsugiCloud app store into Learn in a single step.  Depending on your local configuration, you may or may not need to get your Learn adminstrator to install these tools.

If you are a Learn administrator, you can install either a single tool or the entire store for your users using these same URLs.   You only need one key and secret for an entire Learn installation and the users never need to see their key and secret when the tools are installed by the Learn adminstrator.

**Instructor Using a Single Tool in Learn**

1. Go to the Tsugi App Store.  Find the application you want to install and go to the Details page.  If you click on "Tool URLs" you will be given an LTI 1.x launch url to copy that looks as follows:

    https://www.tsugicloud.org/mod/map/

2. Learn requires that an adminstrator set up the use of LTI for a particular domain.   To do this, log in as an Administrator, go to "Administrator Panel" and select "LTI Tool Providers" and then "Register Provider Domain".  There are a number of options including whether to use one shared key and secret or have each instructor enter their own key or secret.  They also set what user data (name / email / role) is shared with the tool as well as deciding whether the tool will be allowed to use the membership service.

3. Once things are set up, the simplest way for an instructor to install an LTI tool in Learn is to go to Content -> Build Content -> Web Link.  Give your link a name and a URL and check the box "This link is to a Tool Provider".  If Learn displays a message like, "This tool provider is not supported.  Only standard URL links to this site are permitted.", you will need to talk to your administrator to get the tsugicloud.org domain installed in Learn (see previous step).   Depending on the configuration of the domain, you may or may not need to enter a key and secret in the link.

**Installing TsugiCloud as an App Store in Learn**

Learn Release 3300 and later supports the IMS Content Item standard so you can install this site as an "App Store" / "Learning Object Repository" using this url and your key and secret:

https://www.tsugicloud.org/tsugi/lti/store/

1. In the Administrator panel, make sure that LTI is enabled.  go to "Administrator Panel" and select "Tools".  Make sure that under "LTI" you enable "Course Tool", "Orbganization Tool", and "Content Type" as apporpriate.


2. In the Administrator panel, go to "Administrator Panel" and select "LTI Tool Providers" and then "Register Provider Domain".  Register the domain "www.tsugicloud.org".  There are a number of options including whether to use one shared key and secret or have each instructor enter their own key or secret.  They also set what user data (Name / email / role) is shared with the tool as well as deciding whether the tool will be allowed to use the membership service.

3. Still as the Administrator, Once the item has been created, open the the drop down by the domain name in the "LTI Tool Provider" and select "Manage Placements".  Then select "Create Placement".  Enter a title, the store URL above, key and secret and fill in the fields and in particular check the box that says "Supports deep linking" and "Allows grading". And save the placement.

4. Then as the instructor, when you go to Content -> Build Content, you will see the newly installed placement as one of the selectable items with whatever title you gave the placement.  Select the "App Store" (placement title) link, you will be launched directly into the Tsugi store selector, select your tool, and press "Install" and the LTI will be installed into the content ares of your course.  No further configuration is necessary.

The "App Store" / "Content Item" / "Deep Linking" features are an extension to LTI 1.1.   They do not require LTI 2.0.   Learn supports LTI 2.0 and so does TsugiCloud, but ContentItem is generally preferred over LTI 2.0.

<a href="https://www.youtube.com/watch?v=8uNWT32ITxw" target="_blank">Video Demonstration</a>

