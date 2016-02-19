{% extends "winetable.tpl" %}
{# this is a comment. BodyBlock will be overridden #}

{% block TABLE %}

    <table>
    <tr><th>WineID</th><th>WineName</th><th>WineType</th><th>Year</th><th>Description</th></tr>
    
    {%for x in values %}
    <tr>
    <div>
    <td>{{x.wine_id}}</td>
    <td>{{x.wine_name|upper}}</td>
    <td>{{x.wine_type|upper}}</td>
    <td>{{x.year}}</td>
    <td>{{x.description|upper}}</td>
    
    {% endfor %}

    </tr>
    </table>

{% endblock %}
