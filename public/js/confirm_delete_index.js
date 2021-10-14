// conferma eliminazione di un solo fumetto dalla index

// selezionare tutti i fumetti
const delete_forms = document.querySelectorAll('.delete-form');

// aggiungere l'evento al submit del form di cancellazione di tutti i fumetti della index
delete_forms.forEach(form => {
    form.addEventListener('submit', function (e) {

        // bloccare l'invio del form 
        e.preventDefault();

        // chiedere conferma all'utente
        const conf = window.confirm("Vuoi eliminare il fumetto selezionato?");

        // se la conferma è true ripristinare l'invio del form altrimenti niente
        if (conf) {
            this.submit();
        }
    });
});

