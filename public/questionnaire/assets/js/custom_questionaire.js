$(document).ready(function() {


    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");
    
    $('[href="#"]').attr("href", "javascript:;");
    $('.menu-Bar').click(function() {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
        $('body').toggleClass('overflw');
    });

    $('.index-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
            breakpoint: 825,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
                arrows:false
            }
        },
        ]
    });

    $('.test').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 825,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
                arrows:false
                }
            },
        ]
    });

   function myFunction() {
  var x = document.getElementById("myVideo").autoplay;
  document.getElementById("demo").innerHTML = x;
}

    // $('.faqAccordian>li.first').addClass('active');
    $('.faqAccordian>li').click(function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });

    $('.fancybox-media').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            media: {}
        }
    });

    $('.searchBtn').click(function() {
        $('.searchWrap').addClass('active');
        $('.overlay').fadeIn('active');
        $('.searchWrap input').focus();
        $('.searchWrap input').focusout(function(e) {
            $(this).parents().removeClass('active');
            $('.overlay').fadeOut('active');
            $('body').removeClass('ovr-hiddn');

        });
    });
    //$('#soundbtn').click();
    

});

 
 // function disableMute() 
 // { 
 //    vid.muted = false;
 // }  




$(window).on('load', function() {
    var currentUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
    $('ul.menu li a').each(function() {
        var hrefVal = $(this).attr('href');
        if (hrefVal == currentUrl) {
            $(this).removeClass('active');
            $(this).closest('li').addClass('active')
            $('ul.menu li.first').removeClass('active');
             
        }
    });
    
});

const questions = document.getElementsByClassName("question");
const backBtn = document.getElementById("backBtn");
const nextBtn = document.getElementById("nextBtn");
let currentQuestionIndex = 0;

// Initial state
questions[currentQuestionIndex].style.display = "block";
backBtn.disabled = true;
nextBtn.disabled = true;
const totalQuestions = questions.length;

function checkFields() {
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;

    if (name !== '' && address !== '' && phone !== '' && email !== '') {
        nextBtn.disabled = false;
    } else {
        nextBtn.disabled = true;
    }
}

// Event listener for the next button
nextBtn.addEventListener("click", function() {

    
    const currentQuestion = document.querySelector(".question[style='display: block;']");
    const currentQuestionIndex = Array.from(questions).indexOf(currentQuestion);

    if (currentQuestionIndex === 0) {
        checkFields(); // Check fields when current index is 0

        if (currentQuestionIndex < questions.length - 1) {
            // Show next question
            currentQuestion.style.display = "none";
            questions[currentQuestionIndex + 1].style.display = "block";
            backBtn.disabled = false;
            nextBtn.disabled = true;
            checkFields();
        }
        if (nextBtn.disabled) {
            return; // Do not proceed if fields are not filled
        }
    }
    var mainArray=saveQuestionaire();
    if (currentQuestionIndex === totalQuestions - 1) {
        nextBtn.innerHTML = "Please Wait..";
        nextBtn.disabled = true;
        submitQuestionaire(mainArray);
      
    }

    if (currentQuestionIndex === totalQuestions - 2) {
        nextBtn.innerHTML = "Confirm";
        nextBtn.setAttribute('data-submit', "true");
    }
    if (currentQuestionIndex < questions.length - 1 && isChoiceSelected()) {
        // Show next question
        currentQuestion.style.display = "none";
        questions[currentQuestionIndex + 1].style.display = "block";
        backBtn.disabled = false;
        nextBtn.disabled = true;
    }
    nextBtn.disabled = !isChoiceSelected(currentQuestion);
});

// Event listener for the back button
backBtn.addEventListener("click", function() {
    const currentQuestion = document.querySelector(".question[style='display: block;']");
    const currentQuestionIndex = Array.from(questions).indexOf(currentQuestion);

    if (currentQuestionIndex > 0) {
        currentQuestion.style.display = "none";
        questions[currentQuestionIndex - 1].style.display = "block";
        backBtn.disabled = currentQuestionIndex - 1 === 0;

        // Check if a choice is selected and enable the next button
        const selectedChoice = questions[currentQuestionIndex - 1].querySelector('.choice input:checked');
        nextBtn.disabled = selectedChoice === null;
        nextBtn.innerHTML="Next";
        nextBtn.setAttribute('data-submit', "false");

    }

    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    nextBtn.disabled = name === '' || address === '' || phone === '' || email === '';
});

// Function to check if a choice is selected
function isChoiceSelected() {
    const currentQuestion = document.querySelector(".question[style='display: block;']");
    const selectedRadio = currentQuestion.querySelector('.choice input[type="radio"]:checked');
    const selectedCheckboxes = currentQuestion.querySelectorAll('.choice input[type="checkbox"]:checked');

    return (selectedRadio !== null && selectedCheckboxes.length === 0) || (selectedRadio === null && selectedCheckboxes.length > 0) || (selectedRadio === !null || selectedCheckboxes.length > 0);
}

