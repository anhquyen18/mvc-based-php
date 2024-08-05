<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Welcome</h1>

    <p>Hello {{ name }} from the Home view!</p>

    <ul>
        {% for colour in colours %}
        <li> {{colour}}</li>
        {% endfor %}

    </ul>
</body>

</html>