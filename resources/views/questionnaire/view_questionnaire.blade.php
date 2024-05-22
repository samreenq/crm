@extends('questionnaire.layout')

<style>
    #after-submit {
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 18px;
        text-align: center;
        font-weight: 800;
        padding: 200px 100px;
    }
</style>

@section('body_container')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="banner">
        <span class="overlay"></span>
        <div class="container">
            <div class="heading-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">
                            Questionnaire
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="secion-qn-page">
        <section class="quizes-screen">
            <!-- <div class="header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 d-flex align-items-center justify-content-center">
                                <div class="logo-head">
                                    <img src="http://localhost/geace/assets/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="exitBtn">
                                    <button>Exit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            <div class="progressBar">
                <div class="progressBar-Wrapper">
                    <button class="css-91w14s-eC-category css-1gpo6gk-eC-current interactive" type="button"
                        onclick="firstButton()" id="firstpor">
                        <span class="eC-advancement">
                        </span>
                        <p class="categorylabel">
                            Client Information
                        </p>
                    </button>
                    <button class="css-91w14s-eC-category" type="button" onclick="secondButton()" id="secondpor">
                        <span class="garden" style="width: 0px;">
                        </span>
                        <p class="categorylabel">
                            Garden Bed and Design Installation Information
                        </p>
                    </button>
                    <button class="css-91w14s-eC-category" type="button" onclick="thirdButton()" id="thirdpor">
                        <span class="hardscape" id="hard" style="width: 0px;"></span>
                        <p class="categorylabel">
                            Hardscape and Design Installation Information
                        </p>
                    </button>
                    <button class="css-91w14s-eC-category" type="button" onclick="fourthButton()" id="fourthpor">
                        <span class="fourth" style="width: 0px;">
                        </span>
                        <p class="categorylabel">
                            Preferences and Goals
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
                                    <h2 id="Q-1">Client Information</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="choices">
                                    <input id="name" type="text" placeholder="Enter Name" class="answer1"
                                        oninput="checkFields()">
                                    <input id="address" type="text" placeholder="Enter Address" class="answer1"
                                        oninput="checkFields()">
                                    <input id="phone" type="text" placeholder="Enter Phone" class="answer1"
                                        oninput="checkFields()">
                                    <input id="email" type="text" placeholder="Enter Email" class="answer1"
                                        oninput="checkFields()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question2 question" id="client-info-first">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-2">best time of day to reach you? </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="time" class="answer2" id="morning" value="Mornings"
                                            hidden>
                                        <label for="morning">Mornings</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="time" class="answer2" id="afternoon"
                                            value="Afternoons" hidden>
                                        <label for="afternoon">Afternoons</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="time" class="answer2" id="evening"
                                            value="Evenings" hidden>
                                        <label for="evening">Evenings</label>
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
                                    <h2><span id="Q-3">How do you prefer to be contacted? </span><span>(Check all
                                            that
                                            apply)</span></h2>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="checkbox" name="contactMethod" data-name="Contact Method"
                                            id="phoneCall" value="Phone Call" hidden>
                                        <label for="phoneCall">Phone Call</label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="contactMethod" data-name="Contact Method"
                                            id="text" value="Text" hidden>
                                        <label for="text">Text</label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="contactMethod" data-name="Contact Method"
                                            id="mail" value="Mail" hidden>
                                        <label for="mail">email</label>
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
                                    <h2 id="Q-4">How did you hear about us? </h2>
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
                                        <input type="radio" name="source" id="socialMedia" value="social media"
                                            hidden>
                                        <label for="socialMedia">Social Media</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="source" id="driving"
                                            value="you saw us out and about driving" hidden>
                                        <label for="driving">You saw us out and about driving</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="source" id="neighbors"
                                            value="you saw us in at your neighbors or in the neighborhood" hidden>
                                        <label for="neighbors">You saw us in at your neighbors or in the
                                            neighborhood</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="source" id="business"
                                            value="I drove by your business and decided today was the day I am getting landscaping done!"
                                            hidden>
                                        <label for="business">I drove by your business and decided today was the day I am
                                            getting landscaping done!</label>
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
                                    <h2 id="Q-5">Will this landscape installation be for a</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">

                                    <div class="choice " id="house_i_own">
                                        <input type="radio" name="houseType" id="houseOwn" value="House I Own"
                                            hidden>
                                        <label for="houseOwn">House I Own</label>
                                    </div>
                                    <div class="choice" id="house_i_rent">
                                        <input type="radio" name="houseType" id="houseRent" value="House I Rent"
                                            hidden>
                                        <label for="houseRent">House I Rent</label>
                                    </div>
                                    <div class="choice" id="house_in_h">
                                        <input type="radio" name="houseType" id="houseHOA" value="House in HOA"
                                            hidden>
                                        <label for="houseHOA">House in HOA</label>

                                    </div>
                                    <div class="question6 sub_question" id="hoa">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="question-heading-wrapper">
                                                        <h2 id="Q-6">have you gotten hoa approval for landscape
                                                            renovations?</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="choices">
                                                        <div class="choice">
                                                            <input type="radio" name="status" id="yes"
                                                                value="Yes" hidden>
                                                            <label for="yes">Yes</label>
                                                        </div>
                                                        <div class="choice">
                                                            <input type="radio" name="status" id="no"
                                                                value="No" hidden>
                                                            <label for="no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question7 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-7">How soon do you want to get started?</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="userOption"
                                            value="I would like to get started right away" id="choice1_soon">
                                        <label for="choice1_soon">I would like to get started right away</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="userOption"
                                            value="I would like to know the starting time frame" id="choice1_timeframe">
                                        <label for="choice1_timeframe">I would like to know the starting time frame</label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="userOption"
                                            value="I am a planner and I don't need to get started right away"
                                            id="choice1_planner">
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
                <div class="question8 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-8">Are you Interested in getting any garden bed installation ?</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="Choice" value="yes" id="choice1_yes">
                                        <label for="choice1_yes">Yes</label>
                                    </div>
                                    <div class="choice" id="deny1">
                                        <input type="radio" name="Choice" value="no" id="choice1_no">
                                        <label for="choice1_no">No</label>
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
                                    <h2 id="Q-9">What areas would you like done?</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Front yard( Adding onto existing garden bed )"
                                                id="yard_front_existing">
                                            <label for="yard_front_existing">
                                                <p>Front yard</p>
                                                <span>Adding onto existing garden bed</span>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Front yard ( would like to do something completely new )"
                                                id="yard_front_new">
                                            <label for="yard_front_new">
                                                <p>Front yard</p>
                                                <span>would like to do something completely new</span>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Backyard ( Adding onto existing garden bed )"
                                                id="yard_back_existing">
                                            <label for="yard_back_existing">
                                                <p>Backyard</p>
                                                <span>Adding onto existing garden bed</span>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Backyard ( would like to do something completely new )"
                                                id="yard_back_new">
                                            <label for="yard_back_new">
                                                <p>Backyard</p>
                                                <span>would like to do something completely new</span>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Side yard ( Adding onto existing garden bed )"
                                                id="yard_side_existing">
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
                                            <input type="radio" name="yard_choice"
                                                value="Would like to add onto existing garden bed in both front and backyard"
                                                id="landscape_existing_bed">
                                            <label for="landscape_existing_bed">
                                                <p>Would like to add onto existing garden bed in both front and backyard</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Would like a completely new landscape design for both the front and
                                        backyard"
                                                id="landscape_new_design">
                                            <label for="landscape_new_design">
                                                <p>Would like a completely new landscape design for both the front and
                                                    backyard</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Would like a brand new landscape design done for my entire yard"
                                                id="landscape_entire_yard">
                                            <label for="landscape_entire_yard">
                                                <p>Would like a brand new landscape design done for my entire yard</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="yard_choice"
                                                value="Side yard would like to do something completely new"
                                                id="landscape_entire_new">
                                            <label for="landscape_entire_new">
                                                <p>Side yard would like to do something completely new</p>
                                            </label>
                                        </div>
                                        <div class="choice" id="landother">
                                            <input type="radio" name="yard_choice" value="other"
                                                id="landscape_other">
                                            <label for="landscape_other">
                                                <p>Other - Please specify</p>
                                            </label>
                                            <input type="text" id="q-9-other">
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
                                    <h2><span id="Q-10">Design style </span> <span> (click on all that apply)</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style"
                                                value="Formal (linear or curvature)" id="garden_formal">
                                            <label for="garden_formal">
                                                <p>Formal (linear or curvature)</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="Modern"
                                                id="garden_modern">
                                            <label for="garden_modern">
                                                <p>Modern</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="English"
                                                id="garden_english">
                                            <label for="garden_english">
                                                <p>English</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="Japanese"
                                                id="garden_japanese">
                                            <label for="garden_japanese">
                                                <p>Japanese</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="Mediterranean"
                                                id="garden_mediterranean">
                                            <label for="garden_mediterranean">
                                                <p>Mediterranean</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="French"
                                                id="garden_french">
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
                                            <input type="checkbox" name="garden_style" value="Xeriscaping"
                                                id="garden_xeriscaping">
                                            <label for="garden_xeriscaping">
                                                <p>Xeriscaping</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="Cottage"
                                                id="garden_cottage">
                                            <label for="garden_cottage">
                                                <p>Cottage</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="Tropical"
                                                id="garden_tropical">
                                            <label for="garden_tropical">
                                                <p>Tropical</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style" value="Desert"
                                                id="garden_desert">
                                            <label for="garden_desert">
                                                <p>Desert</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_style"
                                                value="No style, just simple and to spruce things up" id="garden_simple">
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
                <div class="question11 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2><span id="Q-11">Garden Bed </span> <span> (Check all that apply)</span></h2>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals"
                                                value="I want to attract pollinators, birds, wildlife"
                                                id="goal_attract_pollinators">
                                            <label for="goal_attract_pollinators">
                                                <p>I want to attract pollinators, birds, wildlife</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals"
                                                value="I would like to incorporate or use all native"
                                                id="goal_incorporate_natives">
                                            <label for="goal_incorporate_natives">
                                                <p>I would like to incorporate or use all natives</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals"
                                                value="I'm allergic to bees and need to be selective on plants used"
                                                id="goal_selective_plants">
                                            <label for="goal_selective_plants">
                                                <p>I’m allergic to bees and need to be selective on plants used</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals" value="I have bad allergies"
                                                id="goal_bad_allergies">
                                            <label for="goal_bad_allergies">
                                                <p>I have bad allergies</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals"
                                                value="I want something beautiful year round" id="goal_year_round_beauty">
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
                                            <input type="checkbox" name="garden_goals"
                                                value="I want easy low maintenance" id="preference_low_maintenance">
                                            <label for="preference_low_maintenance">
                                                <p>I want easy low maintenance</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals"
                                                value="I would like to block certain views" id="preference_block_views">
                                            <label for="preference_block_views">
                                                <p>I would like to block certain views</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals" value="I am interested in a hedge"
                                                id="preference_hedge">
                                            <label for="preference_hedge">
                                                <p>I am interested in a hedge</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_goals"
                                                value="would like to see the designer use their creativity and create something
                                        unique just for me"
                                                id="preference_unique_design">
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
                <div class="question12 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2> <span id="Q-12">Additional features </span> <span> (Check all that
                                            apply)</span></h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Water feature"
                                                id="feature_water">
                                            <label for="feature_water">
                                                <p>Water feature</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Dry stream bed"
                                                id="feature_dry_stream">
                                            <label for="feature_dry_stream">
                                                <p>Dry stream bed</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Boulder accents"
                                                id="feature_boulders">
                                            <label for="feature_boulders">
                                                <p>Boulder accents</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Lighting"
                                                id="feature_lighting">
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
                                            <input type="checkbox" name="garden_features" value="Irrigation"
                                                id="feature_irrigation">
                                            <label for="feature_irrigation">
                                                <p>Irrigation</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Stairs"
                                                id="feature_stairs">
                                            <label for="feature_stairs">
                                                <p>Stairs</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Pathways"
                                                id="feature_pathways">
                                            <label for="feature_pathways">
                                                <p>Pathways</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="garden_features" value="Sound systems"
                                                id="feature_sound_systems">
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
                <div class="question13 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2> <span id="Q-13">Blooming Colors I want </span> <span>(Check all that apply
                                            )</span> </h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="White" id="color_white">
                                            <label for="color_white">
                                                <p>White</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Yellow" id="color_yellow">
                                            <label for="color_yellow">
                                                <p>Yellow</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Orange" id="color_orange">
                                            <label for="color_orange">
                                                <p>Orange</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Red" id="color_red">
                                            <label for="color_red">
                                                <p>Red</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Purple" id="color_purple">
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
                                            <input type="checkbox" name="flower_color" value="Pink" id="color_pink">
                                            <label for="color_pink">
                                                <p>Pink</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Blue" id="color_blue">
                                            <label for="color_blue">
                                                <p>Blue</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Green" id="color_green">
                                            <label for="color_green">
                                                <p>Green</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="flower_color" value="Black" id="color_black">
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
                <div class="question14 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2><span id="Q-14">Leaf Colors I want </span> <span> (Check all that
                                            apply)</span></h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Light Green"
                                                id="color_light_green">
                                            <label for="color_light_green">
                                                <p>Light Green</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Green" id="color_greeen">
                                            <label for="color_greeen">
                                                <p>Green</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Lime Green"
                                                id="color_lime_green">
                                            <label for="color_lime_green">
                                                <p>Lime Green</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Dark Green"
                                                id="color_dark_green">
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
                                            <input type="checkbox" name="leaf_color" value="Variegated green and white"
                                                id="pattern_variegated_green_white">
                                            <label for="pattern_variegated_green_white">
                                                <p>Variegated green and white</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Variegated green and yellow"
                                                id="pattern_variegated_green_yellow">
                                            <label for="pattern_variegated_green_yellow">
                                                <p>Variegated green and yellow</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Blue" id="pattern_blue">
                                            <label for="pattern_blue">
                                                <p>Blue</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="leaf_color" value="Mixture of All"
                                                id="pattern_mixture_all">
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
                <div class="question15 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2><span id="Q-15">Top dressing </span><span> (check all that apply)</span> </h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="checkbox" name="ground_cover"
                                            value="Mulch (There are many different types of mulches that can be further discussed with your designer)"
                                            id="cover_mulch">
                                        <label for="cover_mulch">
                                            <p>Mulch</p>
                                            <span>(There are many different types of mulches that can be further discussed
                                                with
                                                your designer)</span>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="ground_cover"
                                            value="Rock (There are many different types of rocks that can be further discussed with your designer)"
                                            id="cover_rock">
                                        <label for="cover_rock">
                                            <p>Rock</p>
                                            <span>(There are many different types of rocks that can be further discussed
                                                with
                                                your designer)</span>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="ground_cover" value="Nothing" id="cover_nothing">
                                        <label for="cover_nothing">
                                            <p>Nothing</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="ground_cover" value="Unsure, but I am open to ideas"
                                            id="cover_unsure">
                                        <label for="cover_unsure">
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
                                    <h2><span id="Q-16">Edging </span> <span> (check all that apply)</span></h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="checkbox" name="edging" value="Natural Lip Edging"
                                            id="edging_natural_lip">
                                        <label for="edging_natural_lip">
                                            <p>Natural Lip Edging</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="edging" value="Vinyl (Plastic)" id="edging_vinyl">
                                        <label for="edging_vinyl">
                                            <p>Vinyl (Plastic)</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="edging" value="Steel Edging" id="edging_steel">
                                        <label for="edging_steel">
                                            <p>Steel Edging</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="edging" value="Concrete Bullet Pavers"
                                            id="edging_concrete_pavers">
                                        <label for="edging_concrete_pavers">
                                            <p>Concrete Bullet Pavers</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="edging" value="Natural Stone"
                                            id="edging_natural_stone">
                                        <label for="edging_natural_stone">
                                            <p>Natural Stone</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="edging" value="Unsure, but I am open to ideas"
                                            id="edging_unsure">
                                        <label for="edging_unsure">
                                            <p>Unsure, but I am open to ideas</p>
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
                                    <h2> <span id="Q-17">We want to make sure we are thinking of everyone. Do you have
                                            ?</span> <span>( check all that apply)</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="checkbox" name="kids" value="Kids" id="kids_yes">
                                        <label for="kids_yes">
                                            <p> Kids</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="kids" value="Grandkids" id="kids_grandkids">
                                        <label for="kids_grandkids">
                                            <p>Grandkids</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="kids" value="Nieces/Nephews"
                                            id="kids_nieces_nephews">
                                        <label for="kids_nieces_nephews">
                                            <p>Nieces/Nephews</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="kids" value="No" id="kids_doesnt_apply">
                                        <label for="kids_doesnt_apply">
                                            <p>Doesn't Apply</p>
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
                                    <h2 id="Q-18">Do you have pets we should take into consideration?</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="choice" value="Yes" id="yes_no_yes">
                                        <label for="yes_no_yes">
                                            <p>Yes</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="choice" value="No" id="yes_no_no">
                                        <label for="yes_no_no">
                                            <p>No</p>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="question19 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-19">What is your planting budget?</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="radio" name="budget" value="I'm not sure"
                                                id="budget_not_sure">
                                            <label for="budget_not_sure">
                                                <p>I’m not sure</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$1,000-$5,000"
                                                id="budget_1000_5000">
                                            <label for="budget_1000_5000">
                                                <p>$1,000-$5,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$5,000-$10,000"
                                                id="budget_5000_10000">
                                            <label for="budget_5000_10000">
                                                <p>$5,000-$10,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$10,000-$20,000"
                                                id="budget_10000_20000">
                                            <label for="budget_10000_20000">
                                                <p>$10,000-$20,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$20,000-$50,000"
                                                id="budget_20000_50000">
                                            <label for="budget_20000_50000">
                                                <p>$20,000-$50,000</p>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-right-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$50,000-$100,000"
                                                id="budget_50000_100000">
                                            <label for="budget_50000_100000">
                                                <p>$50,000-$100,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$100,000-$200,000"
                                                id="budget_100000_200000">
                                            <label for="budget_100000_200000">
                                                <p>$100,000-$200,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$200,000-$300,000"
                                                id="budget_200000_300000">
                                            <label for="budget_200000_300000">
                                                <p>$200,000-$300,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="Endless budget I want it all!"
                                                id="budget_endless">
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
                <div class="question20 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-20">Are you interested in getting any hardscapes installed?</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="choice" value="Yes" id="kiids_yes">
                                        <label for="kiids_yes">
                                            <p>Yes</p>
                                        </label>
                                    </div>
                                    <div class="choice" id="deny2">
                                        <input type="radio" name="choice" value="No" id="kids_no">
                                        <label for="kids_no">
                                            <p>No</p>
                                        </label>
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
                                    <h2> <span id="Q-21"> What type of hardscapes are you wanting installed?
                                        </span><span>(Check all that apply)</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Deck" data-id="deck"
                                                id="Deck">
                                            <label for="Deck">
                                                <p>Deck</p>
                                            </label>
                                            <div class="radiobtn p-2 deck">
                                                <div class="checkbx">
                                                    <input type="checkbox" name="demo" id=""
                                                        value="Existing deck to demo">
                                                    <label for="new">Existing deck to demo</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="add" id=""
                                                        value="Existing deck to add onto">
                                                    <label for="new">Existing deck to add onto</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="new" id=""
                                                        value="Brand new deck">
                                                    <label for="new">Brand new deck</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Patio and Hardscapes"
                                                data-id="patio_and_hardscapes" id="Patio">
                                            <label for="Patio">
                                                <p>Patio and Hardscapes </p>
                                            </label>
                                            <div class="radiobtn p-2 patio_and_hardscapes ">
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Existing patio to demo">
                                                    <label for="">Existing patio to demo</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Existing patio to add onto">
                                                    <label for="">Existing patio to add onto</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Brand new patio">
                                                    <label for="">Brand new patio</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id="" value="Pool">
                                                    <label for="">Pool</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Outdoor Kitchen">
                                                    <label for="">Outdoor Kitchen</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Fire Place">
                                                    <label for="">Fire Place</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Fire Pit">
                                                    <label for="">Fire Pit</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Seat Wall">
                                                    <label for="">Seat Wall</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Patio" id=""
                                                        value="Retaining Wall">
                                                    <label for="">Retaining Wall </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="choice">
                                            <input type="radio" name="hardscapes" value="Covered structure"
                                                data-id="covered_structure" id="Covered">
                                            <label for="Covered">
                                                <p>Covered structure</p>
                                            </label>
                                            <div class="radiobtn p-2 covered_structure">
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Pergola"
                                                        value="Pergola">
                                                    <label for="Pergola">Pergola</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Pavillion"
                                                        value="Pavillion">
                                                    <label for="Pavillion">Pavillion</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Cover"
                                                        value="Patio Cover">
                                                    <label for="Cover">Patio Cover</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Gazebo"
                                                        value="Gazebo">
                                                    <label for="Gazebo">Gazebo</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="House"
                                                        value="Pool House">
                                                    <label for="House">Pool House</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Greenhouse"
                                                        value="Greenhouse">
                                                    <label for="Greenhouse">Greenhouse</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Arbor"
                                                        value="Arbor">
                                                    <label for="Arbor">Arbor</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Trellis"
                                                        value="Trellis">
                                                    <label for="Trellis">Trellis</label>

                                                </div>
                                            </div>

                                        </div> --}}
                                        {{-- <div class="choice">
                                            <input type="radio" name="hardscapes" value="Pool" id="Pool">
                                            <label for="Pool">
                                                <p>Pool</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Outdoor kitchens"
                                                id="Outdoor">
                                            <label for="Outdoor">
                                                <p>Outdoor kitchens</p>
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-right-side options">
                                    <div class="choices">
                                        {{-- <div class="choice">
                                            <input type="radio" name="hardscapes" value="Fire place"
                                                id="Fireplace">
                                            <label for="Fireplace">
                                                <p>Fire place</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Fire pit" id="Firepit">
                                            <label for="Firepit">
                                                <p>Fire pit</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Seat Wall"
                                                id="SeatWall">
                                            <label for="SeatWall">
                                                <p>Seat Wall</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Retaining Wall"
                                                id="RetainingWall">
                                            <label for="RetainingWall">
                                                <p>Retaining Wall</p>
                                            </label>
                                        </div> --}}
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Covered structure"
                                                data-id="covered_structure" id="Covered">
                                            <label for="Covered">
                                                <p>Covered structure</p>
                                            </label>
                                            <div class="radiobtn p-2 covered_structure">
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Pergola"
                                                        value="Pergola">
                                                    <label for="Pergola">Pergola</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Pavillion"
                                                        value="Pavillion">
                                                    <label for="Pavillion">Pavillion</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Cover"
                                                        value="Patio Cover">
                                                    <label for="Cover">Patio Cover</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Gazebo"
                                                        value="Gazebo">
                                                    <label for="Gazebo">Gazebo</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="House"
                                                        value="Pool House">
                                                    <label for="House">Pool House</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Greenhouse"
                                                        value="Greenhouse">
                                                    <label for="Greenhouse">Greenhouse</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Arbor"
                                                        value="Arbor">
                                                    <label for="Arbor">Arbor</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="Covered" id="Trellis"
                                                        value="Trellis">
                                                    <label for="Trellis">Trellis</label>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="hardscapes" value="Fencing"
                                                data-id="fencing" id="Fencing">
                                            <label for="Fencing">
                                                <p>Fencing</p>
                                            </label>
                                            <div class="radiobtn p-2 fencing">
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Wood">
                                                    <label for="">Wood</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Composite">
                                                    <label for="">Composite</label>
                                                </div>
                                                <div class="checkbx">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Chainlink">
                                                    <label for="">Chainlink</label>
                                                </div>
                                                <div class="checkbx ">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Iron">
                                                    <label for="">Iron</label>
                                                </div>
                                                <div class="checkbx">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Metal">
                                                    <label for="">Metal</label>
                                                </div>
                                                <div class="checkbx">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Vinyl">
                                                    <label for="">Vinyl </label>
                                                </div>
                                                <div class="checkbx">
                                                    <input type="checkbox" name="fencing" id=""
                                                        value="Aluminum">
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
                <div class="question22 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2> <span id="Q-22">Additional features </span> <span> (Check all that
                                            apply)</span></h2>
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
                                            <input type="checkbox" name="features" value="Water feature"
                                                id="water_feature">
                                            <label for="water_feature">
                                                <p>Water feature</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="features" value="Dry stream bed"
                                                id="dry_stream_bed">
                                            <label for="dry_stream_bed">
                                                <p>Dry stream bed</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="features" value="Boulder accents"
                                                id="boulder_accents">
                                            <label for="boulder_accents">
                                                <p>Boulder accents</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="features" value="Lighting" id="lighting">
                                            <label for="lighting">
                                                <p>Lighting</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="features"
                                                value="I already selected these features in garden bed section"
                                                id="alredy_chk">
                                            <label for="alredy_chk">
                                                <p>I already selected these features in garden bed section</p>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-right-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="features" value="Stairs" id="stairs">
                                            <label for="stairs">
                                                <p>Stairs</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="features" value="Pathways" id="pathways">
                                            <label for="pathways">
                                                <p>Pathways</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="features" value="Sound systems"
                                                id="sound_systems">
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
                <div class="question23 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-23">What is your hardscape budget?</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="radio" name="budget" value="I'm not sure"
                                                id="not_sure">
                                            <label for="not_sure">
                                                <p>I'm not sure</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$5,000-$10,000"
                                                id="5000_10000">
                                            <label for="5000_10000">
                                                <p>$5,000-$10,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$10,000-$20,000"
                                                id="10000_20000">
                                            <label for="10000_20000">
                                                <p>$10,000-$20,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$20,000-$50,000"
                                                id="20000_50000">
                                            <label for="20000_50000">
                                                <p>$20,000-$50,000</p>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-right-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$50,000-$100,000"
                                                id="50000_100000">
                                            <label for="50000_100000">
                                                <p>$50,000-$100,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$100,000-$200,000"
                                                id="100000_200000">
                                            <label for="100000_200000">
                                                <p>$100,000-$200,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget" value="$200,000-$300,000"
                                                id="200000_300000">
                                            <label for="200000_300000">
                                                <p>$200,000-$300,000</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="radio" name="budget"
                                                value="Endless budget, I want it all!" id="endless">
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
                <div class="question24 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-24">Are you interested in getting some miscellaneous landscape work?
                                        </h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="answer" value="Yes" id="answer_yes">
                                        <label for="answer_yes">
                                            <p>Yes</p>
                                        </label>
                                    </div>
                                    <div class="choice" id="deny3">
                                        <input type="radio" name="answer" value="No" id="answer_no">
                                        <label for="answer_no">
                                            <p>No</p>
                                        </label>
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
                                    <h2><span id="Q-25">Landscape</span> <span>(check all that apply)</span></h2>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="q1-left-side options">
                                    <div class="choices">
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="landscape_design"
                                                value="I am looking to have a landscape design done but I want to do the installation myself">
                                            <label for="landscape_design">
                                                <p>I am looking to have a landscape design done but I want to do the
                                                    installation myself</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="tree_planted"
                                                value="I am looking to have a tree(s) planted">
                                            <label for="tree_planted">
                                                <p>I am looking to have a tree(s) planted</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="trees_removed"
                                                value="I have some large trees and shrubs I want removed">
                                            <label for="trees_removed">
                                                <p>I have some large trees and shrubs I want removed</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="yard_graded"
                                                value="I need my yard graded and plants">
                                            <label for="yard_graded">
                                                <p>I need my yard graded and plants</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="edging_fixed"
                                                value="I need my edging fixed">
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
                                            <input type="checkbox" name="landscape_action" id="downspouts_installed"
                                                value="I need downspouts installed">
                                            <label for="downspouts_installed">
                                                <p>I need downspouts installed</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="drainage_addressed"
                                                value="Drainage to be addressed">
                                            <label for="drainage_addressed">
                                                <p>Drainage to be addressed</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="erosion_control"
                                                value="Erosion control">
                                            <label for="erosion_control">
                                                <p>Erosion control</p>
                                            </label>
                                        </div>
                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="small_vermin"
                                                value="Small vermin">
                                            <label for="small_vermin">
                                                <p>Small vermin</p>
                                            </label>
                                        </div>

                                        <div class="choice">
                                            <input type="checkbox" name="landscape_action" id="Not_at_this_time"
                                                value="Not at this time">
                                            <label for="Not_at_this_time">
                                                <p>Not at this time</p>
                                            </label>
                                        </div>
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
                                    <h2> <span id="Q-26">Hardscape</span> <span>(check all that apply)</span></h2>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="checkbox" name="repair_issue" id="retaining_wall_repair"
                                            value="I have a retaining wall falling over and I need it repaired">
                                        <label for="retaining_wall_repair">
                                            <p>I have a retaining wall falling over and I need it repaired</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="repair_issue" id="other_work_repair"
                                            value="I had some work done by another company and I need it looked at/repaired">
                                        <label for="other_work_repair">
                                            <p>I had some work done by another company and I need it looked at/repaired</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="repair_issue" id="patio_reseal"
                                            value="My patio needs to be re-sealed">
                                        <label for="patio_reseal">
                                            <p>My patio needs to be re-sealed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="repair_issue" id="patio_settling_repair"
                                            value="My patio has had some settling and I need it repaired">
                                        <label for="patio_settling_repair">
                                            <p>My patio has had some settling and I need it repaired</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="repair_issue" id="fence_repair"
                                            value="My fence needs to be repaired">
                                        <label for="fence_repair">
                                            <p>My fence needs to be repaired</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="checkbox" name="repair_issue" id="deck_repair"
                                            value="My deck needs to be repaired">
                                        <label for="deck_repair">
                                            <p>My deck needs to be repaired</p>
                                        </label>
                                    </div>

                                    <div class="choice">
                                        <input type="checkbox" name="landscape_action" id="says_Not_at_this_time"
                                            value="Not at this time">
                                        <label for="says_Not_at_this_time">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-27">Plants</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice" id="mulchplantinp3">
                                        <input type="radio" name="plant_issue" id="plants_replacement"
                                            value="I had some plants die and need them replaced" data-id="27-a">
                                        <label for="plants_replacement">
                                            <p>I had some plants die and need them replaced</p>
                                        </label>
                                    </div>
                                    <div class="choice" id="mulchplantinp">
                                        <input type="radio" name="plant_issue" id="mulch_topdress" data-id="27-b"
                                            value="I am looking to topdress my garden beds with mulch">
                                        <label for="mulch_topdress">
                                            <p>I am looking to topdress my garden beds with mulch</p>
                                            <span>(Specify the type here)</span>
                                        </label>
                                        <input type="text" id="mulchinp" class="27-b">
                                    </div>
                                    <div class="choice" id="mulchplantinp2">
                                        <input type="radio" name="plant_issue" id="rock_topdress" data-id="27-c"
                                            value="I am looking to topdress my garden beds with rock">
                                        <label for="rock_topdress">
                                            <p>I am looking to topdress my garden beds with rock</p>
                                            <span>(Specify the type here)</span>
                                            <input type="text" id="mulchinp2" class="27-c">
                                        </label>
                                    </div>


                                    <div class="choice" id="mulchplantinp4">
                                        <input type="radio" name="plant_issue" id="not_topdress" data-id="27-d"
                                            value="Not at this time">
                                        <label for="not_topdress">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-28">Lawn Care</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="lawn_maintenance" id="professional_maintenance"
                                            value="I am looking to have my lawn professionally maintained">
                                        <label for="professional_maintenance">
                                            <p>I am looking to have my lawn professionally maintained</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="lawn_maintenance"
                                            id="not_professional_maintenance" value="Not at this time">
                                        <label for="not_professional_maintenance">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-29">Sod</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="lawn_issue" id="area_inspection"
                                            value="Grass won't grow in a certain area and I need it looked at">
                                        <label for="area_inspection">
                                            <p>Grass won't grow in a certain area and I need it looked at</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="lawn_issue" id="new_sod"
                                            value="I would like all new sod installed">
                                        <label for="new_sod">
                                            <p>I would like all new sod installed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="lawn_issue" id="area_repair"
                                            value="I need certain areas repaired">
                                        <label for="area_repair">
                                            <p>I need certain areas repaired</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="lawn_issue" id="reseeding"
                                            value="I am interested in having my lawn reseeded">
                                        <label for="reseeding">
                                            <p>I am interested in having my lawn reseeded</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="lawn_issue" id="artificial_turf"
                                            value="I am interested in artificial turf and would like to know more about that">
                                        <label for="artificial_turf">
                                            <p>I am interested in artificial turf and would like to know more about that</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="lawn_issue" id="not_artificial_turf"
                                            value="Not at this time">
                                        <label for="not_artificial_turf">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-30">Irrigation</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="irrigation_issue" id="install_irrigation"
                                            value="I am looking to have irrigation installed for my landscape">
                                        <label for="install_irrigation">
                                            <p>I am looking to have irrigation installed for my landscape</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="irrigation_issue" id="leak_fix"
                                            value="I have a leak and I need it fixed">
                                        <label for="leak_fix">
                                            <p>I have a leak and I need it fixed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="irrigation_issue" id="head_check_replace"
                                            value="I need the heads checked/replaced">
                                        <label for="head_check_replace">
                                            <p>I need the heads checked/replaced</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="irrigation_issue" id="water_issue"
                                            value="Some of my plants are not getting water and I need it checked/fixed<">
                                        <label for="water_issue">
                                            <p>Some of my plants are not getting water and I need it checked/fixed</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="irrigation_issue" id="not_water_issue"
                                            value="Not at this time">
                                        <label for="not_water_issue">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-31">Lighting</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="light_issue" id="lights_need_checked"
                                            value="Some of my lights are not coming on and I need them checked/fixed">
                                        <label for="lights_need_checked">
                                            <p>Some of my lights are not coming on and I need them checked/fixed</p>
                                        </label>

                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="light_issue" id="lights_need_rep"
                                            value="One of my lights broke and I need it replaced">
                                        <label for="lights_need_rep">
                                            <p>One of my lights broke and I need it replaced</p>
                                        </label>

                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="light_issue" id="lights_not_working"
                                            value="Not at this time">
                                        <label for="lights_not_working">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-32">Water Feature</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="water_feature" id="water_feature_maintenance"
                                            value="I am looking to have my water feature maintained">
                                        <label for="water_feature_maintenance">
                                            <p>I am looking to have my water feature maintained</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="water_feature" id="water_feature_li8"
                                            value="My water feature needs some repairs and looked at">
                                        <label for="water_feature_li8">
                                            <p>My water feature needs some repairs and looked at</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="water_feature" id="pump_issue"
                                            value="I think my pump went out and I need it looked at">
                                        <label for="pump_issue">
                                            <p>I think my pump went out and I need it looked at</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="water_feature" id="not_pump_issue"
                                            value="Not at this time">
                                        <label for="not_pump_issue">
                                            <p>Not at this time</p>
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
                                    <h2 id="Q-33">Maintenance</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="landscape_maintenance1" id="landscape_professional"
                                            value="I am looking to have my landscape professionally maintained">
                                        <label for="landscape_professional">
                                            <p>I am looking to have my landscape professionally maintained</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_maintenance1"
                                            id="landscape_professional_clean"
                                            value="I am looking for a one time maintenance clean-up">
                                        <label for="landscape_professional_clean">
                                            <p>I am looking for a one time maintenance clean-up</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="landscape_maintenance1"
                                            id="not_landscape_professional" value="Not at this time">
                                        <label for="not_landscape_professional">
                                            <p>Not at this time</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question34 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2 id="Q-34">Other</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    {{-- <div class="choice">
                                        <input type="radio" name="landscape_maintenance" id="Other"
                                            value="I am looking to have my landscape professionally maintained">
                                        <label for="Other">
                                            <p>I am looking to have my landscape professionally maintained</p>
                                        </label>
                                    </div> --}}
                                    <div class="choice" id="otherspecs">
                                        <input type="radio" name="landscape_maintenance" id="Other-specify"
                                            data-id="Other-specify1" value="specify the work">
                                        <label for="Other-specify">
                                            <p> Specify any additional work not yet mentioned</p>
                                            <input type="text" id="otherspecsinp" class="Other-specify1">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="questionaireCode" value="{{ $code }}" />
                <div class="question35 question">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="question-heading-wrapper">
                                    <h2>Thank you for taking our client questionnaire. With the information you provided we
                                        will
                                        pair you with a designer that best fits your needs. We look forward to getting into
                                        contact with you. If you are all finished click confirm</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="choices">
                                    <div class="choice">
                                        <input type="radio" name="enjoyed" id="enjoyed_yes" value="yes">
                                        <label for="enjoyed_yes">
                                            <p>Yes</p>
                                        </label>
                                    </div>
                                    <div class="choice">
                                        <input type="radio" name="enjoyed" id="enjoyed_no" value="no">
                                        <label for="enjoyed_no">
                                            <p>No</p>
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
                            <button class="back " id="backBtn">Back</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nextBtn">
                            <button class="next nextButton" id="nextBtn" data-submit="false">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
