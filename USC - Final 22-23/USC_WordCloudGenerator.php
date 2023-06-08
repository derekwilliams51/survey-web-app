<!-- USC Word Cloud Generator -->


<!DOCTYPE html>
<meta charset="utf-8">
<html>
    <head><title>Sample Word Cloud</title></head>
<body style="background-color: black;">

<h3>Word Cloud</h3>
   
<!-- Create a div where the graph will take place -->
<div id="word_cloud"></div>

<!-- Create a button that will download a transparent PNG of WC -->
<div id="wordCloud">
    <button  onclick="exportToPNG()">Download Wordcloud PNG</button>
    <div id="word_cloud"></div>
    <canvas hidden id="canvas" width="1000" height="750"></canvas>
</div>

<!-- Load d3.js -->
<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="d3.layout.cloud.js"></script>

<?php

/* 
** This file will use the Davies word cloud library to create
** a word cloud of the patient data from the database.
** 
** Fill in system user name and password in the fields below
**
*/

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "patient_expert_survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    
// Generate command to gather words from word cloud
// using specific patient id
    
$id = $_POST["id"];
    
$sqlquery = "SELECT id, perspectives, perspectives_other, date_of_birth, live_in_usa, categories, state, biological_sex, self_perception, gender_identity, religious_identity, other_religious_identity, political_standing, current_live_rural, ever_live_rural, years_lived_rural, current_housing, other_current_housing, housing_experiences, other_housing_experiences, current_employment_status, extended_unemployment, length_of_unemployment, annual_household_income, education_level, active_duty, marital_status, health_insurance, types_of_insurance, other_types_of_insurance, ever_without_insurance, time_without_insurance, services_used, parent, parent_description, in_foster_care, foster_care_experience, physical_disabilities, cancer, heart_conditions, surgeries, chronic_conditions, mental_health_conditions, educational_special_needs, addiction_behavior_habits, legal_system_experience FROM patient_expert WHERE id = " . $id;

    $result1 = $conn->query($sqlquery);
if (!$result1) {
    echo 'Could not run query: ' . mysqli_error($conn);
    exit;
} 

// generate command to gather slider information to size words
// word sizing will be implemented in future project.
    
$row1 = $result1->fetch_assoc();
  
$sqlquery1 = "SELECT id, patient_slider, caregiver_slider, communityMember_slider, communityPartner_slider, healthcareWorker_slider, researcher_slider, clinician_slider, other_slider, acqBrInj_slider, als_slider, amputation_slider, arthritis_slider, cPalsy_slider, cFibrosis_slider, epilepsy_slider, hearing_impairment_slider, muscular_dystrophy_slider, musculoskeletal_disease_slider, multiple_sclerosis_slider, physical_difference_slider, osteoporosis_slider, tourette_syndrome_slider, spina_bifida_slider, spinal_cord_injury_slider, visual_impairment_slider, physicalDisability_slider, bladder_slider, breast_slider, colon_and_rectal_slider, endometrial_slider, kidney_slider, leukemia_slider, liver_slider, lung_slider, skin_slider, non_hodgkins_lymphoma_slider, pancreatic_slider, prostate_slider, thyroid_slider_number, cancerOther_slider, congenital_heart_disease_slider, coronary_artery_disease_slider, heart_arrhythmia_slider, dilated_cardiomyopathy_slider, pulmonary_stenosis_slider, heart_valve_disease_slider, mitral_valve_prolapse_slider, hypertension_slider, pericarditis_slider_number, otherHeart_slider, acl_reconstruction_surgery_slider, ankle_repair_slider_number, knee_replacement_surgery_slider, shoulder_replacement_surgery_slider, hip_replacement_surgery_slider, knee_arthroscopy_slider, shoulder_arthroscopy_slider, spinal_surgeries_slider, surgeries_slider, alzheimer_slider, asthma_slider, copd_slider, crohns_slider, ulcerative_colitis_slider, inflamBowel_slider, irritable_bowel_syndrome_slider, diabetes_slider, eating_disorders_slider, oral_health_slider, otherChronic_slider, bipolar_disorder_slider, depression_slider, generalized_anxiety_disorder_slider, obsessive_compulsive_disorder_slider, posttraumatic_stress_disorder_slider, schizophrenia_slider, social_anxiety_disorder_slider, otherMental_slider, auditory_processing_disorder_slider, aspergers_slider, attention_deficit_slider, autism_slider, developmental_delays_slider, down_syndrome_slider, dyscalculia_slider, dysgraphia_slider, dyslexia_slider, fragile_slider, language_processing_disorder_slider, mental_retardation_slider, nonverbal_learning_disabilities_slider, oppositional_defiant_disorder_slider, visual_slider, alcoholism_slider, overweight_slider, drug_use_slider, gambling_slider, physical_inactivity_slider, smoking_slider, unhealthy_diet_slider, otherAddictive_slider FROM patient_expert WHERE id = " . $id;
$result1Sliders = $conn->query($sqlquery1);
if (!$result1Sliders) {
    echo 'Could not run query: ' . mysqli_error($conn);
    exit;
} 