// Event listener for choices
const selectInputs = document.querySelectorAll('.choice input[type="checkbox"], .choice input[type="radio"]');
selectInputs.forEach(function(input) {
    input.addEventListener('change', function() {
        const parentDiv = input.parentNode;
        const isCheckbox = input.type === 'checkbox';

        if (isCheckbox) {
            // Toggle the 'clicked' class for the parent div
            parentDiv.classList.toggle('clicked', input.checked);
        } else {
            // Remove 'clicked' class from other radio buttons in the group
            const radioGroup = document.getElementsByName(input.name);
            radioGroup.forEach(function(radio) {
                const radioParentDiv = radio.parentNode;
                radioParentDiv.classList.remove('clicked');
            });

            // Add 'clicked' class to the selected radio button
            if (input.checked) {
                parentDiv.classList.add('clicked');
            }
        }

        // Enable next button if a choice is selected
        nextBtn.disabled = !isChoiceSelected();
    });
});





// progress bar
const eCAdvancementSpan = document.querySelector('.eC-advancement');
const gardenSpan = document.querySelector('.garden');
const hardscapeSpan = document.querySelector('.hardscape');
const fourth = document.querySelector('.fourth');

let widthValue = 0;
let gardenWidth = 0;
let hardscapeWidth = 0;
let fourthwidth = 0;




function setPointerEvents(divElement, enable) {
    divElement.style.pointerEvents = enable ? 'auto' : 'none';
}
// Function to increase the width
function increaseWidth() {
    widthValue += 17;
    if (widthValue > 100) {
        widthValue = 100;
    }
    eCAdvancementSpan.style.width = `${widthValue}%`;

    if (widthValue === 100 && gardenWidth < 100) {
        gardenWidth += 8;
        if (gardenWidth > 100) {
            gardenWidth = 100;
        }
        gardenSpan.style.width = `${gardenWidth}%`;
    }

    if (widthValue === 100 && gardenWidth === 100 && hardscapeWidth < 100) {
        hardscapeWidth += 20;
        if (hardscapeWidth > 100) {
            hardscapeWidth = 100;
        }
        hardscapeSpan.style.width = `${hardscapeWidth}%`;
    }

    if (widthValue === 100 && gardenWidth === 100 && hardscapeWidth === 100 && fourthwidth < 100) {
        fourthwidth += 9;
        if (fourthwidth > 100) {
            fourthwidth = 100;
        }
        fourth.style.width = `${fourthwidth}%`;
    }


}





function decreaseWidth() {

    if (fourthwidth > 0) {
        fourthwidth -= 9;
        if (fourthwidth < 0) {
            fourthwidth = 0;
        }
        fourth.style.width = `${fourthwidth}%`;
    } else if (hardscapeWidth > 0) {
        hardscapeWidth -= 20;
        if (hardscapeWidth < 0) {
            hardscapeWidth = 0;
        }
        hardscapeSpan.style.width = `${hardscapeWidth}%`;
    } else if (gardenWidth > 0) {
        gardenWidth -= 8;
        if (gardenWidth < 0) {
            gardenWidth = 0;
        }
        gardenSpan.style.width = `${gardenWidth}%`;
    } else if (widthValue > 0) {
        widthValue -= 17;
        if (widthValue < 0) {
            widthValue = 0;
        }
        eCAdvancementSpan.style.width = `${widthValue}%`;
    }
    if (backBtn.disabled) {
        eCAdvancementSpan.style.width = '0%';
        gardenSpan.style.width = '0%';
        hardscapeSpan.style.width = '0%';
        fourth.style.width = '0%';
    }



}






nextBtn.addEventListener('click', increaseWidth);
backBtn.addEventListener('click', decreaseWidth);



function firstButton() {

    for (let i = 1; i < questions.length; i++) {
        questions[i].style.display = 'none';
    }


    currentQuestionIndex = 0;
    questions[currentQuestionIndex].style.display = 'block';


    backBtn.disabled = false;


    nextBtn.disabled = true;

    // Reset the progress bar widths
    widthValue = 0;
    gardenWidth = 0;
    hardscapeWidth = 0;
    fourthwidth = 0;
    eCAdvancementSpan.style.width = '0%';
    gardenSpan.style.width = '0%';
    hardscapeSpan.style.width = '0%';
    fourth.style.width = '0%';
    console.log()
    if (checkFields() && isChoiceSelected()) {
        nextBtn.disabled = false;
    }

}

function secondButton() {
    for (let i = 0; i < questions.length; i++) {
        questions[i].style.display = 'none';
    }
    currentQuestionIndex = 6;
    questions[currentQuestionIndex].style.display = 'block';
    backBtn.disabled = false;

    nextBtn.disabled = true;

    widthValue = 100;
    gardenWidth = 8;
    hardscapeWidth = 0;
    fourthwidth = 0;
    eCAdvancementSpan.style.width = '100%';
    gardenSpan.style.width = '8%';
    hardscapeSpan.style.width = '0%';
    fourth.style.width = '0%';
    console.log()
    if (checkFields() && isChoiceSelected()) {
        nextBtn.disabled = false;
    }
}

