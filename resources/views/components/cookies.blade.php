<style>
    /* CSS for the Accept Cookies Modal */
    #cookie-consent-modal {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: white;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 500px;
        width: 90%;
        z-index: 1000;
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333;
    }

    #cookie-consent-modal h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    #cookie-consent-modal p {
        margin-bottom: 20px;
    }

    #cookie-consent-modal .buttons {
        text-align: right;
    }

    #cookie-consent-modal .buttons button {
        background-color: #000;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin-left: 10px;
        font-size: 14px;
    }

    #cookie-consent-modal .buttons button:hover {
        background-color: #333;
    }

    #cookie-consent-modal .options {
        background-color: transparent;
        color: #000;
        border: 1px solid #000;
    }

    #cookie-consent-modal .options:hover {
        background-color: #f2f2f2;
    }

    /* Close button */
    #cookie-consent-modal .close {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: transparent;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }
</style>

<div id="cookie-consent-modal">
    <button class="close">&times;</button>
    <h2>Esse site usa cookies.</h2>
    <p>
        Nós armazenamos dados temporariamente para melhorar a sua experiência de navegação e recomendar conteúdo de seu interesse. Ao utilizar nossos serviços, você concorda com tal monitoramento.
        <a
            href="{{ route('privacy') }}"
            style="color: #000; text-decoration: underline;"
        >
            Política de Privacidade
        </a>
    </p>
    <div class="buttons">
        <button class="accept">Aceitar</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById('cookie-consent-modal');
        var acceptButton = modal.querySelector('.accept');
        var closeButton = modal.querySelector('.close');

        acceptButton.addEventListener('click', function () {
            modal.style.display = 'none';
            document.cookie = 'cookies-accepted=true; max-age=' + 60 * 60 * 24 * 365;
        });

        closeButton.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        if (document.cookie.includes('cookies-accepted=true')) { modal.style.display = 'none'; }
    });
</script>
