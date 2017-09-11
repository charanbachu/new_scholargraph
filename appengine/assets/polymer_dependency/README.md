<h2> How to get started:</h2>

Install npm (It is needed to install bower)
Install it from here: https://nodejs.org/en/

Now install <b>bower</b> using following command
<code>$ sudo npm install -g bower</code>

Now in the terminal, change working directory to polymer_dependency. In there you have a bower.json file containing the 
meta data for polymer elements.

Run <code> bower install </code>
It will install all the polymer elements listed in bower.json.

If you don't have a bower.json file and you're starting fresh, create one with running <code>bower init</code>

<h4>To add a new element</h4>
Go to polymer element catalogue https://elements.polymer-project.org/ and select the required element. Find a command to install element. Like if you want to install <i>paper-dialog</i>, there will be a command <code>bower install --save PolymerElements/paper-dialog</code> in the left panel.
Run this command and your element will be added. (Note that you must be in the polymer_dependency folder.)

<h4>Using the elements</h4>
After you install polymer elements via bower, there will be a <i>bower_components</i> folder created in the polymer_dependency folder. This folder contains the polymer provided elements that you installed.

To use a particular element say <i>paper-card</i> in your view page:
<ol>
<li> Include <i>webcomponents-lite.min.js</i> script defined in /bower_components/webcomponentsjs/webcomponents-lite.min.js (this must be included in every view file even if you are using vulcanized files - view below for more info) 
```
<script src="path_to_bower_components/webcomponentsjs/webcomponents-lite.min.js"> </script> 
```
<li>Include the polymer element you want via [html imports](http://www.html5rocks.com/en/tutorials/webcomponents/imports/)
```
<link rel="import" href="path_to_bower_components/paper-card/paper-card.html">
```
<li> Use your element in the view page. Example
```
<paper-card>
  <span>Hello Joey! How you doin'?</span>
<paper-card>
```
</li>

<h4>Using custom elements</h4>
Create your custom element in an .html file. Tutorial [here](https://www.polymer-project.org/1.0/start/first-element/step-2).
Import this element in your view page and use it. For example, I have created a question-dialog element in polymer_dependency folder. Import it in any view page and use it like
```
<question-dialog>
  Your Code
</question-dialog>
```

<h4> Vulcanize </h4>
 [Optimize for production](https://www.polymer-project.org/1.0/docs/tools/optimize-for-production)
 
 If you are using several elements in your file then browser will fetch all the files individually which results in large no. of http requests. What [vulcanize](https://github.com/Polymer/vulcanize#vulcanize) does is it creates one single file which contains all the elemenents and their dependencies, thus reducing http requests to one request.
 
 Install vulcanize via following command
 ```
 npm install -g vulcanize
 ```
 
 To vulcanize a file say filename.html to filename-vulc.html, run
 ```
 vulcanize filename.html > filename-vulc.html
 ```
 
 It is a good practice to place your all polymer imports in one single file and then vulcanize it and then import this vulcanized file into your view page.
 
 Example:
 
 Suppose you are using paper-card, paper-button, iron-image and a custom element say question-dialog.
 Then create a file say polymer-imports.html which contains:
 ```
 <link rel="import" href="path_to_bower_components/paper-card/paper-card.html">
 <link rel="import" href="path_to_bower_components/paper-button/paper-button.html">
 <link rel="import" href="path_to_bower_components/iron-image/iron-image.html">
 <link rel="import" href="path_to_question-dialog/question-dialog.html">
 ```
 Now run 
 ```
 vulcanize polymer-imports.html > polymer-imports-vulc.html
 ```
 
Now import this vulcanized file in your view page and you can use these above four elements in your view page
```
<link rel="import" href="path_to_polymer-imports-vulc/polymer-imports-vulc.html">
```

Now if you change anything in polymer-imports.html, then you'll have to again vulcanize it. <br>Or if you don't want to again and again vulcanize, then you can use the non-vulcanized file for development purposes and vulcanize when putting to production.

Once your are using vulcanized files, you no longer need bower_components folder.

<h4>Important things to take care of</h4>
These are the things I observed and wasted enough time struggling, so you can take benefit
<ul>
<li>
While vulcanize does inline all the html imports and scripts into one file, the script files it has imported doesn't work, although html imports work. So you'll have to import the scripts explicitly. I've encountered these two scripts are required
  
<i>bower_components/webcomponentsjs/webcomponents-lite.min.js</i> (that's why importing in each view file explicitly)
<i>bower_components/web-animations-js/web-animations-next-lite.min.js</i> (if you are using neon-animations)

If you are importing these scripts explicitly from a location other than /bower_components (like here from polymer_dependency itself) then you must remove bower_components folder from there otherwise there will be duplication of scripts and it won't work.
</li>

<li>
You can only use one vulcanized file in your page otherwise it'll result in duplication of definitions and won't work.
</li>

<li>
Firefox can serve polymer elements even without a server. But chrome needs a server to run polymer elements. Always use a server to view polymer pages.
</li>
<ul>
