<?php
$servername = "localhost";

/* 
** This file will add data from the form to the database named 
** 'patient_expert_survey' on localhost inserting into the table 
** named patient_expert. If the data can not be inserted,
** an error message will be shown.
** 
** Fill in system user name and password in the fields below
**
*/

$username = "";
$password = "";
$dbname = "patient_expert_survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


// Sanitize input before saving to the database
foreach($_POST as $key=>$value) {
	if (!is_array($value)) {
		$_POST[$key] = htmlspecialchars($value, (ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401), true);
	}
}


if (isset($_POST['save_input']) || isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['email']) || isset($_POST['patient_slider']) || isset($_POST['caregiver_slider']) || isset($_POST['communityMember_slider']) || isset($_POST['communityPartner_slider']) || isset($_POST['healthcareWorker_slider']) || isset($_POST['researcher_slider']) || isset($_POST['clinician_slider']) || isset($_POST['other_slider']) || isset($_POST['perspectives']) || isset($_POST['perspectives_other']) || isset($_POST['date_of_birth']) || isset($_POST['live_in_usa']) || isset($_POST['state']) || isset($_POST['biological_sex']) || isset($_POST['self_perception']) || isset($_POST['gender_identity']) || isset($_POST['religious_identity']) || isset($_POST['other_religious_identity']) || isset($_POST['political_standing']) || isset($_POST['current_live_rural']) || isset($_POST['ever_live_rural']) || isset($_POST['years_lived_rural']) || isset($_POST['current_housing']) || isset($_POST['other_current_housing']) || isset($_POST['housing_experiences']) || isset($_POST['other_housing_experiences']) || isset($_POST['current_employment_status']) || isset($_POST['extended_unemployment']) || isset($_POST['length_of_unemployment']) || isset($_POST['annual_household_income']) || isset($_POST['education_level']) || isset($_POST['active_duty']) || isset($_POST['marital_status']) || isset($_POST['health_insurance']) || isset($_POST['types_of_insurance']) || isset($_POST['other_types_of_insurance']) || isset($_POST['ever_without_insurance']) || isset($_POST['time_without_insurance']) || isset($_POST['services_used']) || isset($_POST['parent']) || isset($_POST['parent_description']) || isset($_POST['in_foster_care']) || isset($_POST['foster_care_experience'])){ 
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$patientSlider = $_POST["patient_slider"];
$caregiverSlider = $_POST["caregiver_slider"];
$communityMemberSlider = $_POST["communityMember_slider"];
$communityPartnerSlider = $_POST["communityPartner_slider"];
$healthcareWorkerSlider = $_POST["healthcareWorker_slider"];
$researcherSlider = $_POST["researcher_slider"];
$clinicianSlider = $_POST["clinician_slider"];
$otherSlider = $_POST["other_slider"];
$perspectives = $_POST["perspectives"];
$perspectivesOther = $_POST["perspectives_other"];
$dob = $_POST["date_of_birth"];
$liveUSA = $_POST["live_in_usa"];
$state = $_POST["state"];
$biologicalSex = $_POST["biological_sex"];
$selfPerception = $_POST["self_perception"];
$genderIdentity = $_POST["gender_identity"];
$religiousIdentity = $_POST["religious_identity"];
$otherReligiousIdentity = $_POST["other_religious_identity"];
$political = $_POST["political_standing"];
$currentLiveRural = $_POST["current_live_rural"];
$everLiveRural = $_POST["ever_live_rural"];
$yearsLiveRural = $_POST["years_lived_rural"];
$housing = $_POST["current_housing"];
$otherHousing = $_POST["other_current_housing"];
$pastHousing = $_POST["housing_experiences"];
$otherPastHousing = $_POST["other_housing_experiences"];
$currentEmploymentStatus = $_POST["current_employment_status"];
$extendedUnemployment = $_POST["extended_unemployment"];
$lengthUnemployment = $_POST["length_of_unemployment"];
$annualHouseholdIncome = $_POST["annual_household_income"];
$educationLevel = $_POST["education_level"];
$activeDuty = $_POST["active_duty"];
$maritalStatus = $_POST["marital_status"];
$healthInsurance = $_POST["health_insurance"];
$typesInsurance = $_POST["types_of_insurance"];
$otherTypesInsurance = $_POST["other_types_of_insurance"];
$everWithoutInsurance = $_POST["ever_without_insurance"];
$timeWithoutInsurance = $_POST["time_without_insurance"];
$insServicesUsed = $_POST["services_used"];
$parent = $_POST["parent"];
$parentDesc = $_POST["parent_description"];
$inFosterCare = $_POST["in_foster_care"];
$experienceFosterCare = $_POST["foster_care_experience"];
}



        $serializedPatientData = serialize($_POST['perspectives']);
        
        $unserializedPatientData = unserialize($serializedPatientData); 
		
		$serializedCategories = serialize($_POST['categories']);
		
		$serializedCurrentHousing = serialize($_POST['current_housing']);
		
		$serializedHousingExperiences = serialize($_POST['housing_experiences']);
		
		$serializedCurrentEmploymentStatus = serialize($_POST['current_employment_status']);
		
		$serializedTypesOfInsurance = serialize($_POST['types_of_insurance']);
		
		$serializedServicesUsed = serialize($_POST['services_used']);
		
		$serializedPhysicalDiisabilities = serialize($_POST['physical_diisabilities']);
		
		$serializedCancer = serialize($_POST['cancer']);
		
		$serializedHeartConditions = serialize($_POST['heart_conditions']);
		
		$serializedSurgeries = serialize($_POST['surgeries']);
		
		$serializedChronicConditions = serialize($_POST['chronic_conditions']);
		
		$serializedMentalHealthConditions = serialize($_POST['mental_health_conditions']);
		
		$serializedEducationalSpecialNeeds = serialize($_POST['educational_special_needs']);
		
		$serializedAddictionBehaviorHabits = serialize($_POST['addiction_behavior_habits']);
		
		$serializedLegalSystemExperience = serialize($_POST['legal_system_experience']);
		



