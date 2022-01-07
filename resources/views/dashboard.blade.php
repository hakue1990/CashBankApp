@extends('layouts.app')

@section('content')

    <div class="dashboard-container">
        <div class="dashboard-account">
            <div class="dashboard-account-left">
                <h2 id="account-type"></h2>
                <h3 id="account-number"></h3> <!-- {{ $accounts[0]['account_number']}} -->

            </div>
            <div class="dashboard-account-right">
                <h3>Dostępne środki:</h3>
                <h2 id="account-balance"></h2>  <!-- {{ $accounts[0]['balance'] }} PLN -->
            </div>
        </div>

        <div class="dashboard-buttons">
            <div class="dashboard-buttons-transactions">
                <a href="transactions"><button class="dashboard-btn">Nowy przelew</button></a>
                <a href="/phone"><button class="dashboard-btn">Zasil konto</button></a>
            </div>

            <div class="dashboard-buttons-accountSwitcher">
                <button id="account-previous" class="dashboard-btn switcher-btn">Previous</button>
                <button id="account-next" class="dashboard-btn switcher-btn">Next</button>
            </div>
        </div>
        <div class="dashboard-history-container" id="dashboard-history-container">
            <div class="dashboard-history-header">
                <h5 class="dashboard-history-header-h">Historia transakcji</h5>
                <h5 class="dashboard-history-header-h">Tytuł</h5>
                <h5 class="dashboard-history-header-h">KATEGORIA</h5>
                <h5 class="dashboard-history-header-h">KWOTA</h5>
            </div>
            @if ($message = Session::get('success'))
                <h2 style="color: green" class="dashboard-history-message" id="dashboard-history-message">{{ $message }}</h2>
                <script>
                    const message = document.getElementById('dashboard-history-message')
                    setTimeout(()=> message.classList.add("dashboard-history-message-hidden"), 3000);
                </script>
            @endif
            <div class="dashboard-history-content-container" id="dashboard-history-content-container"></div>
        </div>
    </div>
    <div>

    </div>

    <script>
        //Get HTML elemetns
        const contentContainer = document.getElementById('dashboard-history-content-container');
        const accountNumber = document.getElementById('account-number');
        const accountType = document.getElementById('account-type');
        const accountBalance = document.getElementById('account-balance');
        const nextButton = document.getElementById('account-next');
        const previousButton = document.getElementById('account-previous');

        //Get PHP variables
        const transactions = {!! json_encode($transactions, JSON_HEX_TAG) !!};
        const acconuts = {!! json_encode($accounts, JSON_HEX_TAG) !!};


        //Accounts counter
        let accountsCounter = 0;

        //checking if you can switching between accounts
        if(acconuts.length > 1){
            nextButton.classList.remove("switcher-btn");
        }


        nextButton.onclick = () => {

            if(acconuts.length > accountsCounter + 1)
            accountsCounter++

            currentAccounts(accountsCounter);
            currentTransactions(accountsCounter);
            cookieAccountNumber("acNumber", `${acconuts[accountsCounter]['account_number']}`, 1);

            if(accountsCounter > 0){
            previousButton.classList.remove("switcher-btn")
            }

            if(acconuts.length === accountsCounter + 1)
            nextButton.classList.add("switcher-btn")
        }

        previousButton.onclick = () => {
            nextButton.classList.remove("switcher-btn");
            accountsCounter--

            if(accountsCounter === 0)
            previousButton.classList.add("switcher-btn")
            currentAccounts(accountsCounter);
            currentTransactions(accountsCounter);
            cookieAccountNumber("acNumber", `${acconuts[accountsCounter]['account_number']}`, 1);
        }


        const currentAccounts = (counter) => {
            accountNumber.textContent = acconuts[counter]['account_number'];
            accountType.textContent = acconuts[counter]['type'];
            accountBalance.textContent = acconuts[counter]['balance'] + " PLN";
        }

        const currentDate = (date)=> {
            const months = [
                'Styczeń',
                'Luty',
                'Marzec',
                'Kwieceń',
                'Maj',
                'Czerwiec',
                'Lipiec',
                'Sierpień',
                'Wrzesień',
                'Październik',
                'Listopad',
                'Grudzień'
            ]

            const year = date.getFullYear();
            const month = date.getMonth();
            const day = date.getDate();
            const fulldate = day + " " + months[month] + " " + year;

            return fulldate;

        }

        const currentTransactions = (counter) => {
            contentContainer.textContent = '';
            transactions[acconuts[counter]['account_number']].slice().reverse().forEach(transaction => {

                const content = document.createElement('div');
                content.classList.add("dashboard-history-content");

                const date = document.createElement('h5');
                date.classList.add("dashboard-history-content-h5");
                date.textContent = currentDate(new Date(transaction['created_at']));
                content.appendChild(date);

                const title = document.createElement('h5');
                title.classList.add("dashboard-history-content-h5");
                title.textContent = transaction['type'];
                content.appendChild(title);

                const type = document.createElement('h5');
                type.classList.add("dashboard-history-content-h5");
                type.textContent = transaction['title'];
                content.appendChild(type);


                const amount = document.createElement('h5');
                amount.classList.add("dashboard-history-content-h5");

                if(transaction['recipient'] === acconuts[counter]['account_number']) {
                    amount.classList.add("dashboard-history-content-h5-recipient");
                    amount.textContent = transaction['amount'] + " PLN";
                }else {
                    amount.textContent = "-" + transaction['amount'] + " PLN";
                    amount.classList.add("dashboard-history-content-h5-sender");
                }

                content.appendChild(amount);
                contentContainer.appendChild(content);
                });

        }

        const cookieAccountNumber = (name, value, days) => {
            let expires;
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();

            document.cookie = escape(name) + "=" +
            escape(value) + expires + "; path=/";
        }

        currentAccounts(accountsCounter);
        currentTransactions(accountsCounter);
        cookieAccountNumber("acNumber", `${acconuts[accountsCounter]['account_number']}`, 1);

    </script>

@endsection
