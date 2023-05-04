#HOW TO

<h2>Canvas Integration</h2>
<p>	You can view, install, and use TsugiCloud in the EduAppCenter at: </p>
<p><code>https://www.eduappcenter.com/apps/1010</code></p>
<h1>Using TsugiCloud in Canvas</h1>
<p>There are several different use cases for using TsugiCloud in Canvas. In all cases you will need a Key and Secret.</p>
<ol>
    <li>Go to the App Store and login with your Google Account</li>
    <li>Go to the Settings and select "Manage LMS Access Keys". Request an LTI 1.x key and wait for the email approving the key and giving your key and secret. Keep these safe.</li>
</ol>
			
<p>
You can either install tools into Canvas one at a time, or install the entire TsugiCloud app store into Canvas in a single step. Depending on your local configuration, you may or may not need to get your Canvas adminstrator to install these tools.
</p>	
<p>
If you are a Canvas administrator, you can install either a single tool or the entire store for your users using these same URLs. You only need one key and secret for an entire Canvas installation and the users never need to see their key and secret when the tools are installed by the Canvas adminstrator.
</p>
<h2>Using a Single Tool in Canvas</h2>
<ol>
<li>Go to the Tsugi App Store. Find the application you want to install and go to the Details page. If you click on "Tool URLs" you will be given a Canvas configuration URL (ends with ".xml"). Copy the URL that looks as follows:<br></br>https://www.tsugicloud.org/mod/map/canvas-config.xml</li>
<li>Go into a Canvas course, and select "Settings", "Apps", "View App Configurations", and "+ App". Under Configuration Type, select "By URL". Enter the configuration URL, Key, and Secret and give the tool a name and save the configuration. This tool will now be avaialable as one of the "External Tools" thoughout the Canvas UI.</li>
</ol>
		
<h2>Installing TsugiCloud as an App Store in Canvas</h2>
<p>You can install TsugiCloud as a searchable "Store" inside of Canvas with a single key and secret and then you can easily pull in any of the tools at various points in the Canvas UI.</p>
	
<ol>
<li>Go to your Tsugi Settings and select "Manage LMS Keys" and then "Using Your Key" and then "Canvas". You should copy the URL that looks like:<br></br>https://www.tsugicloud.org/tsugi/lti/store/canvas-config.xml</li>
<li>Go into a Canvas course, and select "Settings", "Apps", "View App Configurations", and "+ App". Under Configuration Type, select "By URL". Enter the configuration URL, Key, and Secret and give the tool a name and save the configuration. The tools in this site will now be avaialable as a searchable course in the the "External Tools" options in the Canvas UI.</li>
</ol>
	
<p>These tools will appear under Modules, Assignments, and even in the rich text editor when installed in this manner.</p>

<h1>Google Classroom Integration</h1>
<h2>Using TsugiCloud in Google Classroom</h2>
<p>It is relatively simple to use TsugiCloud in Google Classroom.</p>
<ol>
	<li>Go to the App Store and login with your Google Account</li>
	<li>From Settings, connect your Google account on TsugiCloud to your Google Classroom</li>
	<li>Then go to the Tsugi App Store - at that point, if you have successfully connected to one or more Google Classrooms, you should see the Google Classroom icon next to each of the applications in the store.</li>
	<li>When you click on the Google Classroom icon 
    <img src="https://www.gstatic.com/classroom/logo_square_48.svg" height="20px"></img> you will be prompted for a Google Classroom course to install the tool.</li>
	<li>Once you install a tool, it should appear in your Classroom "wall". Launch the tool as the instructor to see if the tool needs any post-install configuration.</li>
	<li>Once the tools is installed and configured, students can launch the tool. If the tool produces grades they will be sent back to the Classroom grade book. Note that you need a student account to test grades going back to Classroom. Grades do not flow for Instructors.</li>
</ol>
<p>If you want to experiment with this, you need two @gmail.com accounts - one to be the teacher and one to be the student. Simply go to classroom.google.com and create a course on the teacher account and invite your other gmail account to the course. You can install tools on the teacher account and get graded from the student account.</p>

<h1>Sakai Integration</h1>
<h2>Using TsugiCloud in Sakai</h2>
<p>There are several different use cases for using TsugiCloud in Sakai. In all cases you will need a Key and Secret.</p>
<ol>
	<li>Go to the App Store and login with your Google Account</li>
	<li>Go to the Settings and select "Manage LMS Access Keys". Request an LTI 1.x key and wait for the email approving the key and giving your key and secret. Keep these safe.</li>
	</ol>
<p>You can either install tools into Sakai one at a time, or install the entire TsugiCloud app store into Sakai in a single step. Depending on your local configuration, you may or may not need to get your Sakai adminstrator to install these tools.</p>
<p>If you are a Sakai administrator, you can install either a single tool or the entire store for your users using these same URLs. You only need one key and secret for an entire Sakai installation and the users never need to see their key and secret when the tools are installed by the Sakai adminstrator.</p>
<h2>Using a Single Tool in Sakai</h2>
<ol>
	<li>Go to the Tsugi App Store. Find the application you want to install and go to the Details page. If you click on "Tool URLs" you will be given an LTI 1.x launch url to copy that looks as follows:<br></br>https://www.tsugicloud.org/mod/map/</li>
	<li>Sakai supports several ways of installing external tools. You can either go to Lessons / External Tools or Site Info / External tools and add an LTI 1.x tool. Enter the key, secret, and launch URL and fill in the rest of the fields.</li>
