document.addEventListener('DOMContentLoaded', function () {
    var updateInputs = document.getElementById('updateInputs');
    var reportSummary = document.getElementById('reportSummary');
    var toggleInputsButton = document.getElementById('toggleInputs');

    // Toggle the visibility of updateInputs and otherContent when the button is clicked
    toggleInputsButton.addEventListener('click', function () {
        updateInputs.style.display = updateInputs.style.display === 'none' ? 'block' : 'none';
        reportSummary.style.display = reportSummary.style.display === 'none' ? 'block' : 'none';
    });
});