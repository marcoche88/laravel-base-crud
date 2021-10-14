// conferma eliminazione di un solo fumetto

// selezionare il fumetto
const delete_form = document.getElementById("delete-form");

// aggiungere l'evento al submit del form di cancellazione
delete_form.addEventListener('submit', function (e) {

    // bloccare l'invio del form 
    e.preventDefault();

    // chiedere conferma all'utente
    const conf = window.confirm("Vuoi eliminare il fumetto selezionato?");

    // se la conferma è true ripristinare l'invio del form altrimenti niente
    if (conf) {
        this.submit();
    }
});