$sql = "INSERT INTO patient_expert (first_name, last_name, email, patient_slider, caregiver_slider, communityMember_slider, communityPartner_slider, healthcareWorker_slider, researcher_slider, clinician_slider, other_slider, perspectives, perspectives_other, date_of_birth, live_in_usa, categories, state, biological_sex, self_perception, gender_identity, religious_identity, other_religious_identity, political_standing, current_live_rural, ever_live_rural, years_lived_rural, current_housing, other_current_housing, housing_experiences, other_housing_experiences, current_employment_status, extended_unemployment, length_of_unemployment, annual_household_income, education_level, active_duty, marital_status, health_insurance, types_of_insurance, other_types_of_insurance, ever_without_insurance, time_without_insurance, services_used, parent, parent_description, in_foster_care, foster_care_experience, physical_disabilities, cancer, heart_conditions, surgeries, chronic_conditions, mental_health_conditions, educational_special_needs, addiction_behavior_habits, legal_system_experience) 
VALUES ('$first_name', '$last_name', '$email', '$patientSlider', '$caregiverSlider', '$communityMemberSlider', '$communityPartnerSlider', '$healthcareWorkerSlider', '$researcherSlider', '$clinicianSlider', '$otherSlider', '$serializedPatientData','$perspectives_other','$date_of_birth', '$live_in_usa', '$serializedCategories', '$state', '$biologicalSex', '$selfPerception', '$genderIdentity', '$religiousIdentity', '$otherReligiousIdentity', '$political', '$currentLiveRural', '$everLiveRural', '$yearsLiveRural', '$serializedCurrentHousing', '$otherHousing', '$serializedHousingExperiences', '$otherPastHousing', '$serializedCurrentEmploymentStatus', '$extendedUnemployment', '$lengthUnemployment', '$annualHouseholdIncome', '$educationLevel', '$activeDuty', '$maritalStatus', '$healthInsurance', '$serializedTypesOfInsurance', '$otherTypesInsurance', '$everWithoutInsurance', '$timeWithoutInsurance', '$serializedServicesUsed', '$parent', '$parentDesc', '$inFosterCare', '$experienceFosterCare', '$serializedPhysicalDiisabilities', '$serializedCancer', '$serializedHeartConditions', '$serializedSurgeries', '$serializedChronicConditions', '$serializedMentalHealthConditions', '$serializedEducationalSpecialNeeds', '$serializedAddictionBehaviorHabits', '$serializedLegalSystemExperience')";


if ($conn->query($sql) === TRUE) {
	echo "Thank you so much - your data has been recorded.";
  //echo "New record created successfully"; 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

?>