</ol>
<h2>Installing TsugiCloud as an App Store in Sakai</h2>
<p>Sakai 10 and later supports the IMS Content Item standard so you can install this site as an "App Store" / "Learning Object Repository" using this url and your key and secret:</p>
<p>https://www.tsugicloud.org/tsugi/lti/store/</p>
<p>In Sakai, use the Lessons tool, select "External Tools" and install this as an LTI 1.x tool. Make sure to check the "Supports Content Item" option when installing this URL in Sakai and tick the boxes to allow both the title and url to be changed.</p>
<p>Then this "TsugiCloud store" will appear in Lessons as a new external tool, when you select the store you will be launched into the picker to choose tools and/or resources to be pulled into Lessons. The key and secret will be inherited from the store to each of the installed tools. In Sakai-12, once the app store is installed, the rerources from this site will also be avilable from within the rich text editor.</p>

<h1>Blackboard Integration</h1>
<h2>Using TsugiCloud in Blackboard Learn</h2>
<p>There are several different use cases for using TsugiCloud in Learn. In all cases you will need a Key and Secret.</p>
<ol>
	<li>Go to the App Store and login with your Google Account</li>
	<li>Go to the Settings and select "Manage LMS Access Keys". Request an LTI 1.x key and wait for the email approving the key and giving your key and secret. Keep these safe.</li>

	</ol>
<p>You can either install tools into Sakai one at a time, or install the entire TsugiCloud app store into Learn in a single step. Depending on your local configuration, you may or may not need to get your Learn adminstrator to install these tools.</p>
<p>If you are a Learn administrator, you can install either a single tool or the entire store for your users using these same URLs. You only need one key and secret for an entire Learn installation and the users never need to see their key and secret when the tools are installed by the Learn adminstrator.</p>
<h2>Instructor Using a Single Tool in Learn</h2>
<ol>
	<li>Go to the Tsugi App Store. Find the application you want to install and go to the Details page. If you click on "Tool URLs" you will be given an LTI 1.x launch url to copy that looks as follows:<br></br>https://www.tsugicloud.org/mod/map/</li>
	<li>Learn requires that an adminstrator set up the use of LTI for a particular domain. To do this, log in as an Administrator, go to "Administrator Panel" and select "LTI Tool Providers" and then "Register Provider Domain". There are a number of options including whether to use one shared key and secret or have each instructor enter their own key or secret. They also set what user data (name / email / role) is shared with the tool as well as deciding whether the tool will be allowed to use the membership service.</li>
	<li>Once things are set up, the simplest way for an instructor to install an LTI tool in Learn is to go to Content/Build Content/Web Link. Give your link a name and a URL and check the box "This link is to a Tool Provider". If Learn displays a message like, "This tool provider is not supported. Only standard URL links to this site are permitted.", you will need to talk to your administrator to get the tsugicloud.org domain installed in Learn (see previous step). Depending on the configuration of the domain, you may or may not need to enter a key and secret in the link.</li>
	</ol>
<h2>Installing TsugiCloud as an App Store in Learn</h2>
<p>Learn Release 3300 and later supports the IMS Content Item standard so you can install this site as an "App Store" / "Learning Object Repository" using this url and your key and secret:</p>
<p>https://www.tsugicloud.org/tsugi/lti/store/</p>
<ol>
  	<li>In the Administrator panel, make sure that LTI is enabled. go to "Administrator Panel" and select "Tools". Make sure that under "LTI" you enable "Course Tool", "Orbganization Tool", and "Content Type" as apporpriate.</li>
	<li>In the Administrator panel, go to "Administrator Panel" and select "LTI Tool Providers" and then "Register Provider Domain". Register the domain "www.tsugicloud.org". There are a number of options including whether to use one shared key and secret or have each instructor enter their own key or secret. They also set what user data (Name / email / role) is shared with the tool as well as deciding whether the tool will be allowed to use the membership service.</li>
	<li>Still as the Administrator, Once the item has been created, open the the drop down by the domain name in the "LTI Tool Provider" and select "Manage Placements". Then select "Create Placement". Enter a title, the store URL above, key and secret and fill in the fields and in particular check the box that says "Supports deep linking" and "Allows grading". And save the placement.</li>
	<li>Then as the instructor, when you go to Content/Build Content, you will see the newly installed placement as one of the selectable items with whatever title you gave the placement. Select the "App Store" (placement title) link, you will be launched directly into the Tsugi store selector, select your tool, and press "Install" and the LTI will be installed into the content ares of your course. No further configuration is necessary.</li>
</ol>
<p>The "App Store" / "Content Item" / "Deep Linking" features are an extension to LTI 1.1. They do not require LTI 2.0. Learn supports LTI 2.0 and so does TsugiCloud, but ContentItem is generally preferred over LTI 2.0.</p>

<h1>Brightspace Integration</h1>
<h2>Using TsugiCloud in Brightspace</h2>
<ol>
	<li>Go to the TsugiCloud App Store and login with your Google Account</li>
	<li>Go to the Settings and select "Manage LMS Access Keys". Request an LTI 1.x key and wait for the email approving the key and giving your key and secret. Keep these safe.</li>
	</ol>
<p>Brightspace supports the IMS Content Item standard so you can install this site as an "App Store" / "Learning Object Repository" using this url and your key and secret:</p>
<p>https://www.tsugicloud.org/tsugi/lti/store/</p>
<p>The documentation to install a tool in Brightspace and enabing Content Item support is:</p>