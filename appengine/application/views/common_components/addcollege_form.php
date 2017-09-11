<form id="collegeForm">
	<table>
	<tr><td>
		<paper-input hidden name = "college" id="college-id" value="-1"></paper-input>
		<paper-input label="College Name" id = "college" type="text" auto-validate error-message="College Required" placeholder = "College Name ...">
			<iron-icon icon="social:location-city" prefix></iron-icon>
		</paper-input>
		<div id="collegeSearchResults"></div>
	</td></tr>
	<tr><td>
		<paper-input hidden name="member" id="member" ></paper-input>
		<paper-dropdown-menu id = "member-select" label="Member" style="width: 100%;" placeholder = "Alumni, Student ..." icon = "icons:description" auto-validate error-message="Member required">
			<paper-listbox class="dropdown-content">
				<paper-item>Alumni</paper-item>
				<paper-item>Student</paper-item>
				<paper-item>Faculty</paper-item>
			</paper-listbox>
		</paper-dropdown-menu>
	</td></tr>
	<tr><td>
		<paper-input hidden name = "stream-id" id="stream-id" value="-1"></paper-input>	
		<paper-input label="Stream/School" id="stream" name="stream" type="text" auto-validate error-message="Stream/School Required" placeholder="Engineering, Medical ..." disabled>
			<iron-icon icon="icons:description" prefix></iron-icon>
		</paper-input>
		<div id="streamSearchResults" style="display: none"></div>
	</td></tr>
	<tr><td>
		<paper-input hidden name = "degree-id" id="degree-id" value="-1"></paper-input>
		<paper-input label="Degree" id="degree" name="degree" type="text" auto-validate error-message="Degree Required" placeholder = "Undergraduate, Masters ..." disabled>
			<iron-icon icon="social:school" prefix></iron-icon>
		</paper-input>
		<div id="degreeSearchResults" style="display: none"></div>
	</td></tr>
	<tr><td>
		<paper-input hidden name = "major-id" id="major-id" value="-1"></paper-input>
		<paper-input label="Major" id="major" name="major" type="text" auto-validate error-message="Major Required" placeholder = "Computer Science, Geology ..." disabled>
			<iron-icon icon="social:domain" prefix></iron-icon>
		</paper-input>
		<div id="majorSearchResults" style="display: none"></div>
	</td></tr>
	<tr><td>
		<paper-input label="Batch" name="batch" type="text" list="batch-list" placeholder="Passing out year ...">
			<iron-icon icon="date-range" prefix></iron-icon>
		</paper-input>
	</td></tr>
	</table>
</form>