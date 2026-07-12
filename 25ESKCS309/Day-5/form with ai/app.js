/**
 * HackVerse 2026 Core Event Application Script
 * Built with jQuery 3.7+ and Bootstrap 5 elements
 */

$(document).ready(function() {

    // ==========================================================================
    // 1. Dynamic Light / Dark Mode Interface Toggle Engine
    // ==========================================================================
    $('#themeToggle').on('click', function() {
        const htmlTag = $('html');
        const isDarkTheme = htmlTag.attr('data-bs-theme') === 'dark';
        
        // Swap system attributes between dark and light ecosystem roots
        htmlTag.attr('data-bs-theme', isDarkTheme ? 'light' : 'dark');
    });


    // ==========================================================================
    // 2. High-Precision Live Countdown Engine (Targeting July 10, 2026)
    // ==========================================================================
    const targetMiliseconds = new Date("July 10, 2026 09:00:00").getTime();
    
    function runLiveCountdown() {
        const currentTime = new Date().getTime();
        const structuralDelta = targetMiliseconds - currentTime;

        // If the countdown timer expires completely
        if (structuralDelta <= 0) {
            $('.countdown-box').parent().html(
                "<div class='col-12'><h3 class='text-danger fw-bold'><i class='fa-solid fa-bolt-lightning'></i> Hackathon Pipeline Currently Active</h3></div>"
            );
            clearInterval(clockTrackingNode);
            return;
        }

        // Mathematical conversion algorithms for time intervals
        const daysCalculated = Math.floor(structuralDelta / (1000 * 60 * 60 * 24));
        const hoursCalculated = Math.floor((structuralDelta % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutesCalculated = Math.floor((structuralDelta % (1000 * 60 * 60)) / (1000 * 60));
        const secondsCalculated = Math.floor((structuralDelta % (1000 * 60)) / 1000);

        // String padding format rendering updates
        $('#days').text(daysCalculated < 10 ? '0' + daysCalculated : daysCalculated);
        $('#hours').text(hoursCalculated < 10 ? '0' + hoursCalculated : hoursCalculated);
        $('#mins').text(minutesCalculated < 10 ? '0' + minutesCalculated : minutesCalculated);
        $('#secs').text(secondsCalculated < 10 ? '0' + secondsCalculated : secondsCalculated);
    }
    
    // Execute rendering initialization cycle immediately
    runLiveCountdown();
    const clockTrackingNode = setInterval(runLiveCountdown, 1000);


    // ==========================================================================
    // 3. Dynamic Live Tracker Registration Activity Simulator
    // ==========================================================================
    // Simulates live asynchronous student application submittals across campus
    setInterval(function() {
        if (Math.random() > 0.5) {
            const trackCategories = ['ai', 'web3', 'fs'];
            const targetedTrackSelection = trackCategories[Math.floor(Math.random() * trackCategories.length)];
            
            // Increment overall master counter metric
            let currentGlobalTotal = parseInt($('#totalReg').text());
            $('#totalReg').text(currentGlobalTotal + 1);

            // Cascade specific tracking pipeline allocation metrics
            updateTrackMetricsUI(targetedTrackSelection);
        }
    }, 3500);

    // Shared functional utility layout renderer for handling progress data calculations
    function updateTrackMetricsUI(trackId) {
        const capacityThresholdMax = 250; // Target allocation limit per track node
        let targetedCounterElement = $(`#${trackId}Count`);
        let targetedProgressBarNode = $(`#${trackId}Bar`);
        
        let customUpdatedCount = parseInt(targetedCounterElement.text()) + 1;
        targetedCounterElement.text(customUpdatedCount);

        // Calculate and cap fill ratio percentages visually safely under 100%
        let dynamicPercentValue = Math.min((customUpdatedCount / capacityThresholdMax) * 100, 100);
        
        // Command UI element style transforms via structural jQuery mutations
        targetedProgressBarNode.css('width', dynamicPercentValue + '%');
        targetedProgressBarNode.parent().prev().find('span').text(Math.round(dynamicPercentValue) + '%');
    }


    // ==========================================================================
    // 4. Rigorous UI Form Validation Node Framework
    // ==========================================================================
    $('#hackathonForm').on('submit', function(formSubmissionEvent) {
        formSubmissionEvent.preventDefault();
        let formStructureIsValid = true;

        // --- Standard Input: Developer Full Name Validation ---
        const inputtedNameValue = $('#fullName').val().trim();
        if (inputtedNameValue.length < 3) {
            $('#nameError').fadeIn();
            $('#fullName').addClass('is-invalid').removeClass('is-valid');
            formStructureIsValid = false;
        } else {
            $('#nameError').fadeOut();
            $('#fullName').removeClass('is-invalid').addClass('is-valid');
        }

        // --- Standard Input: Academic Email Address Structural Validation ---
        const inputtedEmailValue = $('#email').val().trim();
        const emailRegexPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegexPattern.test(inputtedEmailValue)) {
            $('#emailError').fadeIn();
            $('#email').addClass('is-invalid').removeClass('is-valid');
            formStructureIsValid = false;
        } else {
            $('#emailError').fadeOut();
            $('#email').removeClass('is-invalid').addClass('is-valid');
        }

        // --- Dropdown Element: Ecosystem Selection Group Verification ---
        const configuredTrackSelection = $('#track').val();
        if (configuredTrackSelection === "") {
            $('#trackError').fadeIn();
            $('#track').addClass('is-invalid').removeClass('is-valid');
            formStructureIsValid = false;
        } else {
            $('#trackError').fadeOut();
            $('#track').removeClass('is-invalid').addClass('is-valid');
        }

        // --- Checkbox Element: Ethics & Rules Compliance Verification ---
        if (!$('#terms').is(':checked')) {
            $('#termsError').fadeIn();
            formStructureIsValid = false;
        } else {
            $('#termsError').fadeOut();
        }

        // ==========================================================================
        // 5. Post-Verification Submission Actions Pipeline Execution
        // ==========================================================================
        if (formStructureIsValid) {
            // Update structural registration metric systems with custom inputs live
            let finalGlobalTotal = parseInt($('#totalReg').text()) + 1;
            $('#totalReg').text(finalGlobalTotal);
            
            updateTrackMetricsUI(configuredTrackSelection);

            // Launch successful entry status confirmation notifications
            alert(`Pipeline Active: Registration for ${inputtedNameValue} successfully submitted to system nodes!`);
            
            // Wipe internal DOM structures back safely to baseline form defaults
            $('#hackathonForm')[0].reset();
            $('.form-control, .form-select').removeClass('is-valid');
        }
    });

    // --- Interactive Key Activity Monitoring Real-time Clearances ---
    $('#fullName, #email, #track').on('input change', function() {
        $(this).removeClass('is-invalid');
        $(this).next('.error-msg').fadeOut();
    });
    
    $('#terms').on('change', function() {
        $('#termsError').fadeOut();
    });
});