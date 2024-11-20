<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>

</head>
<body>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #74ebd5, #9face6);
    }

    .calculator-container {
        display: flex;
        justify-content: center;
        max-width: 300px;
        width: 100%;
    }

    .calculator-card {
        border: 2px solid #ddd;
        padding: 20px;
        border-radius: 25px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        width: 100%;
        height: 500px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .calculator-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    h1 {
        text-align: center;
        font-weight: bold;
        font-size: 24px;
        text-transform: uppercase;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #74ebd5, #9face6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        letter-spacing: 2px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    input {
        background-color: #f8f9fa;
        margin: 8px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 90%;
    }

    .buttons-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        width: 100%;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 0;
        font-size: 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
        text-align: center;
    }

    button:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }

    .buttonr {
        background-color: #28a745;
        color: white;
        grid-column: span 2;
    }

    .buttonr:hover {
        background-color: #1e7e34;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }

    .result-card {
        margin-top: 20px;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        background: linear-gradient(135deg, #23f9f9, rgba(99, 193, 255, 0.39));
        text-align: center;
        width: 90%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .result-card p {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
        color: white;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .result-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    p {
        margin: 0;
        font-size: 18px;
        color: #333;
    }
</style>

<div class="calculator-container">
    <div class="calculator-card">
        <h1>Calculatrice</h1>
        <form action="{{route('calculate')}}" method="post">
            @csrf
            <input type="text" name="num1" placeholder="Entrer un nombre" required value="{{ isset($num1) ? $num1 : '' }}">
            <div id="selected-operator">{{isset($operator)? ' '.$operator: ''}}</div>
            <input type="text" name="num2" placeholder="Entrer le second nombre" required value="{{ isset($num2) ? $num2 : '' }}">
            <input type="hidden" name="operator" id="operator" value="">
            <div class="buttons-grid">
                <button type="button" onclick="setOperator('+')">+</button>
                <button type="button" onclick="setOperator('-')">-</button>
                <button type="button" onclick="setOperator('*')">*</button>
                <button type="button" onclick="setOperator('/')">/</button>
                <button type="button" class="buttonr" onclick="submitForm()">Calculer</button>
            </div>
        </form>
        @if(isset($result))
            <div class="result-card">
                <p>Résultat: {{ $result }}</p>
            </div>
        @endif
    </div>
</div>


<script>
    function setOperator(operator){
        document.getElementById('selected-operator').innerText = `${operator}`;
        document.getElementById('operator').value = operator;
    }
    function submitForm(){
        document.querySelector('form').submit();
    }
</script>
</body>
</html>
