console.log("Script loaded successfully!");
document.addEventListener("DOMContentLoaded", function() {
    function updatePST() {
        const weekdayEl = document.getElementById('weekday');
        const dateEl = document.getElementById('date');
        const timeEl = document.getElementById('time');

        if (weekdayEl && dateEl && timeEl) {
            const now = new Date();

            weekdayEl.textContent = now.toLocaleDateString('en-US', { weekday: 'long' });

            dateEl.textContent = now.toLocaleDateString('en-US', { 
                month: 'long', 
                day: 'numeric', 
                year: 'numeric' 
            });

            timeEl.textContent = now.toLocaleTimeString('en-US');
        }
    }

    updatePST();
    setInterval(updatePST, 1000);


    
});

(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