function thirdButton() {

    // Hide other questions
    for (let i = 0; i < questions.length; i++) {
        questions[i].style.display = 'none';
    }

    currentQuestionIndex = 18;
    questions[currentQuestionIndex].style.display = 'block';

    backBtn.disabled = false;

    nextBtn.disabled = true;

    widthValue = 100;
    gardenWidth = 100;
    hardscapeWidth = 20;
    fourthwidth = 0;
    eCAdvancementSpan.style.width = '100%';
    gardenSpan.style.width = '100%';
    hardscapeSpan.style.width = '20%';
    fourth.style.width = '0%';
    console.log()
    if (checkFields() && isChoiceSelected()) {
        nextBtn.disabled = false;
    }
}

function fourthButton() {
    for (let i = 0; i < questions.length; i++) {
        questions[i].style.display = 'none';
    }

    currentQuestionIndex = 22;
    questions[currentQuestionIndex].style.display = 'block';

    backBtn.disabled = false;

    nextBtn.disabled = true;

    widthValue = 100;
    gardenWidth = 100;
    hardscapeWidth = 100;
    fourthwidth = 9;
    eCAdvancementSpan.style.width = '100%';
    gardenSpan.style.width = '100%';
    hardscapeSpan.style.width = '100%';
    fourth.style.width = '9%';
    console.log()
    if (checkFields() && isChoiceSelected()) {
        nextBtn.disabled = false;
    }
}

// for specify plants
var plantspecs1 = document.getElementById('mulchplantinp');
var plantspecs2 = document.getElementById('mulchplantinp2');
var plantspecs3 = document.getElementById('mulchplantinp3');
var plantspecs4 = document.getElementById('mulchplantinp4');
var otherspecs = document.getElementById('otherspecs');

// for garden bed and design
var landother = document.getElementById('landother');

landother.addEventListener('click', function() {
    document.getElementById('land_other').style.display = 'block';
    plantspecs1.style.height = '90px';
    plantspecs2.style.height = 'max-content';
    if(document.getElementById('land_other').value == ''){
        nextBtn.disabled = true;
    }
    else if(document.getElementById('land_other').style.display = 'block'){
        document.getElementById('land_other').style.display = 'none';
    }

});
plantspecs1.addEventListener('click', function() {
    document.getElementById('mulchinp').style.display = 'block';
    document.getElementById('mulchinp2').style.display = 'none';
    plantspecs1.style.height = '90px';
    plantspecs2.style.height = 'max-content';

});
plantspecs2.addEventListener('click', function() {
    document.getElementById('mulchinp2').style.display = 'block';
    document.getElementById('mulchinp').style.display = 'none';
    plantspecs2.style.height = '90px';
    plantspecs1.style.height = 'max-content';
});
plantspecs3.addEventListener('click', function() {
    document.getElementById('mulchinp2').style.display = 'none';
    document.getElementById('mulchinp').style.display = 'none';
    plantspecs2.style.height = 'max-content';
    plantspecs1.style.height = 'max-content';
});
plantspecs4.addEventListener('click', function() {
    document.getElementById('mulchinp2').style.display = 'none';
    document.getElementById('mulchinp').style.display = 'none';
    plantspecs2.style.height = 'max-content';
    plantspecs1.style.height = 'max-content';
});
otherspecs.addEventListener('click', function() {
    document.getElementById('otherspecsinp').style.display = 'block';
    otherspecs.style.height = '90px';
});


// house in hoa
var house_in_h = document.getElementById('house_in_h');
var house_i_rent = document.getElementById('house_i_rent');
var house_i_own = document.getElementById('house_i_own');
house_in_h.addEventListener('click', function() {
    document.getElementById('hoa').style.display = 'block';
});
house_i_rent.addEventListener('click', function() {
    document.getElementById('hoa').style.display = 'none';
});
house_i_own.addEventListener('click', function() {
    document.getElementById('hoa').style.display = 'none';
});



var deny1 = document.getElementById('deny1');
var deny2 = document.getElementById('deny2');
var deny3 = document.getElementById('deny3');



deny1.addEventListener('click', function() {
    thirdButton();
});
deny2.addEventListener('click', function() {
    fourthButton();
});
deny3.addEventListener('click', function() {
    // Hide all questions except the last one
    for (let i = 0; i < questions.length - 1; i++) {
        questions[i].style.display = 'none';
    }

    // Show the last question and update progress bar
    currentQuestionIndex = questions.length - 1;
    questions[currentQuestionIndex].style.display = 'block';
    backBtn.disabled = true;
    nextBtn.disabled = true;
    nextBtn.innerHTML = "Confirm";
    widthValue = 100;
    gardenWidth = 100;
    hardscapeWidth = 100;
    fourthwidth = 100;
    eCAdvancementSpan.style.width = '100%';
    gardenSpan.style.width = '100%';
    hardscapeSpan.style.width = '100%';
    fourth.style.width = '100%';
});
