<main>
    <section>
        <h1>Payement: </h1>
        <div id="paypal-payment-button"></div>
    </section>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AV1Ca15_zDrbXNwGEsO-9nfiH89O3hYI_xWpbCQVW-EBBJ94mH3YmEFbCoMyyyMmX4dS7wUEC_wRF4Ah&currency=CAD"></script>
<script>
    // Attend que le DOM soit entièrement chargé
    document.addEventListener("DOMContentLoaded", function() {
        const paypalButton = document.getElementById('paypal-payment-button');
        afficherPayPal(paypalButton); // Afficher le bouton PayPal
    });

    function afficherPayPal(paypalButton) {
        // Créez un bouton PayPal
        paypal.Buttons({
            style: {
                color: 'blue' // Définit la couleur du bouton sur bleu
            },
            createOrder: function (data, actions) {
                // Cette fonction est appelée lorsque l'utilisateur clique sur le bouton PayPal
                // Elle crée la commande avec le montant spécifié (0,10 dollar dans ce cas)
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.10'
                        }
                    }]
                })
            },
            onApprove: function (data, actions) {
                // Cette fonction est appelée lorsque l'utilisateur approuve la transaction PayPal
                // Elle capture les fonds de la transaction et redirige vers la page "success.html"
                return actions.order.capture().then(function (details) {
                    console.log(details); // Affiche les détails de la transaction dans la console
                    window.location.replace("success.php"); // Redirige vers la page "success.html"
                })
            }
        }).render(paypalButton); // Affiche le bouton PayPal dans l'élément spécifié
    }
</script>
