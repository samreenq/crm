<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("includes/compatibility.php"); ?>
   <meta name="description" content="">
   <title>Site Name</title>
   <?php include("includes/style.php"); ?>

</head>


<body>


    <section class="quizes-screen">

        <div class="progressBar">
            <div class="progressBar-Wrapper">
                <button class="css-91w14s-eC-category css-1gpo6gk-eC-current interactive" type="button"
                    onclick="firstButton()">
                    <span class="eC-advancement">
                    </span>
                    <p class="categorylabel">
                        Client Information
                    </p>
                </button>
                <button class="css-91w14s-eC-category" type="button" onclick="secondButton()">
                    <span class="garden" style="width: 0px;">
                    </span>
                    <p class="categorylabel">
                        Garden Bed and Design Installation Information
                    </p>
                </button>
                <button class="css-91w14s-eC-category" type="button" onclick="thirdButton()">
                    <span class="hardscape" id="hard" style="width: 0px;"></span>
                    <p class="categorylabel">
                        Hardscape and Design Installation Information
                    </p>
                </button>
                <button class="css-91w14s-eC-category" type="button" onclick="fourthButton()">
                    <span class="fourth" style="width: 0px;">
                    </span>
                    <p class="categorylabel">
                        Preferences &amp; Goals
                    </p>
                </button>
            </div>
        </div>
    </section>
    <section class="questions">
        <div class="client-info-questions" id="firstsection">
            <div class="question1 question" id="client-info-first">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>best time of day to reach you. </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="time" id="morning" value="Mornings" hidden>
                                    <label for="morning">Mornings</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="time" id="afternoon" value="Afternoons" hidden>
                                    <label for="afternoon">Afternoons</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="time" id="evening" value="Evenings" hidden>
                                    <label for="evening">Evenings</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question2 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>How do you prefer to be contacted:</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="contactMethod" id="phoneCall" value="phone call" hidden>
                                    <label for="phoneCall">Phone Call</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="contactMethod" id="text" value="Text" hidden>
                                    <label for="text">Text</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="contactMethod" id="email" value="e-mail" hidden>
                                    <label for="email">E-mail</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="question3 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>How did you hear about us? </h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="source" id="referral" value="referral" hidden>
                                    <label for="referral">Referral</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="source" id="google" value="google" hidden>
                                    <label for="google">Google</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="source" id="socialMedia" value="social media" hidden>
                                    <label for="socialMedia">Social Media</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="source" id="driving" value="you saw us out and about driving" hidden>
                                    <label for="driving">You saw us out and about driving</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="source" id="neighbors" value="you saw us in at your neighbors or in the neighborhood" hidden>
                                    <label for="neighbors">You saw us in at your neighbors or in the
                                        neighborhood</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="source" id="business" value="I drove by your business and decided today was the day I am getting landscaping done!" hidden>
                                    <label for="business">I drove by your business and decided today was the day I am
                                        getting landscaping done!</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="question4 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Will this landscape installation be for a</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="houseType" id="houseOwn" value="House I Own" hidden>
                                    <label for="houseOwn">House I Own</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="houseType" id="houseRent" value="House I Rent" hidden>
                                    <label for="houseRent">House I Rent</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="houseType" id="houseHOA" value="House in HOA" hidden>
                                    <label for="houseHOA">House in HOA</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question5 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>have you gotten hoa approval for landscape renovations</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="yesNo" id="yes" value="Yes" hidden>
                                    <label for="yes">Yes</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="yesNo" id="no" value="No" hidden>
                                    <label for="no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question6 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>How soon do you want to get started</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="choice1" value="soon" id="choice1_soon">
                                    <label for="choice1_soon">How soon do you want to get started</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="choice1" value="timeframe" id="choice1_timeframe">
                                    <label for="choice1_timeframe">I would like to know the starting time frame</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="choice1" value="planner" id="choice1_planner">
                                    <label for="choice1_planner">I am a planner and I don't need to get started right
                                        away</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section 2 -->
        <div class="Garden-Bed-and-Design" id="secondsection">
            <div class="question7 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Are you Interested in getting any garden bed installation </h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="choice1" value="yes" id="choice1_yes">
                                    <label for="choice1_yes">Yes</label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="choice1" value="no" id="choice1_no">
                                    <label for="choice1_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question8 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>What areas would you like done?</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="yard_choice" value="front_existing" id="yard_front_existing">
                                        <label for="yard_front_existing">
                                            <p>Front yard</p>
                                            <span>Adding onto existing garden bed</span>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="yard_choice" value="front_new" id="yard_front_new">
                                        <label for="yard_front_new">
                                            <p>Front yard</p>
                                            <span>would like to do something completely new</span>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="yard_choice" value="back_existing" id="yard_back_existing">
                                        <label for="yard_back_existing">
                                            <p>Backyard</p>
                                            <span>Adding onto existing garden bed</span>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="yard_choice" value="back_new" id="yard_back_new">
                                        <label for="yard_back_new">
                                            <p>Backyard</p>
                                            <span>would like to do something completely new</span>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="yard_choice" value="side_existing" id="yard_side_existing">
                                        <label for="yard_side_existing">
                                            <p>Side yard</p>
                                            <span>Adding onto existing garden bed</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="landscape_choice" value="existing_bed" id="landscape_existing_bed">
                                        <label for="landscape_existing_bed">
                                            <p>Would like to add onto existing garden bed in both front and backyard</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_choice" value="new_design" id="landscape_new_design">
                                        <label for="landscape_new_design">
                                            <p>Would like a completely new landscape design for both the front and
                                                backyard</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_choice" value="entire_yard" id="landscape_entire_yard">
                                        <label for="landscape_entire_yard">
                                            <p>Would like a brand new landscape design done for my entire yard</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_choice" value="other" id="landscape_other">
                                        <label for="landscape_other">
                                            <p>Other - Please specify</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question9 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Design style : click on all that apply</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="garden_style" value="formal" id="garden_formal">
                                        <label for="garden_formal">
                                            <p>Formal (linear or curvature)</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_style" value="modern" id="garden_modern">
                                        <label for="garden_modern">
                                            <p>Modern</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_style" value="english" id="garden_english">
                                        <label for="garden_english">
                                            <p>English</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_style" value="japanese" id="garden_japanese">
                                        <label for="garden_japanese">
                                            <p>Japanese</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_style" value="mediterranean" id="garden_mediterranean">
                                        <label for="garden_mediterranean">
                                            <p>Mediterranean</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_style" value="french" id="garden_french">
                                        <label for="garden_french">
                                            <p>French</p>
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="garden_theme" value="xeriscaping" id="garden_xeriscaping">
                                        <label for="garden_xeriscaping">
                                            <p>Xeriscaping</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_theme" value="cottage" id="garden_cottage">
                                        <label for="garden_cottage">
                                            <p>Cottage</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_theme" value="tropical" id="garden_tropical">
                                        <label for="garden_tropical">
                                            <p>Tropical</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_theme" value="desert" id="garden_desert">
                                        <label for="garden_desert">
                                            <p>Desert</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_theme" value="simple" id="garden_simple">
                                        <label for="garden_simple">
                                            <p>No style, just simple and to spruce things up</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question10 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Garden Bed: Check all that apply </h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="garden_goals" value="attract_pollinators" id="goal_attract_pollinators">
                                        <label for="goal_attract_pollinators">
                                            <p>I want to attract pollinators, birds, wildlife</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_goals" value="incorporate_natives" id="goal_incorporate_natives">
                                        <label for="goal_incorporate_natives">
                                            <p>I would like to incorporate or use all natives</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_goals" value="selective_plants" id="goal_selective_plants">
                                        <label for="goal_selective_plants">
                                            <p>I’m allergic to bees and need to be selective on plants used</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_goals" value="bad_allergies" id="goal_bad_allergies">
                                        <label for="goal_bad_allergies">
                                            <p>I have bad allergies</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_goals" value="year_round_beauty" id="goal_year_round_beauty">
                                        <label for="goal_year_round_beauty">
                                            <p>I want something beautiful year round</p>
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="garden_preferences" value="low_maintenance" id="preference_low_maintenance">
                                        <label for="preference_low_maintenance">
                                            <p>I want easy low maintenance</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_preferences" value="block_views" id="preference_block_views">
                                        <label for="preference_block_views">
                                            <p>I would like to block certain views</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_preferences" value="hedge" id="preference_hedge">
                                        <label for="preference_hedge">
                                            <p>I am interested in a hedge</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_preferences" value="unique_design" id="preference_unique_design">
                                        <label for="preference_unique_design">
                                            <p>would like to see the designer use their creativity and create something
                                                unique just for me</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question11 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Additional features </h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="water_feature" id="feature_water">
                                        <label for="feature_water">
                                            <p>Water feature</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="dry_stream_bed" id="feature_dry_stream">
                                        <label for="feature_dry_stream">
                                            <p>Dry stream bed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="boulder_accents" id="feature_boulders">
                                        <label for="feature_boulders">
                                            <p>Boulder accents</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="lighting" id="feature_lighting">
                                        <label for="feature_lighting">
                                            <p>Lighting</p>
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="irrigation" id="feature_irrigation">
                                        <label for="feature_irrigation">
                                            <p>Irrigation</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="stairs" id="feature_stairs">
                                        <label for="feature_stairs">
                                            <p>Stairs</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="pathways" id="feature_pathways">
                                        <label for="feature_pathways">
                                            <p>Pathways</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="garden_features" value="sound_systems" id="feature_sound_systems">
                                        <label for="feature_sound_systems">
                                            <p>Sound systems</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question12 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Blooming Colors I want: Check all that apply </h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="white" id="color_white">
                                        <label for="color_white">
                                            <p>White</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="yellow" id="color_yellow">
                                        <label for="color_yellow">
                                            <p>Yellow</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="orange" id="color_orange">
                                        <label for="color_orange">
                                            <p>Orange</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="red" id="color_red">
                                        <label for="color_red">
                                            <p>Red</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="purple" id="color_purple">
                                        <label for="color_purple">
                                            <p>Purple</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="pink" id="color_pink">
                                        <label for="color_pink">
                                            <p>Pink</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="blue" id="color_blue">
                                        <label for="color_blue">
                                            <p>Blue</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="green" id="color_green">
                                        <label for="color_green">
                                            <p>Green</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="flower_color" value="black" id="color_black">
                                        <label for="color_black">
                                            <p>Black</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question13 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Leaf Colors I want Check all that apply</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="leaf_color" value="light_green" id="color_light_green">
                                        <label for="color_light_green">
                                            <p>Light Green</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="leaf_color" value="green" id="color_green">
                                        <label for="color_green">
                                            <p>Green</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="leaf_color" value="lime_green" id="color_lime_green">
                                        <label for="color_lime_green">
                                            <p>Lime Green</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="leaf_color" value="dark_green" id="color_dark_green">
                                        <label for="color_dark_green">
                                            <p>Dark Green</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="leaf_pattern" value="variegated_green_white" id="pattern_variegated_green_white">
                                        <label for="pattern_variegated_green_white">
                                            <p>Variegated green and white</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="leaf_pattern" value="variegated_green_yellow" id="pattern_variegated_green_yellow">
                                        <label for="pattern_variegated_green_yellow">
                                            <p>Variegated green and yellow</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="leaf_pattern" value="blue" id="pattern_blue">
                                        <label for="pattern_blue">
                                            <p>Blue</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="leaf_pattern" value="mixture_all" id="pattern_mixture_all">
                                        <label for="pattern_mixture_all">
                                            <p>Mixture of All</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question14 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Top dressing</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="ground_cover" value="mulch" id="cover_mulch">
                                    <label for="cover_mulch">
                                        <p>Mulch</p>
                                        <span>(There are many different types of mulches that can be further discussed with your designer)</span>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="ground_cover" value="rock" id="cover_rock">
                                    <label for="cover_rock">
                                        <p>Rock</p>
                                        <span>(There are many different types of rocks that can be further discussed with your designer)</span>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="ground_cover" value="nothing" id="cover_nothing">
                                    <label for="cover_nothing">
                                        <p>Nothing</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="ground_cover" value="unsure" id="cover_unsure">
                                    <label for="cover_unsure">
                                        <p>Unsure, but I am open to ideas</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question15 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Edging</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="edging" value="natural_lip" id="edging_natural_lip">
                                    <label for="edging_natural_lip">
                                        <p>Natural Lip Edging</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="edging" value="vinyl" id="edging_vinyl">
                                    <label for="edging_vinyl">
                                        <p>Vinyl (Plastic)</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="edging" value="steel" id="edging_steel">
                                    <label for="edging_steel">
                                        <p>Steel Edging</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="edging" value="concrete_pavers" id="edging_concrete_pavers">
                                    <label for="edging_concrete_pavers">
                                        <p>Concrete Bullet Pavers</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="edging" value="natural_stone" id="edging_natural_stone">
                                    <label for="edging_natural_stone">
                                        <p>Natural Stone</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="edging" value="unsure" id="edging_unsure">
                                    <label for="edging_unsure">
                                        <p>Unsure, but I am open to ideas</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question16 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>We want to make sure we are thinking of everyone: check all that apply</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="kids" value="yes" id="kids_yes">
                                    <label for="kids_yes">
                                        <p>Do you have kids</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="kids" value="grandkids" id="kids_grandkids">
                                    <label for="kids_grandkids">
                                        <p>Grandkids</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="kids" value="nieces_nephews" id="kids_nieces_nephews">
                                    <label for="kids_nieces_nephews">
                                        <p>Nieces/Nephews</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="kids" value="doesnt_apply" id="kids_doesnt_apply">
                                    <label for="kids_doesnt_apply">
                                        <p>Doesn't Apply</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question17 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Do you have pets we should take into consideration</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="yes_no" value="yes" id="yes_no_yes">
                                    <label for="yes_no_yes">
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="yes_no" value="no" id="yes_no_no">
                                    <label for="yes_no_no">
                                        <p>No</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question18 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>What is your planting budget</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="budget" value="not_sure" id="budget_not_sure">
                                        <label for="budget_not_sure">
                                            <p>I’m not sure</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="1000_5000" id="budget_1000_5000">
                                        <label for="budget_1000_5000">
                                            <p>1,000-5,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="5000_10000" id="budget_5000_10000">
                                        <label for="budget_5000_10000">
                                            <p>5,000-10,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="10000_20000" id="budget_10000_20000">
                                        <label for="budget_10000_20000">
                                            <p>10,000-20,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="20000_50000" id="budget_20000_50000">
                                        <label for="budget_20000_50000">
                                            <p>20,000-50,000</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="budget" value="50000_100000" id="budget_50000_100000">
                                        <label for="budget_50000_100000">
                                            <p>50,000-100,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="100000_200000" id="budget_100000_200000">
                                        <label for="budget_100000_200000">
                                            <p>100,000-200,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="200000_300000" id="budget_200000_300000">
                                        <label for="budget_200000_300000">
                                            <p>200,000-300,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="endless" id="budget_endless">
                                        <label for="budget_endless">
                                            <p>Endless budget I want it all!</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section 3 -->
        <div class="Hardscape-and-Design">
            <div class="question19 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Are you interested in getting any hardscapes installed?</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="kids" value="yes" id="kids_yes">
                                    <label for="kids_yes">
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="kids" value="no" id="kids_no">
                                    <label for="kids_no">
                                        <p>No</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question20 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Are you interested in getting any hardscapes installed?</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="deck" value="no" id="deck">
                                        <label for="">
                                            <p>Deck</p>
                                        </label>
                                        <div class="radiobtn p-2">
                                            <div class="checkbx">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Existing deck to demo</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Existing deck to add onto</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Brand new deck</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="Patio" value="no" id="Patio">
                                        <label for="">
                                            <p>Patio</p>
                                        </label>
                                        <div class="radiobtn p-2">
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Existing patio to demo</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Existing patio to add onto</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Brand new patio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="Covered" value="no" id="Covered">
                                        <label for="">
                                            <p>Covered structure</p>
                                        </label>
                                        <div class="radiobtn p-2">
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Pergola</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Pavillion</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Patio Cover</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Gazebo</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Pool House</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Greenhouse</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Arbor</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Trellis</label>
                                                </di>
                                            </div>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="Pool" value="Pool" id="Pool">
                                            <label for="kids_no">
                                                <p>Pool</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="Outdoor" value="Outdoor" id="Outdoor">
                                            <label for="Outdoor">
                                                <p>Outdoor kitchens</p>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="Fireplace" value="Fireplace" id="Fireplace">
                                        <label for="Fireplace">
                                            <p>Fire place</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="Firepit" value="Firepit" id="Firepit">
                                        <label for="Firepit">
                                            <p>Fire pit</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="SeatWall" value="SeatWall" id="SeatWall">
                                        <label for="SeatWall">
                                            <p>Seat Wall</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="RetainingWall" value="RetainingWall" id="RetainingWall">
                                        <label for="RetainingWall">
                                            <p>Retaining Wall</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="Fencing" value="Fencing" id="Fencing">
                                        <label for="Fencing">
                                            <p>Fencing</p>
                                        </label>
                                        <div class="radiobtn p-2">
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Wood</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Composite</label>
                                            </div>
                                            <div class="checkbx">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Chainlink</label>
                                            </div>
                                            <div class="checkbx ">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Iron</label>
                                            </div>
                                            <div class="checkbx">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Metal</label>
                                            </div>
                                            <div class="checkbx">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Vinyl </label>
                                            </div>
                                            <div class="checkbx">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Aluminum </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question21 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Additional features </h2>
                                <span>
                                    <p>(If you already checked these additional features in garden bed installation
                                        you
                                        do not need to check them again)</p>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="features" value="water_feature" id="water_feature">
                                        <label for="water_feature">
                                            <p>Water feature</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="features" value="dry_stream_bed" id="dry_stream_bed">
                                        <label for="dry_stream_bed">
                                            <p>Dry stream bed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="features" value="boulder_accents" id="boulder_accents">
                                        <label for="boulder_accents">
                                            <p>Boulder accents</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="features" value="lighting" id="lighting">
                                        <label for="lighting">
                                            <p>Lighting</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="outdoor_features" value="stairs" id="stairs">
                                        <label for="stairs">
                                            <p>Stairs</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="outdoor_features" value="pathways" id="pathways">
                                        <label for="pathways">
                                            <p>Pathways</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="outdoor_features" value="sound_systems" id="sound_systems">
                                        <label for="sound_systems">
                                            <p>Sound systems</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question22 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>What is your hardscape budget:</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="budget" value="not_sure" id="not_sure">
                                        <label for="not_sure">
                                            <p>I'm not sure</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="5000_10000" id="5000_10000">
                                        <label for="5000_10000">
                                            <p>5,000-10,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="10000_20000" id="10000_20000">
                                        <label for="10000_20000">
                                            <p>10,000-20,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="20000_50000" id="20000_50000">
                                        <label for="20000_50000">
                                            <p>20,000-50,000</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="budget" value="50000_100000" id="50000_100000">
                                        <label for="50000_100000">
                                            <p>50,000-100,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="100000_200000" id="100000_200000">
                                        <label for="100000_200000">
                                            <p>100,000-200,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="200000_300000" id="200000_300000">
                                        <label for="200000_300000">
                                            <p>200,000-300,000</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="budget" value="endless" id="endless">
                                        <label for="endless">
                                            <p>Endless budget, I want it all!</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section 4 -->
        <div class="miscellaneous-work" id="firstsection">
            <div class="question23 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Are you interested in getting some miscellaneous landscape work done</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="answer" value="yes" id="answer_yes">
                                    <label for="answer_yes">
                                        <p>Yes</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="answer" value="no" id="answer_no">
                                    <label for="answer_no">
                                        <p>No</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question24 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Landscape</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-left-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="landscape_action" id="landscape_design" value="landscape_design">
                                        <label for="landscape_design">
                                            <p>I am looking to have a landscape design done but I want to do the installation myself</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_action" id="tree_planted" value="tree_planted">
                                        <label for="tree_planted">
                                            <p>I am looking to have a tree(s) planted</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_action" id="trees_removed" value="trees_removed">
                                        <label for="trees_removed">
                                            <p>I have some large trees and shrubs I want removed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_action" id="yard_graded" value="yard_graded">
                                        <label for="yard_graded">
                                            <p>I need my yard graded and plants</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_action" id="edging_fixed" value="edging_fixed">
                                        <label for="edging_fixed">
                                            <p>I need my edging fixed</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="q1-right-side options">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="landscape_issue" id="downspouts_installed" value="downspouts_installed">
                                        <label for="downspouts_installed">
                                            <p>I need downspouts installed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_issue" id="drainage_addressed" value="drainage_addressed">
                                        <label for="drainage_addressed">
                                            <p>Drainage to be addressed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_issue" id="erosion_control" value="erosion_control">
                                        <label for="erosion_control">
                                            <p>Erosion control</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_issue" id="small_vermin" value="small_vermin">
                                        <label for="small_vermin">
                                            <p>Small vermin</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question25 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Hardscape</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="repair_issue" id="retaining_wall_repair" value="retaining_wall_repair">
                                    <label for="retaining_wall_repair">
                                        <p>I have a retaining wall falling over and I need it repaired</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="repair_issue" id="other_work_repair" value="other_work_repair">
                                    <label for="other_work_repair">
                                        <p>I had some work done by another company and I need it looked at/repaired</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="repair_issue" id="patio_reseal" value="patio_reseal">
                                    <label for="patio_reseal">
                                        <p>My patio needs to be re-sealed</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="repair_issue" id="patio_settling_repair" value="patio_settling_repair">
                                    <label for="patio_settling_repair">
                                        <p>My patio has had some settling and I need it repaired</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="repair_issue" id="fence_repair" value="fence_repair">
                                    <label for="fence_repair">
                                        <p>My fence needs to be repaired</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="repair_issue" id="deck_repair" value="deck_repair">
                                    <label for="deck_repair">
                                        <p>My deck needs to be repaired</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question26 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Plants</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="plant_issue" id="plants_replacement" value="plants_replacement">
                                    <label for="plants_replacement">
                                        <p>I had some plants die and need them replaced</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="topdress_type" id="mulch_topdress" value="mulch_topdress">
                                    <label for="mulch_topdress">
                                        <p>I am looking to topdress my garden beds with mulch</p>
                                        <span>(Specify the type here)</span>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="topdress_type" id="rock_topdress" value="rock_topdress">
                                    <label for="rock_topdress">
                                        <p>I am looking to topdress my garden beds with rock</p>
                                        <span>(Specify the type here)</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question27 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Lawn Care</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="lawn_maintenance" id="professional_maintenance" value="professional_maintenance">
                                    <label for="professional_maintenance">
                                        <p>I am looking to have my lawn professionally maintained</p>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question28 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Sod</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="lawn_issue" id="area_inspection" value="area_inspection">
                                    <label for="area_inspection">
                                        <p>Grass won’t grow in a certain area and I need it looked at</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="lawn_issue" id="new_sod" value="new_sod">
                                    <label for="new_sod">
                                        <p>I would like all new sod installed</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="lawn_issue" id="area_repair" value="area_repair">
                                    <label for="area_repair">
                                        <p>I need certain areas repaired</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="lawn_issue" id="reseeding" value="reseeding">
                                    <label for="reseeding">
                                        <p>I am interested in having my lawn reseeded</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="lawn_issue" id="artificial_turf" value="artificial_turf">
                                    <label for="artificial_turf">
                                        <p>I am interested in artificial turf and would like to know more about that</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question29 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Irrigation</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="irrigation_issue" id="install_irrigation" value="install_irrigation">
                                    <label for="install_irrigation">
                                        <p>I am looking to have irrigation installed for my landscape</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="irrigation_issue" id="leak_fix" value="leak_fix">
                                    <label for="leak_fix">
                                        <p>I have a leak and I need it fixed</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="irrigation_issue" id="head_check_replace" value="head_check_replace">
                                    <label for="head_check_replace">
                                        <p>I need the heads checked/replaced</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="irrigation_issue" id="water_issue" value="water_issue">
                                    <label for="water_issue">
                                        <p>Some of my plants are not getting water and I need it checked/fixed</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question30 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Lighting</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="light_issue" id="lights_not_working" value="lights_not_working">
                                    <label for="lights_not_working">
                                        <p>Some of my lights are not coming on and I need them checked/fixed</p>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question31 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Water Feature</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="water_feature" id="water_feature_maintenance" value="water_feature_maintenance">
                                    <label for="water_feature_maintenance">
                                        <p>I am looking to have my water feature maintained</p>
                                    </label>
                                </div>
                                <div class="choice">
                                    <input type="radio" name="water_feature" id="pump_issue" value="pump_issue">
                                    <label for="pump_issue">
                                        <p>I think my pump went out and I need it looked at</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="question32 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Maintenance</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="landscape_maintenance" id="landscape_professional" value="landscape_professional">
                                    <label for="landscape_professional">
                                        <p>I am looking to have my landscape professionally maintained</p>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="question33 question">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="question-heading-wrapper">
                                <h2>Other</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choices">
                                <div class="choice">
                                    <input type="radio" name="landscape_maintenance" id="landscape_professional" value="landscape_professional">
                                    <label for="landscape_professional">
                                        <p>I am looking to have my landscape professionally maintained</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="q_footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="backBtn">
                        <button class="back" id="backBtn">Back</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nextBtn">
                        <button class="next" id="nextBtn">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/scripts.php"); ?>

</body>

</html>