$row1Slider = $result1Sliders->fetch_assoc();
    
/*
  Use PHP to generate Javascript word cloud using the words gathered from the database.
*/

echo '<script>';
echo "var myWords = [";
foreach($row1 as $word) {
    if (($word == $row1["perspectives"]) || ($word == $row1["categories"]) || ($word == $row1["current_housing"]) || ($word == $row1["housing_experiences"]) || ($word == $row1["current_employment_status"]) || ($word == $row1["types_of_insurance"]) || ($word == $row1["services_used"]) || ($word == $row1["physical_disabilities"]) || ($word == $row1["cancer"]) || ($word == $row1["heart_conditions"]) || ($word == $row1["surgeries"]) || ($word == $row1["chronic_conditions"]) || ($word == $row1["educational_special_needs"]) || ($word == $row1["addiction_behavior_habits"]) || ($word == $row1["legal_system_experience"]) || ($word == $row1["mental_health_conditions"])) {
        $arrayData = unserialize($word);
		if (!is_null($arrayData)) {
			foreach($arrayData as $data) {
			 echo "'" . $data . "',";
			}
		}
    } else if (($word == $row1["id"]) || ($word == "no") || ($word == "No") || ($word == "yes") || ($word == "Yes") || ($word == "prefer not to answer") || ($word == "Prefer Not To Answer") || ($word == "none of the above") || ($word == "Array")) { // skip this entry
    } else {
        echo "'" . $word . "',";
    }  
}
    
echo "'' ]";

// Completing PHP commands; now using Javascript for remainder.

?> 
<!-- script  --> 
console.log("Words are:");
console.log(myWords);
    
var colors=["#73000a","#ffffff", "#A2A2A2","#fff2e3","#676156","#65780b","#ced318","#466a9f","#cc2e40","#1f414d","#a49137"];

var fill=d3.schemeCategory20;
var width = 1000, height = 750;
d3.layout.cloud()
    .size([width, height])
    .words(myWords.map(function(d) {
      return {text: d, size: 30};
    }))
    .padding(5)
    //.rotate(function() { return ~~(Math.random() * 2) * 90; })
    .font("Impact")
    .fontSize(function(d) { return d.size; })
    .on("end", draw)
    .start();


function draw(words) {
  console.log(Math.random()*colors.length);
  var svg = d3.select("#word_cloud").append("svg")
      .attr("width", width)
      .attr("height", height)
    .append("g")
      .attr("transform", "translate(" + (width/2) +", " + (height/2) + ")")
    .selectAll("text")
      .data(words)
    .enter().append("text")
      .style("font-size", function(d) { return d.size + "px"; })
      .style("font-family", "Impact")
      .style("fill", function(d,i) { return (colors[Math.floor(Math.random()*colors.length+1)])})
      .attr("text-anchor", "middle")
      .attr("transform", function(d) { return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")"; })
      .text(function(d) { return d.text; });
}

  function exportToPNG () {
		console.log("Inside exportToPNG");
                  var html = d3.select("svg") //svg
                        .attr("version", 1.1)
						.attr("xmlns", "http://www.w3.org/2000/svg")
                        .node().parentNode.innerHTML;

                  var imgsrc = 'data:image/svg+xml;base64,' + btoa(html);
                  var img = '<img src="' + imgsrc + '">';
                  d3.select("#svgdataurl").html(img);


                  var canvas = document.querySelector("canvas"),
                      context = canvas.getContext("2d");

                  var image = new Image;
                  image.src = imgsrc;
                  image.onload = function () {
                      context.drawImage(image, 0, 0);

                      var canvasdata = canvas.toDataURL("image/png");

                      var pngimg = '<img src="' + canvasdata + '">';
                      d3.select("#pngdataurl").html(pngimg);

                      var a = document.createElement("a");
                      a.download = "wordCloud.png";
                      a.href = canvasdata;
                      a.click();
                  };
              }
</script>


<!-- Load d3.js -->
<script src="https://d3js.org/d3.v3.min.js"></script>
<!-- <script src="https://d3js.org/d3.v4.js"></script> -->
<script src="d3.layout.cloud.js"></script>
<!-- <script src="wordCloud.js"></script> -->

    
</body>
</html>
