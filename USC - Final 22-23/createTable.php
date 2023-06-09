<?php
$servername = "localhost";

/* 
** This file will create a new table for the database on 
** localhost named patient_expert
** If the table can not be created, an error message will 
** be shown.
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


$sql = "CREATE TABLE patient_expert (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
first_name VARCHAR(60),
last_name VARCHAR(60),
email VARCHAR(60),
patient_slider INT,
caregiver_slider INT,
communityMember_slider INT,
communityPartner_slider INT,
healthcareWorker_slider INT,
researcher_slider INT,
clinician_slider INT,
other_slider INT,
perspectives TEXT(2000),
perspectives_other TEXT(2000),
date_of_birth VARCHAR(60),
live_in_usa VARCHAR(60),
state VARCHAR(60),
lived_outside_usa VARCHAR(60),
other_countries TEXT(2000),
categories TEXT(2000),
categories_other TEXT(2000),
categories_tribe TEXT(2000),
biological_sex VARCHAR(60),
self_perception TEXT(2000),
gender_identity TEXT(2000),
religious_identity VARCHAR(60),
other_religious_identity TEXT(2000),
political_standing VARCHAR(60),
current_live_rural VARCHAR(60),
ever_live_rural VARCHAR(60),
years_lived_rural TEXT(2000),
current_housing TEXT(2000),
other_current_housing TEXT(2000),
housing_experiences TEXT(2000),
other_housing_experiences TEXT(2000),
current_employment_status TEXT(2000),
other_current_employment TEXT(2000),
extended_unemployment VARCHAR(60),
length_of_unemployment TEXT(2000),
annual_household_income VARCHAR(60),
education_level VARCHAR(60),
active_duty VARCHAR(60),
marital_status VARCHAR(60),
health_insurance VARCHAR(60),
types_of_insurance TEXT(2000),
other_types_of_insurance TEXT(2000),
ever_without_insurance VARCHAR(60),
time_without_insurance TEXT(2000),
services_used TEXT(2000),
parent VARCHAR(60),
parent_description TEXT(2000),
other_parent TEXT(2000),
in_foster_care VARCHAR(60),
foster_care_experience TEXT(2000),
physical_disabilities TEXT(2000),
acqBrInj_slider INT,
als_slider INT,
amputation_slider INT,
arthritis_slider INT,
cPalsy_slider INT,
cFibrosis_slider INT,
epilepsy_slider INT,
hearing_impairment_slider INT,
muscular_dystrophy_slider INT,
musculoskeletal_disease_slider INT,
multiple_sclerosis_slider INT,
physical_difference_slider INT,
osteoporosis_slider INT,
tourette_syndrome_slider INT,
spina_bifida_slider INT,
spinal_cord_injury_slider INT,
visual_impairment_slider INT,
other_physical_disabilities TEXT(2000),
physicalDisability_slider INT,
bladder_slider INT,
breast_slider INT,
colon_and_rectal_slider INT,
endometrial_slider INT,
kidney_slider INT,
leukemia_slider INT,
liver_slider INT,
lung_slider INT,
skin_slider INT,
non_hodgkins_lymphoma_slider INT,
pancreatic_slider INT,
prostate_slider INT,
thyroid_slider_number INT,
cancerOther_slider INT,
cancer TEXT(2000),
other_cancer TEXT(2000),
heart_conditions TEXT(2000),
congenital_heart_disease_slider INT,
coronary_artery_disease_slider INT,
heart_arrhythmia_slider INT,
dilated_cardiomyopathy_slider INT,
pulmonary_stenosis_slider INT,
heart_valve_disease_slider INT,
mitral_valve_prolapse_slider INT,
hypertension_slider INT,
pericarditis_slider_number INT,
other_heart_conditions TEXT(2000),
otherHeart_slider INT,
acl_reconstruction_surgery_slider INT,
ankle_repair_slider_number INT,
knee_replacement_surgery_slider INT,
shoulder_replacement_surgery_slider INT,
hip_replacement_surgery_slider INT,
knee_arthroscopy_slider INT,
shoulder_arthroscopy_slider INT,
spinal_surgeries_slider INT,
surgeries_slider INT,
surgeries TEXT(2000),
other_surgeries TEXT(2000),
chronic_conditions TEXT(2000),
alzheimer_slider INT,
asthma_slider INT,
copd_slider INT,
crohns_slider INT,
ulcerative_colitis_slider INT,
inflamBowel_slider INT,
irritable_bowel_syndrome_slider INT,
diabetes_slider INT,
eating_disorders_slider INT,
oral_health_slider INT,
otherChronic_slider INT,
bipolar_disorder_slider INT,
depression_slider INT,
generalized_anxiety_disorder_slider INT,
obsessive_compulsive_disorder_slider INT,
posttraumatic_stress_disorder_slider INT,
schizophrenia_slider INT,
social_anxiety_disorder_slider INT,
other_chronic_conditions TEXT(2000),
mental_health_conditions TEXT(2000),
other_mental_health_conditions TEXT(2000),
otherMental_slider INT,
educational_special_needs TEXT(2000),
auditory_processing_disorder_slider INT,
aspergers_slider INT,
attention_deficit_slider INT,
autism_slider INT,
developmental_delays_slider INT,
down_syndrome_slider INT,
dyscalculia_slider INT,
dysgraphia_slider INT,
dyslexia_slider INT,
fragile_slider INT,
language_processing_disorder_slider INT,
mental_retardation_slider INT,
nonverbal_learning_disabilities_slider INT,
oppositional_defiant_disorder_slider INT,
visual_slider INT,
addiction_behavior_habits TEXT(2000),
alcoholism_slider INT,
overweight_slider INT,
drug_use_slider INT,
gambling_slider INT,
physical_inactivity_slider INT,
smoking_slider INT,
unhealthy_diet_slider INT,
other_addiction_behavior_habits TEXT(2000),
otherAddictive_slider INT,
other_health_condition_unlisted TEXT(2000),
legal_system_experience TEXT(2000),
other_legal_experience TEXT(2000),
healthcare_challenges TEXT(2000),
personal_info TEXT(2000),
topics_of_interest TEXT(2000),
share_your_story TEXT(2000)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table patient_expert created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?>
