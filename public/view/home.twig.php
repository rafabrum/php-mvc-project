<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desafio Gesuas</title>
</head>
<body>
<h1 style="text-align: center" >Cadastro de Cidadãos</h1>
<section style="margin: 20px">
    <h2>Registre um novo cidadão</h2>
    <form action="/store" method="POST">
        <label for="fname">Nome completo:</label><br>
        <input type="text" id="fname" class="myInput" name="name">
        <input type="submit" class="button" value="Submit">
    </form>
</section>
<section style="margin: 20px">
    <h2>Pesquise por Número NIS</h2>
    <form action="/" method="GET">
        <input type="text" class="myInput" name="nis" placeholder="Busque por NIS">
        <input type="submit" class="button" value="Submit">
    </form>

    <table id="myTable">
        <tr class="header">
            <th style="width:60%;">Nome</th>
            <th style="width:40%;">Nis</th>
        </tr>
        {% for person in persons %}
        <tr>
            <td>{{ person.full_name }}</td>
            <td>{{ person.nis }}</td>
        </tr>
        {% endfor %}
        {% if notFound %}
        <tr>
            <td colspan="2">Cidadão não encontrado</td>
        </tr>
        {% endif %}
    </table>
</section>
<style>

    body {
        font-family: Open Sans, sans-serif;
        color: #535557;
    }

    .button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 20px;
        border: none;
        cursor: pointer;
    }

    .myInput {
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }

    #myTable {
        border-collapse: collapse; /* Collapse borders */
        width: 100%; /* Full-width */
        border: 1px solid #ddd; /* Add a grey border */
        font-size: 18px; /* Increase font-size */
    }

    #myTable th, #myTable td {
        text-align: left; /* Left-align text */
        padding: 12px; /* Add padding */
    }

    #myTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #f1f1f1;
    }
</style>

</body>
</html>